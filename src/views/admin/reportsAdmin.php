<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
    function fetchType($conn, $attribute, $table, $condition,$id){
        $query = "SELECT $attribute FROM $table WHERE $condition = ?";
        $type = "";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $type = $row[$attribute];
                }
            }
        }
        return $type;
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
                report.reportName,
                report.report_ID,
                report.reportOwnerID,
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
                    $complainant = fetchName($conn, $row["reportOwnerID"]);
                    $violation = fetchType($conn, "violationTypeName", "violationtype", "violationType_ID", $row["violationTypeID"]);
                    $array[] = [
                        "reportName" => $row["reportName"],
                        "name" => $name,
                        "complainant" => $complainant,
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
    function fetchComplaintReport($conn, array $array){
        $query = "
        SELECT
            report.reportName,
            report.report_ID,
            report.reportOwnerID,
            complainsreport.cr_Category,
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
            complainsreport ON report.report_ID = complainsreport.reportID;
        ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $array = [];
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = fetchName($conn, $row["reportOwnerID"]);
                    $complaint = fetchType($conn, "ccName", "complains_category", "ccID", $row["cr_Category"]);
                    $array[] = [
                        "reportName" => $row["reportName"],
                        "complainant" => $name,
                        "reportID" => $row["report_ID"],
                        "complaint" => $complaint,
                        "attachment" => $row["fileName"],
                        "details" => $row["status_DETAILS"],
                        "status" => $row["status"]
                    ];
                }
            }
        }
        return $array;
    }
    function fetchData($conn, array $merged){
        $tempArr1 = [];
        $tempArr2 = [];
        $vArray = fetchViolationReport($conn, $tempArr1);
        $cArray = fetchComplaintReport($conn, $tempArr2);
        $merged = [
            "violations" => $vArray,
            "complaints" => $cArray
        ];
        return $merged;
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

.tablecon {
    display: flex;
    justify-content: center;
    height: 550px;
    padding: 20px 0; /* Add padding for overall layout */
}

.table {
    display: flex;
    width: 80%;
    height: 100%; /* Changed to 100% for full alignment */
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden; /* Hide any overflow */
    background-color: #f8f9fd; /* Light background for better readability */
}

/* Sidebar with reports list */
.table1 {
    width: 30%;
    background-color: #fff;
    overflow-y: auto;
    border-right: 1px solid #ccc;
    padding: 10px 15px; /* Add more padding */
}

.report-list {
    display: flex;
    flex-direction: column;
    gap: 8px; /* Spacing between each report item */
    overflow-y: auto;
}

.report-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s;
    border: 1px solid #ddd;
}

.report-item:hover {
    background-color: #f0f1f7;
}

.report-item.active {
    background-color: #eef2fc;
}

.student-photo {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    margin-right: 12px;
    border: 2px solid #34408D;
}

.report-info {
    flex-grow: 1;
}

.report-info p {
    font-weight: bold;
    color: #34408D;
    margin: 0;
}

.violation {
    font-size: 0.85em;
    color: #888;
}

/* Main content styling */
.main-content {
    width: 70%;
    padding: 25px;
    background-color: #fff;
    overflow-y: auto;
}

h2 {
    font-size: 1.2rem;
    margin: 0 0 12px;
    color: #333;
}

.details {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}

.details-photo {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: 12px;
}

.details-info p {
    margin: 0;
    font-size: 0.9rem;
    color: #555;
}

/* Violation Details Section */
.violation-details h3 {
    font-size: 1rem;
    margin: 16px 0 8px;
    color: #333;
}

.violation-details p {
    font-size: 0.9rem;
    color: #666;
    margin: 0 0 10px;
}

.rep-attachment {
    font-size: 0.9rem;
    color: #007bff;
    text-decoration: none;
}

.rep-attachment:hover {
    text-decoration: underline;
}

@media (max-width: 480px) {
    .details {
        flex-direction: column;
        align-items: flex-start;
    }

    .details-photo {
        margin: 0 0 8px;
    }
}

.attachment {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    color: #34408D;
    background-color: #E6C213;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background 0.3s;
}

