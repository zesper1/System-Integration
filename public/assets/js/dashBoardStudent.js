function openViewModal(name, description, filename, date) {

    const filedirec = "../../../public/assets/images/violations/" + filename;
    document.getElementById('violationName').value = name;
    document.getElementById('mcrepdet').innerHTML = description;
    document.getElementById('violationDate').value = date;
    //set image to be displayed
    const imgElement = document.getElementById('mc-attch');
    console.log(imgElement);
    imgElement.src = filedirec;

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
    