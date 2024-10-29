<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>appealAdmin</title>
</head>

<style>
    @font-face{
    font-family: 'pop';
    src: url(../../../public/assets/Fonts/Poppins-Bold.ttf);
    }

    /* containers */
    *
    {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        width: 100%;
        background-color: #E9EAF6;
        font-family: 'pop';
        height: 100vh;
        overflow: hidden;
    }

    .container{
        width: 100%;
        display: flex;
        height: 100%;
        flex-direction: column;
    }

    .con2{
        display: flex;
    }

    /* containers */

     /* topbar */

     .student{
        background-color: #34408D;
        width: 100%;
        height: 8%;
        display: flex;
        align-items: center;
        justify-content: left;
        border-bottom: 5px solid #E6C213;
    }

    .inf1{
        display: flex;
        width: 100%;
        align-items: center;
    }

    .logo{
        display: flex;
        justify-content: end;
    width: 95%;
    display: flex;
    color: white;
    }

.pic{
width: 40px;
height: 45px;
margin-right: 5px;
}

.NU{
    line-height: 1;
    display: flex;
    align-items: center;
}

    .inf{
        display: flex;
        width: 50%;
        align-items: center;
    }

    .info2{
        width: 100%;
        display: flex ;
        justify-content: end;
        align-items: center;
        margin-right: 10px;
    }

    .toplogo{
        width: 30px;
        height: 30px;
        margin: 10px;
        cursor: pointer;
    }

    /* topbar */

    /* sidebar */

    .sidebar {
    background-color: white;
    width: 250px; /* Set the width of the sidebar */
    height: 100vh;
    position: fixed;
    left: -250px; /* Hide it initially */
    top: 0;
    transition: left 0.3s ease; /* Smooth sliding effect */
    z-index: 1000;
}

.sidebar.open {
    left: 0; /* Slide the sidebar into view */
}

.toggle-btn {
    position: fixed;
    left: 10px;
    top: 10px;
    background-color: #34408D;
    color: white;
    border: none;
    cursor: pointer;
    padding: 10px;
    border-radius: 5px;
    z-index: 1100;
    font-family: 'pop';
}

.toggle-btn.hidden {
    display: none;
}


.side {
    margin-left: 0; /* Adjust main content position */
    transition: margin-left 0.3s ease;
}

.side.shifted {
    margin-left: 250px; /* Shift main content to the right when sidebar is open */
}

.overview{
    width: 55%;
    height: 10%;
    font-size: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #AFB1C2;

}


.dashboard{
    width: 100%;
    height: 60%;  
    display: flex;
    flex-direction: column;
    align-content: center;
}

.dashboard .dashB{
    width: 100%;
    height: 15%;
    display: flex;
    align-items: center;
}

.dashboard .dashPIC{
    width: 25px;
    height: 25px;
    margin-left: 40px;
    cursor: pointer;
}

.dashboard .txtR{
    font-size: 17px;
    color: #595959;
    margin-left: 30px;
    cursor: pointer;
}

.session-name{
    color: #E6C213;
}

.dashboard .txtA{
    font-size: 20px;
    color: gold;
    margin-left: 30px;
}

.dashboard .users{
    width: 100%;
    height: 15%;
    display: flex;
    align-items: center;
    justify-content: left;
    color: gold;
}

 /* Dropdown styling */
 .dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    margin-top: 5px;
    margin-left: 70px;
    padding: 5px 0;
    border-radius: 5px;
}

.dropdown-content a {
    color: #595959;
    padding: 10px;
    text-decoration: none;
    display: block;
    font-size: 18px;
    margin: 5px 0;
}

.dropdown-content a:hover {
    background-color: #E9EAF6;
    color: #35408E;
}

/* sidebar */

/* mainbar */

