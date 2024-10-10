<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addStudent</title>
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

.formcon{
          display: flex;
    justify-content: center;
    height: 80%;
        }
        .form {
            background-color: white;
            width: 60%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #34408D;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-table {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }

        .form-table label {
            display: block;
            font-weight: bold;
            color: #34408D;
            margin-bottom: 5px;
        }

        .form-table input[type="text"],
        .form-table input[type="email"],
        .form-table input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: 'pop', sans-serif;
        }

        .form-table .full-width {
            grid-column: span 3;
        }

        .form-table .half-width {
            grid-column: span 2;
        }

        .submit-btn {
            background-color: #34408D;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-family: 'pop', sans-serif;
            font-size: 16px;
            text-align: center;
            display: block;
            width: 100px;
            margin-left: auto;
        }

        .submit-btn:hover {
            background-color: #2b3675;
        }
</style>

<body>
    <div class="container">

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
                <a href="../admin/addStudent.php">User</a>
                <a href="../admin/addFaculty.php">Faculty</a>
            </div>
    </line>

</div>

    <div class="LO">
            <a id="logout-link">
                <img src="../../../public/assets/images/logout.png" class="dashPIC" alt="Logout">
            </a>
            <label class="txtR"><?php
                echo $_SESSION["name"];
            ?> LOGOUT</label>
    </div>
    </div>
    <!-- --------------<p>sidebar</p>-------------------- -->
         
        <!-- --------------<p>mainbar</p>-------------------- -->

        <div class="content">

            <div class="content1">
            <div class="col">
                <div class="text">
                    <label class="hello"> ADD ADMIN
                        <?php
                        // Check if the session variable 'id' is set
                        echo $_SESSION["name"];
                        ?>
                    </label>
                </div>
            </div> 
            </div>

            <div class="formcon">
            <div class="form">
                <h2>Add Admin</h2>
                <form action="addAdmin.php" method="post">
                    <div class="form-table">
                        <div>
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                        <div>
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div>
                            <label for="middleName">Middle Name:</label>
                            <input type="text" id="middleName" name="middleName">
                        </div>
                        <div>
                            <label for="program">Program:</label>
                            <input type="text" id="program" name="program">
                        </div>
                        <div>
                            <label for="yearLevel">Year Level:</label>
                            <input type="password" id="yearLevel" name="yearLevel" required>
                        </div>
                        <div>
                            <label for="studentId">Student ID:</label>
                            <input type="text" id="Student ID" name="Student ID"  required>
                        </div>
                        <div>
                            <label for="section">Section:</label>
                            <input type="text" id="section " name="section"  required>
                        </div>
                        <div>
                            <label for="nuEmail">NU Email:</label>
                            <input type="text" id="nuEmail " name="nuEmail"  required>
                        </div>
                        <div>
                            <label for="passowrd">Passowrd:</label>
                            <input type="text" id="passowrd " name="passowrd"  required>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn">Add</button>
                </form>
            </div>
            </div>

    </div>

     <!-- --------------<p>mainbar</p>-------------------- -->
           
        </div>   
    </div>
    </div>
    <?php
    if(isset($_SESSION['exists']) && $_SESSION['exists'] == true){
        echo "
            <script>
                alert('User already exists!');
            </script>
        ";
        $_SESSION['exists'] = false;
    } else {
         if(isset($_SESSION["success"])){
            if ($_SESSION["success"] == true){
                echo "
                <script>
                    alert('User registered successfully!');
                </script>
            ";
            $_SESSION["success"] = false;
            } else {
            }
         }
    }
?>   
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