.attachment:hover {
    background-color: #d1b10d;
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

            <div class="tablecon">
            <div class="table">
                <!-- Sidebar with list of reports -->
                <div class="table1">
                <div class="report-list">
    <!-- Repeat this block for each report item, updating the index -->
     <?php
     $tempTest = [];
     $merged = fetchData($conn, $tempTest);
     $tempdump = array();
     $reportslist = fetchViolationReport($conn, $tempdump);
     $index = 0;
     // Loop through each category
    foreach ($merged as $category => $items) {
        // echo "Category: " . ucfirst($category) . "\n"; // Display the category name

        // Loop through each item in the category
        foreach ($items as $item) {
            // Check if the category is violations
            if ($category === 'violations') {
                $reportClass = ($item['status'] != 'Read') ? 'unread' : 'read';
                echo "
                <div 
                data-id = 'report-$item[reportID]' 
                id='report-$item[reportID]' 
                class='report-item active $reportClass' 
                onclick='showDetails(\"$category\" ,$index)'>
                    <img src='../../../public/assets/images/mf.jpg' class='student-photo'>
                    <div class='report-info'>
                        <div class='mc-header' style='display: flex;'>
                            <div class='mch-left'><p>$item[complainant]</p></div>
                            <div class='mch-right'><p>$item[status]</p></div>
                        </div>
                        <small>Wed 2:11 PM</small>
                        <p class='violation'>$item[violation]</p>
                    </div>
                </div>
                ";
                $index++;
            } 
            // Check if the category is complaints
            else if ($category === 'complaints') {
                $reportClass = ($item['status'] != 'Read') ? 'unread' : 'read';
                echo "
                <div 
                data-id = 'report-$item[reportID]' 
                id='report-$item[reportID]' 
                class='report-item active $reportClass' 
                onclick='showDetails(\"$category\" ,$index)'>
                    <img src='../../../public/assets/images/mf.jpg' class='student-photo'>
                    <div class='report-info'>
                        <div class='mc-header' style='display: flex;'>
                            <div class='mch-left'><p>$item[complainant]</p></div>
                            <div class='mch-right'><p>$item[status]</p></div>
                        </div>
                        <small>Wed 2:11 PM</small>
                        <p class='violation'>$item[complaint]</p>
                    </div>
                </div>
                ";
                $index++;
            }
        }
    }
    //  foreach ($reportslist as $item) {
    //     $reportClass = ($item['status'] != 'Read') ? 'unread' : 'read';
    //     echo "
    //     <div data-id = 'report-$item[reportID]' id='report-$item[reportID]' class='report-item active $reportClass' onclick='showDetails($index)'>
    //         <img src='student-photo.jpg' alt='Student Photo' class='student-photo'>
    //         <div class='report-info'>
    //             <div class='mc-header' style='display: flex;'>
    //                 <div class='mch-left'><p>$item[name]</p></div>
    //                 <div class='mch-right'><p>$item[status]</p></div>
    //             </div>
    //             <small>Wed 2:11 PM</small>
    //             <p class='violation'>$item[violation]</p>
    //         </div>
    //     </div>
    //     ";
    //     $index++;
    // }
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
                        <img src='../../../public/assets/images/mf.jpg' alt="Student Photo" class="details-photo">
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
    $violationReports = fetchData($conn, $temp);
    $jsonified = json_encode($violationReports);
?>
<script> var reports = <?php echo $jsonified; ?> </script>
<script src="../../../public/assets/js/reportsAdmin.js">
</script>

<script>

function filterTable() {
    // Get the value of the search input and convert it to uppercase for case-insensitive search
    let input = document.getElementById('searchInput').value.toUpperCase();
    
    // Get all the report items in the list
    let reportItems = document.getElementsByClassName('report-item');
    
    // Loop through all report items to see if they match the search query
    for (let i = 0; i < reportItems.length; i++) {
        // Get the text content of the complainant, violation, and complaint fields
        let complainant = reportItems[i].getElementsByClassName('mch-left')[0].innerText;
        let status = reportItems[i].getElementsByClassName('violation')[0].innerText;
        
        // Check if the search query matches any of these fields
        if (complainant.toUpperCase().indexOf(input) > -1 || status.toUpperCase().indexOf(input) > -1) {
            // If it matches, display the report item
            reportItems[i].style.display = "";
        } else {
            // If not, hide the report item
            reportItems[i].style.display = "none";
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