let foreignKeyColumns = []; // To store foreign key columns globally

function fetchForeignKeys(tableName) {
    return fetch(`../../config/superAdminConfig/fetch_foreign_keys.php?table=${tableName}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            foreignKeyColumns = data; // Store the foreign keys for the selected table
        })
        .catch(error => console.error('Error fetching foreign keys:', error));
}
function viewColumns() {
    const tableName = document.getElementById("table-select").value;
    document.getElementById("add-button").style.display = tableName ? 'block' : 'none'; // Show Add button if table is selected

    if (tableName) {
        fetchForeignKeys(tableName).then(() => {
            // After fetching foreign keys, proceed with other logic
            fetch(`../../config/superAdminConfig/fetch_columns.php?table=${tableName}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                        return;
                    }

                    const headerRow = document.getElementById("table-header");
                    headerRow.innerHTML = ''; // Clear previous headers
                    data.columns.forEach(column => {
                        const th = document.createElement("th");
                        th.innerText = column;
                        headerRow.appendChild(th);
                    });

                    // Add Action Columns
                    const actionTh = document.createElement("th");
                    actionTh.innerText = "Actions"; // Add a header for actions
                    headerRow.appendChild(actionTh);
                    
                    // Display records
                    const recordsContainer = document.getElementById("records-display");
                    recordsContainer.innerHTML = ''; // Clear previous records

                    data.records.forEach(record => {
                        const row = document.createElement("tr");
                        record.forEach(value => {
                            const td = document.createElement("td");
                            td.innerText = value;
                            row.appendChild(td);
                        });
                        
                        // Create action buttons
                        const actionTd = document.createElement("td");
                        actionTd.className = "action-buttons";

                        const editButton = document.createElement("button");
                        editButton.innerText = "Edit";
                        editButton.className = "edit-button";
                        editButton.onclick = function() {
                            editRecord(record, data.columns[0]); // Call edit function with the record
                        };

                        const deleteButton = document.createElement("button");
                        deleteButton.innerText = "Delete";
                        deleteButton.className = "delete-button";
                        deleteButton.onclick = function() {
                            deleteRecord(record, data.columns[0]); // Call delete function with the record
                        };

                        actionTd.appendChild(editButton);
                        actionTd.appendChild(deleteButton);
                        row.appendChild(actionTd);
                        
                        recordsContainer.appendChild(row);
                    });
                    
                    // Prepare the Add Record Form
                    prepareAddRecordForm(data.columns);
                })
                .catch(error => console.error('Error:', error));
        });
    }
}

function prepareAddRecordForm(columns) {
    const addFieldsContainer = document.getElementById("add-fields-container");
    addFieldsContainer.innerHTML = ''; // Clear previous fields
    const tableName = document.getElementById("table-select").value;
    document.getElementById("add-table").value = tableName; // Set the selected table

    columns.forEach(column => {
        const label = document.createElement("label");
        label.innerText = column;

        const input = document.createElement("input");
        input.type = "text";
        input.name = column; // Set the input name to the column name

        // Check if the column is a foreign key
        if (isForeignKey(column)) {
            // Create a select dropdown for foreign keys
            const select = document.createElement("select");
            select.name = column; // Set the select name to the column name

            // Fetch the foreign key options from the database (assumed you have a separate endpoint for this)
            fetch(`../../config/superAdminConfig/fetch_foreign_key_options.php?column=${column}&table=${tableName}`)
                .then(response => response.json())
                .then(options => {
                    options.forEach(option => {
                        const optionElement = document.createElement("option");
                        optionElement.value = option.id; // Assuming each option has an 'id' field
                        optionElement.innerText = option.name; // Assuming each option has a 'name' field
                        select.appendChild(optionElement);
                    });
                })
                .catch(error => console.error('Error fetching foreign key options:', error));

            label.appendChild(select); // Append the select to the label
        } else {
            label.appendChild(input); // Append the input to the label
        }

        addFieldsContainer.appendChild(label);
    });
}


function isForeignKey(column) {
    // Check if the column is a foreign key using the fetched foreign key data
    return foreignKeyColumns.includes(column);
}

function openModal() {
    document.getElementById("addRecordModal").style.display = "block";
}

function closeModal() {
    document.getElementById("addRecordModal").style.display = "none";
}

function addRecord(event) {
    event.preventDefault(); // Prevent form submission
    const formData = new FormData(document.getElementById("form-add-record"));

    fetch('../../config/superAdminConfig/add_record.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log(data.message);
            alert("Record added successfully!");
            viewColumns(); // Refresh the records view
            closeModal(); // Hide the modal
        } else {
            alert("School does not exist, please set the school first.");
        }
    })
    .catch(error => console.error('Error:', error));
}

function editRecord(record, attribute) {
    const tableName = document.getElementById("table-select").value;
    const recordId = record[0]; // Assuming the first column is the ID
    console.log(attribute);
    // Redirect to edit form or load the edit modal with record data
    window.location.href = `edit_record.php?table=${tableName}&id=${recordId}&attribute=${attribute}`;
}

function deleteRecord(record, attribute) {
    var atr = attribute;
    const confirmation = confirm("Are you sure you want to delete this record?");
    if (confirmation) {
        const tableName = document.getElementById("table-select").value;
        const recordId = record[0]; // Assuming the first column is the ID
        
        console.log(`Deleting record from table: ${tableName}, ID: ${recordId}`);
        
        fetch(`../../config/superAdminConfig/delete_record.php`, {
            method: 'POST',
            body: JSON.stringify({ table: tableName, id: recordId, attribute: atr}),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            // Check if response is valid JSON
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert("Record deleted successfully!");
                viewColumns(); // Refresh the records view
            } else {
                alert("Error deleting record: " + data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
// Close the modal when clicking anywhere outside of it
window.onclick = function(event) {
    const modal = document.getElementById("addRecordModal");
    if (event.target === modal) {
        closeModal();
    }
}