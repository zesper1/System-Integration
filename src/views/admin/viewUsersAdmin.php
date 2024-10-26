<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
    function fetchRole($conn, $roleID){
        $stmt = $conn->prepare("SELECT rolename FROM roles WHERE role_ID = ?");
        $stmt->bind_param("i", $roleID);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row["rolename"];
            }
        }
        $result->free();
        $stmt->close(); 
    }
    function fetchName($conn, $userID){
        $fetchName = $conn->prepare("SELECT * FROM userdetails WHERE userID=?");
        $fetchName->bind_param("i", $userID);
        $fetchName->execute();
        $fnRes = $fetchName->get_result();
        if($fnRes){
            if($fnRes->num_rows > 0){
               $row1 = $fnRes->fetch_assoc();
                return $row1['last_name'] . ", " . $row1['first_name'];
            }
        }
        $fnRes->free();
        $fetchName->close(); 
    }
    function displayData($conn){
        $stmt = $conn->prepare("SELECT * FROM user");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $email = $row["email"];
                $role = fetchRole($conn, $row["role_ID"]);
                $name = fetchName($conn, $row["user_ID"]);
                echo "
                    <tr>
                        <td>$row[user_ID]</td>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$role</td>
                        <td class='actions'>
                            <a href='#' class='btn btn-edit' onClick='openViewModal(". json_encode($row["user_ID"]) .", " . json_encode($name) . ", " . json_encode($email) . ", " . json_encode($role) . ")'>Edit</a>
                        </td>
                    </tr>
                ";


            }
        }
        $result->free();
        $stmt->close(); 
    }
    function fetchRoleSelect($conn){
        $stmt = $conn->prepare("SELECT * FROM roles");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                    <option id='" . htmlspecialchars($row['role_ID'], ENT_QUOTES) . "' value='" . htmlspecialchars($row['role_ID'], ENT_QUOTES) . "'>". htmlspecialchars($row['rolename'], ENT_QUOTES) ."</option>
                    ";
            }
        }
        $result->free();
        $stmt->close(); 
    }

if (isset($_SESSION['update_success'])) {
    echo "<script>alert('" . $_SESSION['update_success'] . "');</script>";
    unset($_SESSION['update_success']);
}

if (isset($_SESSION['update_error'])) {
    echo "<script>alert('" . $_SESSION['update_error'] . "');</script>";
    unset($_SESSION['update_error']);
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewUserAdmin</title>
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
    font-family: 'pop';
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

   
    .wow{
        display: flex;
    }
    .rep{
        width: 57.5%;
        display: flex;
        justify-content: end;
        margin-bottom: 1%;
    }

    .rep1{
        width: 32.5%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1%;
        font-family: 'pop';
        color: #35408E;
        font-size: 20px;
        padding-top: 1%;
    }


.glass {
  width: 250px; 
  background-color: white;
  display: flex; 
  align-items: center; 
  padding: 0 15px;
  margin-top: 10px;
  height: 35px;
  margin-left: 10px;
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

.tablecon{
    display: flex;
    justify-content: center;
    height: 550px;
    background-color: white;
    width: 80%;
    overflow: auto;
}

.wrapper{
    display: flex;
    justify-content: center;
    height: 550px;
}

        table {
            width: 100%;
            height: auto;
            border-collapse: collapse;
            overflow: scroll;
            margin-top: 2%;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #34408D;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn {
            padding: 8px 12px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #4CAF50;
        }

        .btn-delete {
            background-color: #f44336;
        }

 /* Modal Overlay */
.modal {
    display: none; /* Initially hidden */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    transition: opacity 0.3s ease;
}

.modal.show {
    display: block; /* Display modal when active */
    opacity: 1; /* Smooth fade-in effect */
}

.modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #34408D;
    border-top: 40px solid #2b3377;
    width: 40%;
    max-width: 500px; /* Max width for larger screens */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    position: relative;
    font-family: 'Arial', sans-serif; /* Consistent font */
}

/* Labels for form fields */
.modal-content label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    font-size: 14px;
    color: #333; /* Dark text color */
}

