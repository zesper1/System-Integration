<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admindb</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    .col{
        width: 50%;
        margin-left: 2%;
        display: flex;
        justify-content: center;
        color: #35408E;
        font-family: 'pop';
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


/* mainbar */

.content{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
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

    
    .graph{
    width: 80%;
    height: 550px;
    background-color: white;
    color: #34408D;
    font-family: 'pop';
    margin-top: 2%;
    overflow: auto;
    }

    #chart-container {
      width: 90%;
      height: 400px;
      justify-content: center;
      margin: 20px auto; 
      border: 1px solid #ddd; 
      border-radius: 5px; 
      background-color: #f5f5f5; 
      display: flex;
      flex-grow: 1;
      align-items: center;
      margin-top: 5%;
    }
  
    #weeklyReportChart {
      width: 100%;
      height: 100%;
    }
  
    /* Axes styling */
    .chartjs-axis {
      color: #333; 
    }
  
    .chartjs-tick-line {
      stroke: #ddd; 
    }
  
    /* Title styling */
    .chartjs-title {
      font-size: 18px; 
      color: #333; 
    }
  
    /* Legend styling */
    .chartjs-legend {
      font-size: 14px; 
    }
  
    /* Data point styling (example) */
    .chartjs-point {
      stroke-width: 2px; 
    }

    .txt{
        display: flex;
        justify-content: center;
        font-size: 25px;
    }

    .table{
            width: 100%;
            display: flex;
            height: fit-content;
            flex-direction: column;

        }

        .tbl1{
            display: flex;
        }

        .tblcontent{
            width: 100%;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        /* Table Styling */
        .report-table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            font-family: 'pop';
        }

        .report-table th, .report-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .report-table th {
            background-color: #34408D;
            color: white;
        }

        .report-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .report-table tr:hover {
            background-color: #ddd;
        }

        .report-table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #34408D;
            color: white;
        }
</style>
<?php
    //include "../../connection/db_conn.php";
    //session_start();
    function displayToTable() {
        global $conn;
    
        $displayQuery = "
            SELECT 
                r.report_ID AS reportID,
                r.reportType AS reportType,
                rs.status_Date AS reportDate,
                rs.status_Details AS violationDetail,
                CONCAT(ud.first_name, ' ', ud.last_name) AS violator 
            FROM 
                report r
            JOIN 
                reportStatus rs ON r.report_ID = rs.reportID
            JOIN 
                violationreport vr ON r.report_ID = vr.reportID
            JOIN 
                userdetails ud ON vr.accusedID = ud.userID
            ORDER BY 
                rs.status_Date DESC LIMIT 25;";
    
        $result = $conn->query($displayQuery);
    
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['reportID']) . "</td>
                        <td>" . htmlspecialchars($row['reportType']) . "</td>
                        <td>" . htmlspecialchars($row['reportDate']) . "</td>
                        <td>" . htmlspecialchars($row['violationDetail']) . "</td>
                        <td>" . htmlspecialchars($row['violator']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No reports found.</td></tr>";
        }
    }
    
?>
<body>
    <div class="container">


         <!-- --------------<p>navbar</p>-------------------- -->
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
         <!-- --------------<p>navbar</p>-------------------- -->

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

            <div class="graph">
                <div id="chart-container">
                    <canvas id="weeklyReportChart"></canvas>
                  </div>
            
                  <div class="txt">
                    LINE GRAPH OF REPORTS AND VIOLATION IN NU DASMARIÑAS
                  </div>

                  <div class="table">

                    <div class="tbl">
                        <!-- Main bar section with table -->
                        <div class="tblcontent">
            
                            <!-- Reports Table -->
                            <table class="report-table">
                                <thead>
                                    <tr>
                                        <th>Report ID</th>
                                        <th>Report Type</th>
                                        <th>Report Date</th>
                                        <th>Violation Detail</th>
                                        <th>Violator</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example report rows -->
                                    <tr>
                                        <?php displayToTable();?>
                                    </tr>
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
</body>

<script>
    function navigateTo(pagename){
        window.location.href = pagename;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
   // Fetch the data from your PHP script (Assume it's being served at /chart-data)
   fetch('../../config/graphModel.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Extract the weeks and totals from the JSON response
            const weeks = data.weeks;
            const totalReport = data.totalReports;
            const totalViolation = data.totalViolations;

            // Create a Chart.js chart
            const ctx = document.getElementById('weeklyReportChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line', // You can change this to 'bar', 'pie', etc.
                data: {
                    labels: weeks, // The weeks will appear on the X-axis
                    datasets: [{
                        label: 'Reports',
                        data: totalReport, // The totals will be plotted on the Y-axis
                        backgroundColor: 'none',
                        borderColor: 'blue',
                        borderWidth: 1
                    },
                    {
                        label: 'Violations',
                        data: totalViolation, // The totals will be plotted on the Y-axis
                        backgroundColor: 'none',
                        borderColor: 'red',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Week'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Total Reports and Violations'
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching the chart data:', error));
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