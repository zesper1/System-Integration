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
    margin-left: 10px;
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
    padding: 20px;
}

/* Table Section Container */
.table-section {
    margin-bottom: 30px;
    padding: 0 20px;
}

/* Table Section Header */
.table-section h2 {
    font-size: 24px;
    color: #35408E;
    margin-bottom: 15px;
margin-left: 55px;
    font-family: 'pop';
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

            <a href="dashboardstudent.php" class="dashB">
            <img src="../../../public/assets/images/dashboard.png" class="dashPIC">
            <label class="txtR"> VIEW VIOLATIONS</label>
        </a>

        <a href="reportstudent.php" class="dashB">
            <img src="../../../public/assets/images/report.png" class="dashPIC">
            <label class="txtR"> WRITE A REPORT</label>
        </a>

        <a href="appealStudent.php" class="dashB">
            <img src="../../../public/assets/images/gavel-xl.png" class="dashPIC">
            <label class="txtR"> WRITE AN APPEAL</label>
        </a>
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
                <label class="hello"> VIEW VIOLATIONS
                <span class="session-name">
        <?php 
        // Display the session variable 'name'
        echo $_SESSION["name"]; 
        ?>
    </span>
                </label>
            </div>
        </div>
    </div>

    <!-- Received Violations Table -->
    <div class="table-section">
        <h2>Received Violations</h2>
        <div class="table-container">
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
                    <tr>
                        <td>2</td>
                        <td id="title">Nakabusangot</td>
                        <td id="name">3rd Offense</td>
                        <td id="date">12/10/2024</td>
                        <td>
                            <a class="tableBtn" href="appealStudent.php?violationID=2"> Appeal </a>
                            <a class="tableBtn" onclick="openViewModal('Nakabusangot', 'tite', 'sample.png', '12/10/24')"> View </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Filed Reports Table -->
    <div class="table-section">
    <h2>Filed Reports</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Report ID</th>
                    <th>Report Date</th>
                    <th>Student Name</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
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
</html>