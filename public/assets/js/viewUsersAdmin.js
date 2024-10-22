function openViewModal(id, name, email, role) {
    let nameParts = name.split(', ');  // Split by comma and space
    let lastname = nameParts[0];   // Last name
    let firstname = nameParts[1];  // First name

    document.getElementById("userID_upd").value = id;
    document.getElementById("FirstName_upd").value = firstname;
    document.getElementById("LastName_upd").value = lastname;
    document.getElementById("Email_upd").value = email;
    setRole(role);
    
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

function setRole(role){
// Normalize the role to match the expected case
roleTrimmed = role.trim(); // Remove whitespace
console.log('Role:', roleTrimmed); // Check the normalized role

switch (roleTrimmed) {
    case 'Admin':
        console.log('You have admin access.');
        document.getElementById("Role_upd").value = 1;
        break;
    case 'Faculty':
        console.log('You have faculty access.');
        document.getElementById("Role_upd").value = 2;
        break;
    case 'Student':
        console.log('You have student access.');
        document.getElementById("Role_upd").value = 3;
        break;
    default:
        console.log('Role not recognized:', role); // Log unrecognized role
}
}