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
        width: 50%;
        align-items: center;
    }

    .logo{
    width: 100%;
    display: flex;
    color: white;
    margin-left: 10px;
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

.sidebar{
background-color: white;
width: 25%;
height: 92vh;
}

.overview{
    width: 100%;
    height: 10%;
    font-size: 15px;
    display: flex;
    align-items: start;
    justify-content:left;
    align-items: end;
    color: #AFB1C2;
    margin-left: 40px;
}

.dashboard{
    width: 100%;
    height: 80%;  
    display: flex;
    flex-direction: column;
    align-content: center;
}

.dashboard .dashB{
    width: 100%;
    height: 15%;
    display: flex;
    align-items: center;
    justify-content: left;
    margin-top: 10px;

}

.dashboard .dashPIC{
    width: 30px;
    height: 30px;
    margin-left: 40px;
    cursor: pointer;
}

.dashboard .txtR{
    font-size: 20px;
    color: #595959;
    margin-left: 30px;
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

.LO{
    display: flex;
    height: 10%;
    align-content: end;
    margin-top: 10%;
    width: 100%;
}

.LO .dashPIC{
    width: 30px;
    height: 30px;
    margin-left: 40px;
    cursor: pointer;
}

.LO .txtR{
    font-size: 20px;
    color: #595959;
    margin-left: 30px;
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
        width:100%;
        height: 55px;
        display: flex;
        justify-content: start;
        color: #35408E;
        font-family: 'pop';
    }

    .text{
        color: #35408E;
        display: flex;
    align-items: center;
    justify-content: start;
    height: 100%;
    width: 50%;
    font-size: 30px;
    margin-left: 60px;
    margin-top: 10px;
    }

    .rep{
        width: 50%;
        display: flex;
    }

    .input-box1{
    width: 130px;
    border-radius: 10px;
    color: #34408D;
    margin-top: 10px;
} 

.input-box1 select {
    display: flex;
    align-items: center;
  width: 100%;
  height: 35px;
  cursor: pointer;
  font-size: 15px;
  font-family: 'pop';
  color: black;
  background-color: white;
}

.input-box1 select::after {
  content: '\25BC'; 
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 12px;
  color: #999;
}

.input-box1 select option {
  text-align: center; 
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
    height: 80%;
}

h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
    background-color: rgba(0,0,0,0.5); /* Semi-transparent black */
    transition: opacity 0.3s ease;
}

.modal.show {
    display: block; /* Display modal */
    opacity: 1; /* Fade in */
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #888;
    border-top: 30px solid #2b3377;
    width: 60%;
    max-width: 600px; /* Max width for larger screens */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: relative;
    text-align: center;
}

.modal-content input {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

.modal-content #closeBtn {
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

.modal-content #closeBtn:hover {
    color: #333; /* Darker color on hover */
}
</style>
<body>
    <div class="container">
        <div class="modal hidden" id="view-modal">
            <div class="modal-content">
                <form action="../../config/updateUser.php" method="post">
                    <input type="hidden" name="userID" id="userID_upd">
                    <input type="text" name="FirstName" id="FirstName_upd">
                    <input type="text" name="LastName" id="LastName_upd">
                    <input type="text" name="Email" id="Email_upd">
                    <select name="Role" id="Role_upd" required><?php fetchRoleSelect($conn); ?></select>
                    <input type="submit" value="Submit" name="updateUser">
                </form>
                <button id="closeBtn" onclick="closeModal()">&times;</button>
            </div>
        </div>
        <!-- --------------<p>topbar</p>-------------------- -->
        <div class="student">
            <div class="inf1">
            <div class="logo">
                <img src="../../../public/assets/images/NU_shield.svg.png" class="pic">
            <label class="NU">NATIONAL UNIVERSITY</label> 
            </div> 
        </div>
            <div class="inf">
          
            <div class="info2">
                <img src="../../../public/assets/images/bell.png" class="toplogo">
                <img src="../../../public/assets/images/settings.png" class="toplogo">
            </div>
        </div>
        </div>
        <!-- --------------<p>topbar</p>-------------------- -->

        <div class="con2">

        <!-- --------------<p>sidebar</p>-------------------- -->
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

        <line onclick="navigateTo('appealAdmin.php')" class="dashB">
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
    </div>
        <div class="LO">
                <a id="logout-link">
                    <img src="../../../public/assets/images/logout.png" class="dashPIC" alt="Logout">
                </a>
                <label class="txtR">LOGOUT</label>
        </div>
        </div>
        <!-- --------------<p>sidebar</p>-------------------- -->
         
        <!-- --------------<p>mainbar</p>-------------------- -->

        <div class="content">

            <div class="content1">
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

            <div class="rep">
                <div class="input-box1">
                    <select name="role" placeholder="Select a role">             
                        <option value=""disabled selected>Select Filter</option >   
                      <option value="admin">Pending</option >
                      <option value="user">Solved</option>
                    </select>
                  </div>

                  <div class="glass">
                    <input type="text" placeholder="Search">
                </div>
            </div>
            </div>

            <div class="tablecon">
            <div class="table">
                <h2>User List</h2>
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

</html>