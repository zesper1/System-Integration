<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reportFaculty</title>
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
    padding: 20px;
    flex-direction: column;
}

/* Table Section Container */

.table-section {
    margin-bottom: 30px;
    padding: 0 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.table-container {
    width: 80%;
    display: flex;
    height: 550px; /* Set a fixed height */
    overflow: auto;
}

.table-container::-webkit-scrollbar-thumb {
    background-color: #34408D; /* Color of the scrollbar */
}

.table-container::-webkit-scrollbar-track {
    background-color: #f2f2f2; /* Background of the track */
}

table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'pop';
    background-color: #ffffff;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);

}


    .label{
    font-size: 20px;
    width: 22.5%;
    font-family: 'pop';
    color: #35408E;
    height: 25px;
    display: flex;
    align-items: end;
    align-content: end;
    justify-content: end;
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



/* Table Section Header */

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

            <line onclick="navigateTo('dashboardfaculty.php')" class="dashB">
                    <img src="../../../public/assets/images/report.png" class="dashPIC">
                    <label class="txtR"> WRITE A REPORT</label>
                </line>

                <line onclick="navigateTo('reportfaculty.php')" class="dashB">
                    <img src="../../../public/assets/images/bar.png" class="dashPIC">
                    <label class="txtR"> REPORT INFO</label>
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

    

    <!-- Filed Reports Table -->
    <div class="label">WRITE A REPORT</div>
    <div class="table-section">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Report ID</th>
                    <th>Report Date</th>
                    <th>Report Type</th>
                    <th>Details</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
    // Fetch all reports from the database
    $fetchReports = $conn->prepare("
     SELECT 
        report.report_ID, 
        report.reportType,
        reportstatus.status_DATE, 
        reportstatus.status_DETAILS, 
        reportstatus.status 
    FROM report
        LEFT JOIN user ON report.reportOwnerID = user.user_ID
        LEFT JOIN userdetails ON report.reportOwnerID = userdetails.userID
        LEFT JOIN reportstatus ON report.report_ID = reportstatus.reportID
    WHERE 
        user.role_ID = 2 AND  -- Fetch only reports submitted by admins (role_ID = 2)
        report.reportType IN ('Violation', 'Complaint')
    ORDER BY 
        reportstatus.status_DATE DESC;
    ");
    

    // Check if the SQL statement was prepared successfully
    if ($fetchReports === false) {
        // Output error details for debugging
        die("Error in SQL query preparation: " . $conn->error);
    }

    $fetchReports->execute();
    $reportResult = $fetchReports->get_result();

    // Check if there are reports to display
    if ($reportResult->num_rows > 0) {
        while ($row = $reportResult->fetch_assoc()) {
            echo "
            <tr>
                <td>{$row['report_ID']}</td>
                <td>{$row['status_DATE']}</td>
                <td>{$row['reportType']}</td>
                <td>{$row['status_DETAILS']}</td>
                <td>{$row['status']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No reports filed yet.</td></tr>";
    }
?>

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