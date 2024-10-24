<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
    function fetchViolationType($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM violationtype WHERE violationType_ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $violationName = $row["violationTypeName"];
                }
            }
        }
        return $violationName;
    }
    function fetchName($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM userdetails WHERE userID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $name = $row['first_name'] . " " . $row['last_name'];
                }
            }
        }
        return $name;
    }
    function fetchViolationReport($conn, array $array){
        $stmt = $conn->prepare("
            SELECT 
                report.report_ID,
                violationreport.accusedID,
                violationreport.violationTypeID,
                attachment.fileName,
                reportstatus.status_DETAILS,
                reportstatus.status
            FROM 
                report 
            LEFT JOIN 
                attachment ON report.report_ID = attachment.reportID 
            JOIN 
                reportstatus ON report.report_ID = reportstatus.reportID
            JOIN 
                violationreport ON report.report_ID = violationreport.reportID;
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $array = []; // Initialize the array
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = fetchName($conn, $row["accusedID"]);
                    $violation = fetchViolationType($conn, $row["violationTypeID"]);
                    $array[] = [
                        "name" => $name,
                        "id" => $row["accusedID"],
                        "reportID" => $row["report_ID"],
                        "violation" => $violation,
                        "attachment" => $row["fileName"],
                        "details" => $row["status_DETAILS"],
                        "status" => $row["status"]
                    ];
                }
            }
        }
        return $array;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reportsAdmin</title>
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

/* table */

.tablecon{
    display: flex;
    justify-content: center;
    height: 80%;
}
.table {
    display: flex;
    width: 80%;
    height: 90%;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.table1 {
    width: 30%;
    background-color: #fff;
    overflow-y: auto; /* Make scrollable */
    border-right: 1px solid #ccc;
    padding: 10px;
    max-height: 100%; /* Ensure it doesn’t exceed parent height */
}


.report-list {
    display: flex;
    flex-direction: column;
}

.report-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #eee;
    cursor: pointer;
}

.report-item.active {
    background-color: #f0f0f0;
}

.student-photo {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.report-info p {
    font-weight: bold;
    color: #34408D;
}

.violation {
    font-size: 0.85em;
    color: #888;
}

/* Main Content */
.main-content {
    width: 70%;
    padding: 20px;
    background-color: #fff;
    display: none;
}



.main-content h2 {
    color: #34408D;
    margin-bottom: 20px;
}

.details {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.details-photo {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-right: 20px;
}

.details-info p {
    color: #34408D;
    margin-bottom: 5px;
}

.violation-details {
    color: #34408D;
}

.attachment {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    color: #34408D;
    background-color: #E6C213;
    padding: 8px 12px;
    border-radius: 5px;
}

.attachment:hover {
    background-color: #d1b10d;
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

    </div>

        <div class="LO">
                <a id="logout-link">
                    <img src="../../../public/assets/images/logout.png" class="dashPIC" alt="Logout">
                </a>
                <label class="txtR"> LOGOUT</label>
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
                <!-- Sidebar with list of reports -->
                <div class="table1">
                <div class="report-list">
    <!-- Repeat this block for each report item, updating the index -->
     <?php
     $tempdump = array();
     $reportslist = fetchViolationReport($conn, $tempdump);
     $index = 0;
     foreach ($reportslist as $item) {
        $reportClass = ($item['status'] != 'Read') ? 'unread' : 'read';
        echo "
        <div data-id = 'report-$item[reportID]' id='report-$item[reportID]' class='report-item active $reportClass' onclick='showDetails($index)'>
            <img src='student-photo.jpg' alt='Student Photo' class='student-photo'>
            <div class='report-info'>
                <div class='mc-header' style='display: flex;'>
                    <div class='mch-left'><p>$item[name]</p></div>
                    <div class='mch-right'><p>$item[status]</p></div>
                </div>
                <small>Wed 2:11 PM</small>
                <p class='violation'>$item[violation]</p>
            </div>
        </div>
        ";
        $index++;
    }
     ?>
    <!-- <div class="report-item active" onclick="showDetails(0)">
        <img src="student-photo.jpg" alt="Student Photo" class="student-photo">
        <div class="report-info">
            <p>Rovic Batacandolo</p>
            <small>Wed 2:11 PM</small>
            <p class="violation">Public Display of Affection</p>
        </div>
    </div> -->
    <!-- Add more report items here with unique onclick="showDetails(index)" -->
</div>

                </div>
        
                <!-- Main content area to show report details -->
                <div class="main-content">
                    <h2>Report Details</h2>
                    <div class="details">
                        <img src="student-photo.jpg" alt="Student Photo" class="details-photo">
                        <div class="details-info">
                            <p id="stud-name"><strong>Student Name:</strong> Rovic Batacandolo</p>
                            <p id="stud-id"><strong>Student ID:</strong> 2022-171700</p>
                            <p id="stud-vio"><strong>Violation:</strong> Public Display of Affection</p>
                        </div>
                    </div>
                    <div class="violation-details">
                        <h3>Violation Details and Other Attachments</h3>
                        <p id="rep-desc">Rovic Batacandolo was caught with his significant other kissing near the fire exit around 3:09 pm, dated August 30, 2024. The report was submitted by an admin and the ID of the reported student was confiscated.</p>
                        <a href="#" class="rep-attachment" id="rep-attch">View Attachment</a>
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
<?php
    $temp = array();
    $violationReports = fetchViolationReport($conn, $temp);
    $jsonified = json_encode($violationReports);
?>
<script> var reports = <?php echo $jsonified; ?> </script>
<script src="../../../public/assets/js/reportsAdmin.js"></script>

</html>