/* Inputs for form fields */
.modal-content input[type="text"], .modal-content select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

.modal-content input[type="text"]:focus, .modal-content select:focus {
    outline: none;
    border-color: #34408D; /* Highlight input border on focus */
}

/* Submit button styling */
.modal-content input[type="submit"] {
    background-color: #34408D;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
}

.modal-content input[type="submit"]:hover {
    background-color: #2b3377; /* Darken on hover */
}

/* Close button styling */
#closeBtn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    background: none;
    border: none;
    color: #888;
    cursor: pointer;
    transition: color 0.3s ease;
}

#closeBtn:hover {
    color: #333; /* Darker color on hover */
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .modal-content {
        width: 90%;
    }
}


</style>
<body>
    <div class="container">
        <div class="modal hidden" id="view-modal">
            <div class="modal-content">
                <form action="../../config/updateUser.php" method="post">
                    <input type="hidden" name="userID" id="userID_upd">

                    <label for="first_name">First Name:</label>
                    <input type="text" name="FirstName" id="FirstName_upd">

                    <label for="last_name">Last Name:</label>
                    <input type="text" name="LastName" id="LastName_upd">

                    <label for="email">Email:</label>
                    <input type="text" name="Email" id="Email_upd">

                    <label for="role">Role:</label>
                    <select name="Role" id="Role_upd" required><?php fetchRoleSelect($conn); ?></select>

                    <input type="submit" value="Submit" name="updateUser">
                </form>
                <button id="closeBtn" onclick="closeModal()">&times;</button>
            </div>
        </div>
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

        <line class="dashB" style="position: relative;">
        <img src="../../../public/assets/images/add-user-3-xxl.png" class="dashPIC">
        <label class="txtR" onclick="toggleDropdown()"> ADD USER ▼</label>
        
        <!-- Dropdown Menu -->
        <div id="dropdown" class="dropdown-content">
                <a href="../admin/addAdmin.php">Admin</a>
                <a href="../admin/addFaculty.php">Faculty</a>
            </div>
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

        <div class="wow">
        <div class="rep1">
        <label class="rec">RECEIVED REPORTS</label>
        </div>
        <div class="rep">
        <div class="glass">
        <input type="text" placeholder="Search" id="searchInput" onkeyup="filterTable()">
        </div>
        </div>
        </div>

            <div class="wrapper">
            <div class="tablecon">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample data -->
                        <?php displayData($conn); ?>
                        <!-- <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>johndoe@example.com</td>
                            <td>Admin</td>
                            <td class="actions">
                                <a href="#" class="btn btn-edit">Edit</a>
                                <a href="#" class="btn btn-delete">Delete</a>
                            </td>
                        </tr> -->
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
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
<script src="../../../public/assets/js/viewUsersAdmin.js"></script>
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
function filterTable() {
    // Get the value from the input field and convert it to uppercase for case-insensitive matching
    let input = document.getElementById('searchInput').value.toUpperCase();
    
    // Get the table and its rows
    let table = document.querySelector('table tbody');
    let tr = table.getElementsByTagName('tr');              

    // Loop through all table rows, and hide those that don't match the search query
    for (let i = 0; i < tr.length; i++) {
        let tdName = tr[i].getElementsByTagName('td')[1];  // Assuming Name is in the second column
        let tdEmail = tr[i].getElementsByTagName('td')[2]; // Assuming Email is in the third column

        if (tdName || tdEmail) {
            let nameValue = tdName.textContent || tdName.innerText;
            let emailValue = tdEmail.textContent || tdEmail.innerText;

            if (nameValue.toUpperCase().indexOf(input) > -1 || emailValue.toUpperCase().indexOf(input) > -1) {
                tr[i].style.display = "";  // Show the row
            } else {
                tr[i].style.display = "none";  // Hide the row
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