.content{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .rep{
        width: 90%;
        display: flex;
        justify-content: end;
        margin-bottom: 1%;
    }

    .glass {
  width: 250px; 
  background-color: white;
  display: flex; 
  align-items: center; 
  padding: 0 15px;
  margin-top: 10px;
  height: 35px;
}

.glass input {
  border: none;
  outline: none;
  background: transparent;
  width: 100%;
  font-size: 16px;
  font-family: 'pop';
  color: black;
}

.glass input::placeholder {
    color: black;
}

    .content1{
        display: flex;
        width: 100%;
        height: 15%;
    }

    .col{
        width: 50%;
        margin-left: 2%;
        display: flex;
        justify-content: center;
        color: #35408E;
        font-family: 'pop';
    }

    .text{
    color: white;
    display: flex;
    align-items: center;
    justify-content: start;
    height: 100%;
    width: 100%;
    font-size: 20px;
    margin-left: 60px;
    margin-top: 10px;
    }

    .session-name{
    color: #E6C213;
}



.con1{
        display: flex;
        height: 100%;
        width: 100%;
    }

    .content2{
        width: 60%;
        height: 80%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    
.pupil{
    width: 60%;
    height: 20%;
    background-color: white;
    border-radius: 10px;
    align-items: center;
    display: flex;
    flex-direction: column;
    color: #34408D;
    font-family: 'pop';
    outline: 1px solid black;
    justify-content: center;
    margin-bottom: 2%;
}

.baba{
    display: flex;
    margin-left: 10px ;
}

.studpic{
    width: 40px;
    height: 40px;
}

.det{
    width: 100%;
        height: 70%;
        display: flex;
        justify-content: start;
        align-items: center;
}

.details{
    width: 80%;
    height: 100%;
    background-color: white;
    margin-top: 6%;
    font-family: 'pop';
    outline: 1px solid black;
    color: #34408D;
    padding: 3%;
}


.reportPIC .studpic{
    width: 100px;
    height: 100px;
    margin-bottom: 5%;
}

.reportDetails{
    text-align: justify;
    margin-bottom: 5%;
}
.case{
    text-align: justify;
    margin-top: 1%;
}

  /* Appeal Table */

  .tablecon{
    display: flex;
    justify-content: center;
    height: 550px;
}
  .wrapper{
    display: flex;
    width: 80%;
    height: fit-content;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.appeal-table-container {
    margin: 20px;
    width: 95%;
}

.appeal-table-container h2 {
    color: #34408D;
    margin-bottom: 15px;
}

.appeal-table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'pop';
    color: #34408D;
    background-color: #FFFFFF;
}

.appeal-table th, .appeal-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
}

.appeal-table th {
    background-color: #E9EAF6;
    font-weight: bold;
}

.appeal-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.appeal-table tr:hover {
    background-color: #f1f1f1;
}

.action-btn {
    background-color: #34408D;
    color: white;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 0.9em;
}

.action-btn:hover {
    background-color: #2b3670;
}

/* Modal styling */
.modal {
            display: none; /* Initially hidden */
            position: fixed; /* Stay in place */
            top: 0;
            left: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            z-index: 1000; /* High z-index to ensure it overlays */
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 400px; /* Set a width for the modal */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transform: translate(-50%, -50%); /* Center the modal */
            position: relative; /* Position relative to allow transform */
            top: 50%; /* Move it down 50% */
            left: 50%; /* Move it right 50% */
        }

        .modal-header {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .modal-body {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none; /* Prevents resizing */
            height: 100px; /* Fixed height for better layout */
            text-align: justify; /* Justify text */
            font-family: Arial, sans-serif; /* Consistent font */
            font-size: 14px; /* Readable font size */
        }

        .modal-footer {
            text-align: right;
        }

        .close-btn, .submit-btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            margin-left: 5px;
        }

        .close-btn {
            background-color: #dc3545; /* Red for cancel button */
        }

        .close-btn:hover, .submit-btn:hover {
            opacity: 0.9;
        }

</style>

<body>
    <div class="container">

        <!-- --------------<p>topbar</p>-------------------- -->
        <div class="student">
        <div class="col">
                <div class="text">
                <label class="hello"> HELLO, 
                <span class="session-name">
                <?php 
        // Display the session variable 'name'
                echo $_SESSION["name"]; 
                ?>
                </span>
                </label>
                </div>
            </div>
            <div class="inf1">
            <div class="logo">
                <img src="../../../public/assets/images/NU_shield.svg.png" class="pic">
            <label class="NU">NATIONAL UNIVERSITY</label> 
            </div> 
        </div>
        </div>
        <!-- --------------<p>topbar</p>-------------------- -->

        <div class="con2">

        <!-- --------------<p>sidebar</p>-------------------- -->
        <button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>
        <div class="side">
        <div class="sidebar">
            <div class="overview">OVERVIEW</div>  

            <div class="dashboard">

        <line onclick="navigateTo('dashboardAdmin.php')" class="dashB">
            <img src="../../../public/assets/images/dashboard.png" class="dashPIC">
            <label class="txtR"> DASHBOARD</label>
        </line>
        
        <line onclick="navigateTo('reportsAdmin.php')" class="dashB">
            <img src="../../../public/assets/images/report.png" class="dashPIC">
            <label class="txtR"> REPORTS</label>
        </line>
        
        <line onclick="navigateTo('appealAdmin.php')" class="dashB">
            <a href="appealAdmin.php"><img src="../../../public/assets/images/paper.png" class="dashPIC"></a>
            <label class="txtR"> REPLY TO APPEAL</label>
        </line>

        <line onclick="navigateTo('adminViolation.php')" class="dashB">
            <a href="adminViolation.php"><img src="../../../public/assets/images/warning.png" class="dashPIC"></a>
            <label class="txtR"> VIOLATION</label>
        </line>
        
        <line onclick="navigateTo('viewUsersAdmin.php')" class="dashB">
            <a href="viewUsersAdmin.php"><img src="../../../public/assets/images/users.png" class="dashPIC"></a>
            <label class="txtR"> VIEW USER</label>
        </line>

        <line onclick="navigateTo('addFaculty.php')" class="dashB">
            <a href="addFaculty.php"><img src="../../../public/assets/images/add-user-3-xxl.png" class="dashPIC"></a>
            <label class="txtR"> ADD FACULTY</label>
        </line>

        <line class="dashB">
        <a id="logout-link" >
                    <img src="../../../public/assets/images/logout.png" class="dashPIC" alt="Logout">
                </a>
                <label class="txtR"> LOGOUT</label>
        </line>
    </div>

        </div>
        </div>
        <!-- --------------<p>sidebar</p>-------------------- -->
         
        <!-- --------------<p>mainbar</p>-------------------- -->

        <div class="content">

        <div class="rep">
        <div class="glass">
        <input type="text" placeholder="Search" id="searchInput" onkeyup="filterTable()">
        </div>
        </div>

            <div class="tablecon">
            <div class="wrapper">
                <div class="appeal-table-container">
                  <h2>Student Appeals</h2>
                  <table class="appeal-table">
                      <thead>
                          <tr>
                              <th>Student Name</th>
                              <th>Appeal Date</th>
                              <th>Violation</th>
                              <th>Appeal Details</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>           
                                  <tr>
                                          <td>name</td>
                                          <td>date</td>
                                          <td>violation</td>
                                          <td>details</td>
                                          <td> 
                                            <button class='action-btn' onclick="openModal('John Doe', 'Violation 1', '2024-10-20', 'Details of the appeal.')">Reply</button>
                                        </td>
                                        </tr>
                      </tbody>
                  </table>
                </div>
                </div>
            </div>

             <!-- Modal Structure -->
             <div id="replyModal" class="modal" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">Reply to Appeal</div>
        <div class="modal-body">
            <p><strong>Student Name:</strong> <span id="modalStudentName"></span></p>
            <p><strong>Violation:</strong> <span id="modalViolation"></span></p>
            <p><strong>Date:</strong> <span id="modalDate"></span></p>
            <p><strong>Appeal Details:</strong> <span id="modalAppealDetails"></span></p>
            
            <!-- Dropdown for responses -->
            <label for="responseSelect">Select Response:</label>
            <select id="responseSelect" onchange="updateTextarea()">
                <option value="">Custom Response</option>
                <option value="Thank you for your appeal regarding the minor offense.We have received your request and will review the details promptly. You will be notified of our decision within the next days. If you have any additional information to provide, please feel free to reply to this email.
                                                            Best regards,
                                                         (Admin's Name)
                                                      Disciplinary Office">Response 1</option>
                <option value="Thank you for submitting your appeal concerning the major offense. Given the seriousness of the situation, we recommend scheduling a face-to-face meeting to discuss your case further. Please reply to this email with your availability so we can arrange a suitable time.
                                                            Best regards,
                                                         (Admin's Name)
                                                      Disciplinary Office">Response 2</option>
            </select>
            
            <textarea id="replyMessage" placeholder="Enter your reply here..."></textarea>
        </div>
        <div class="modal-footer">
            <button class="close-btn" onclick="closeModal()">Cancel</button>
            <button class="submit-btn" onclick="submitReply()">Send Reply</button>
        </div>
    </div>
</div>


            </div>
        </div>
    </div>

    </div>
    </div>

     <!-- --------------<p>mainbar</p>-------------------- -->
           
        </div>   
    </div>
    </div>
</body>

<script>
    function updateTextarea() {
        // Get the selected value from the dropdown
        const selectedResponse = document.getElementById('responseSelect').value;
        // Get the textarea element
        const textarea = document.getElementById('replyMessage');
        // Update the textarea with the selected response
        textarea.value = selectedResponse;
    }
</script>

<script>
    // Open modal and populate it with appeal data
    function openModal(studentName, violation, date, appealDetails) {
        document.getElementById('modalStudentName').textContent = studentName;
        document.getElementById('modalViolation').textContent = violation;
        document.getElementById('modalDate').textContent = date;
        document.getElementById('modalAppealDetails').textContent = appealDetails;
        document.getElementById('replyModal').style.display = 'block';
    }

    // Close modal
    function closeModal() {
        document.getElementById('replyModal').style.display = 'none';
    }

    // Submit reply function (this should handle form submission logic, e.g., AJAX or form post)
    function submitReply() {
        let replyMessage = document.getElementById('replyMessage').value;
        if (replyMessage) {
            alert("Reply sent: " + replyMessage);
            closeModal();
            // You can add further logic to submit the reply to the backend.
        } else {
            alert("Please enter a reply.");
        }
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function(event) {
        let modal = document.getElementById('replyModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function navigateTo(pagename) {
        window.location.href = pagename;
    }

    document.getElementById('logout-link').addEventListener('click', function(event) {                  
        event.preventDefault();                           
        var confirmation = confirm('Are you sure you want to log out?');                         
        if (confirmation) {
            window.location.href = "../../config/logout.php";
        }
    });

    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.txtR')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
</script>

<script>
    function navigateTo(pagename){
        window.location.href = pagename;
    }
</script>

<script>   
    document.getElementById('logout-link').addEventListener('click', function(event) {                  
        event.preventDefault();                           
        var confirmation = confirm('Are you sure you want to log out?');                         
        if (confirmation) {
            window.location.href = "../../config/logout.php";
        }
    });
</script>

<script>
    
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.txtR')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
</script>

<script>
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const container = document.querySelector('.container');
    const toggleButton = document.querySelector('.toggle-btn');

    sidebar.classList.toggle('open');
    container.classList.toggle('shifted');
    toggleButton.classList.toggle('hidden'); // Toggle the hidden class
}

</script>
</html>