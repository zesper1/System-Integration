
// Extract the two groups from the searchData object
var searchData1 = searchData.group1;  // For StudentName input box
var searchData2 = searchData.group2;  // For SupportingDetail input box
console.log("From adminviolation.js" + searchData);
const inputBox1 = document.getElementById("StudentName");
const resultsBox1 = document.getElementById("resultsBox1");

const inputBox2 = document.getElementById("SupportingDetail");
const resultsBox2 = document.getElementById("resultsBox2");

// Placeholders to show report details
const repDetContainer = document.getElementById("report-info");
const reportIdentification = document.getElementById("repDetID");
const reportDescription = document.getElementById("rdc-desc");
const reportName = document.getElementById("rdc-name");
const reportAttachment = document.getElementById("rdc-link");

// Function to handle input for the first search box (using searchData1)
inputBox1.onkeyup = function() {
    handleSearch(inputBox1, resultsBox1, searchData1);
};

// Function to handle input for the second search box (using searchData2)
inputBox2.onkeyup = function() {
    handleSearch(inputBox2, resultsBox2, searchData2);
};

// Handle report selection and display its details
function selectReport(list) {
    const selectedReportName = list.innerText;  // Get the selected report name
    const name = selectedReportName.split(')')[1].trim(); // Gets the part after the `)` and trims it
    // Find the matching report in searchData2
    const selectedReport = searchData2.find(report => report.name === name);
    // Debugging: Check if selectedReport is found
    console.log("Selected Report:", selectedReport);
    // Display the report details if found
    if (selectedReport) {
        repDetContainer.style.display = "block";
        var filedirec = "../../../public/assets/images/violations/" + selectedReport.filename;
        reportDescription.innerText = "Description: " + selectedReport.description;
        reportName.innerText = "Report Name: " + selectedReport.name;
        reportAttachment.setAttribute('href', filedirec);
        reportIdentification.value = selectedReport.id;
        // Debugging: Check if the elements are updated
        console.log("Report Details Displayed:", {
            description: selectedReport.description,
            name: selectedReport.name,
            filename: filedirec
        });
    } else {
        // Debugging: If no report is found
        console.log("No report found with the name:", selectedReportName);
    }

    // Clear the result box after selection
    const parentResultsBox = list.closest('.result-box');
    parentResultsBox.innerHTML = '';
    // Set the input value to the selected report name
    if (parentResultsBox.id === 'resultsBox2') {
        inputBox2.value = selectedReportName;
    }
}

// Generic search function to filter and display results
function handleSearch(inputBox, resultsBox, searchData) {
    let keyword = inputBox.value;
    // Ensure that the keyword is a string and is not empty
    if (typeof keyword === "string" && keyword.trim() !== "") {
        keyword = keyword.toLowerCase();  // Convert the keyword to lowercase
        // Filter the students array based on the 'name' property
        const filteredResults = searchData.filter(function(item) {
            return item && item.name && item.name.toLowerCase().includes(keyword);
        });
        // Display the filtered students in the correct results box
        display(filteredResults, resultsBox);
        resultsBox.style.display = "block";
    } else {
        resultsBox.innerHTML = "";
        resultsBox.style.display = "none";
    }
}

    // Function to display results in the corresponding result box
    function display(result, resultsBox) {
        if (result.length > 0) {
            // If there are matching students, display them
            const content = result.map((item) => {
                return "<li onclick='selectInput(this)'>" + "(ID: " + item.id + ") " + item.name + "</li>";
            }).join(''); // Join without commas

            resultsBox.innerHTML = "<ul>" + content + "</ul>";
        } else {
            // If no students are found, display a "No students found" message
            resultsBox.innerHTML = "<p>No students found</p>";
        }
    }

    // Function to handle when a student name is clicked from the result list
    function selectInput(list) {
        // Find which input box the user clicked
        const parentResultsBox = list.closest('.result-box');
        
        if (parentResultsBox.id === 'resultsBox1') {
            inputBox1.value = list.innerHTML;
        } else if (parentResultsBox.id === 'resultsBox2') {
            inputBox2.value = list.innerHTML;
            selectReport(list); // Pass the entire list item to selectReport
        }

        // Clear the respective results box
        parentResultsBox.innerHTML = '';
    }
