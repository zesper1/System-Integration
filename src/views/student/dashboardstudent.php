<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentDB</title>
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
        justify-content: center;
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
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 20px;
}

/* Table Section Container */

.label{
    font-size: 20px;
    width: 80%;
    font-family: 'pop';
    color: #35408E;
    height: 25px;
    display: flex;
    align-items: end;
    align-content: end;
    justify-content: start;
}
.main-table{
    display: flex;
}

.table1{
    width: 80%;
    height: auto;
    max-height: 250px;
    display: flex;
    flex-direction: column;
    background-color: #ffffff;
    border-collapse: collapse;
    font-family: 'pop';
    table-layout: fixed;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    padding-top: 2%;
    margin-bottom: 2%;
    overflow: auto;
}
.table2{
    width: 80%;
    height: auto;
    max-height: 250px;
    display: flex;
    flex-direction: column;
    background-color: #ffffff;
    border-collapse: collapse;
    font-family: 'pop';
    table-layout: fixed;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    padding-top: 2%;
    overflow: auto;
}

.table-container1 {
    width: 100%;
    display: flex;
    justify-content: center;
    height: auto;
    overflow-y: auto; 
}

.table-container2 {
    width: 100%;
    display: flex;
    height: auto; 
    overflow-y: auto; 
    justify-content: center;
}

.table-container::-webkit-scrollbar-thumb {
    background-color: #34408D; /* Color of the scrollbar */
    border-radius: 10px; /* Rounded edges */
}

.table-container::-webkit-scrollbar-track {
    background-color: #f2f2f2; /* Background of the track */
}

.table-section {
    margin-bottom: 30px;
    padding: 0 20px;
}

/* Table Section Header */
.table-section h2 {
    font-size: 24px;
    color: #35408E;
    font-family: 'pop';
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

.table-container {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

table {
    width: 90%;
    border-collapse: collapse;
    font-family: 'pop';
    background-color: #ffffff;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
}

table thead {
    background-color: #34408D;
    color: white;
    font-size: 18px;
}

table th, table td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tbody tr:hover {
    background-color: #e0e0e0;
}

table tbody td {
    font-size: 16px;
    color: #333;
}

.tableBtn{
    width: 100px;
    padding: 5px 10px;
    font-family: 'pop';
    border: none;
    color: white;
    background-color: #34408D;
    margin-inline: 5px;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
} 

.tableBtn:hover {
    background-color: #2b3377; /* Darker background on hover */
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

.session-name{
    color: #E6C213;
}

a.dashB {
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 10px;
}

a.dashB img.dashPIC {
    margin-right: 10px;
}


</style>
<?php
    //include "../../connection/db_conn.php";
    //session_start();
    $userID = $_SESSION["id"]; 


    $violationQuery = "
    SELECT
        v.violation_ID, 
        vt.violationTypeName, 
        s.severity_LEVEL, 
        v.violation_Date,
        CONCAT(userdetails.first_name,' ', userdetails.last_name) AS name
    FROM 
        violation v 
    JOIN 
        violationtype vt ON v.violationType_ID = vt.violationType_ID 
    JOIN 
        severity s ON v.severity_ID = s.severity_ID 
    JOIN
        userdetails ON v.violator_ID = userdetails.userID
    WHERE 
        v.violator_ID = ?";
    $stmt = $conn->prepare($violationQuery);
    $stmt->bind_param("i", $userID); 
    $stmt->execute();
    $violationsResult = $stmt->get_result();
    $violations = $violationsResult->fetch_all(MYSQLI_ASSOC);


    $reportQuery = "SELECT r.report_ID, CONCAT(ud.first_name, ' ', ud.last_name) AS student_name, r.reportName, rs.status, rs.status_DATE
                    FROM report r 
                    JOIN userdetails ud ON r.reportOwnerID = ud.userID 
                    JOIN reportstatus rs ON r.report_ID = rs.reportID 
                    WHERE r.reportOwnerID = ?";
    $stmt = $conn->prepare($reportQuery);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $reportsResult = $stmt->get_result();
    $reports = $reportsResult->fetch_all(MYSQLI_ASSOC);
?>
<body>
    <div class="container">
    <div class="modal hidden" id="view-modal">
            <div class="modal-content">
                <div class="mc-header">
                    You have been found guilty for doing: <input id="violationName" type="text" readonly>
                </div>
                <div class="mc-date">
                    Submitted on: <input id="violationDate" type="text" readonly>
                </div>
                <div class="mcr-details" id="mc-repdet">
                    Report Description: <span id="mcrepdet"></span>
                </div>
                <div class="mcr-attachment">
                    Attachment to support the claim: <img src="" alt="" id="mc-attch" width="100px" height="100px">
                </div>
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

        <line onclick="navigateTo('dashboardstudent.php')" class="dashB">
            <img src="../../../public/assets/images/dashboard.png" class="dashPIC">
            <label class="txtR"> DASHBOARD</label>
        </line>
        
        <line onclick="navigateTo('reportStudent.php')" class="dashB">
            <img src="../../../public/assets/images/report.png" class="dashPIC">
            <label class="txtR"> REPORTS</label>
        </line>
        
        <line onclick="navigateTo('appealStudent.php')" class="dashB">
            <a href="appealStudent.php"><img src="../../../public/assets/images/paper.png" class="dashPIC"></a>
            <label class="txtR"> APPEAL</label>
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
    
<!-- Received Violations Table -->

<div class="label">RECEIVED VIOLATIONS</div>
<div class="table1">
<div class="table-section">
    <div class="table-container1">
        <table>
            <thead>
                <tr>
                    <th>Violation ID</th>
                    <th>Violation Type</th>
                    <th>Violation Severity</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($violations)) : ?>
                    <?php foreach ($violations as $violation) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($violation['violation_ID']); ?></td>
                            <td><?php echo htmlspecialchars($violation['violationTypeName']); ?></td>
                            <td><?php echo htmlspecialchars($violation['severity_LEVEL']); ?></td>
                            <td><?php echo htmlspecialchars($violation['violation_Date']); ?></td>
                            <td>
                                <a class="tableBtn" href="appealStudent.php?violationID=<?php echo htmlspecialchars($violation['violation_ID']); ?>"> Appeal </a>
                                <a class="tableBtn" onclick="openViewModal('<?php echo addslashes(htmlspecialchars($violation['violationTypeName'])); ?>', 'Report details here...', 'sample.png', '<?php echo htmlspecialchars($violation['violation_Date']); ?>')"> View </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No violations found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<div class="label">FILED REPORTS</div>
<div class="table2">
                <!-- Filed Reports Table -->
                <div class="table-section">
                    <div class="table-container2">
                        <table>
                            <thead>
                                <tr>
                                    <th>Report ID</th>
                                    <th>Student Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Date Submitted</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($reports)) : ?>
                                    <?php foreach ($reports as $report) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($report['report_ID']); ?></td>
                                            <td><?php echo htmlspecialchars($report['student_name']); ?></td>
                                            <td><?php echo htmlspecialchars($report['reportName']); ?></td>
                                            <td><?php echo htmlspecialchars($report['status']); ?></td>
                                            <td><?php echo htmlspecialchars($report['status_DATE']); ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="4">No filed reports found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
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
<script src="../../../public/assets/js/dashBoardStudent.js"></script>

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