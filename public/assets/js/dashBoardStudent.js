function openViewModal(id, name, severity, date) {

    // document.getElementById('violationID').value = id;
    document.getElementById('violationName').value = name;
    // document.getElementById('violationSeverity').value = severity;
    document.getElementById('violationDate').value = date;

    document.getElementById('view-modal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('view-modal').style.display = "none";
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        var modal = document.getElementById('view-modal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }