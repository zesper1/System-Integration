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

.session-name{
    color: #000000;
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

/* mainbar */

.content{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
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
    width: 100%;
    font-size: 30px;
    margin-left: 60px;
    margin-top: 10px;
    }

    
    .graph{
    width: 87%;
    height: 550px;
    background-color: white;
    color: #34408D;
    font-family: 'pop';
    margin-left: 5%;
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
  
    #myChart {
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

<body>
    <div class="container">


         <!-- --------------<p>navbar</p>-------------------- -->
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
         <!-- --------------<p>navbar</p>-------------------- -->

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

        <line onclick="navigateTo('addAdmin.php')" class="dashB">
            <a href="addAdmin.php"><img src="../../../public/assets/images/add-user-3-xxl.png" class="dashPIC"></a>
            <label class="txtR"> ADD ADMIN</label>
        </line>


    </div>

        <div class="LO">
                <a id="logout-link" >
                    <img src="../../../public/assets/images/logout.png" class="dashPIC" alt="Logout">
                </a>
                <label class="txtR"> LOGOUT</label>
        </div>
        </div>
        <!-- --------------<p>sidebar</p>-------------------- -->

        

        <!-- --------------<p>mainbar</p>-------------------- -->    
        <div class="content">
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

            <div class="graph">
                <div id="chart-container">
                    <canvas id="myChart"></canvas>
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
                                        <th>Date Submitted</th>
                                        <th>Report Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example report rows -->
                                    <tr>
                                        <td>001</td>
                                        <td>2024-10-01</td>
                                        <td>Violation</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td>002</td>
                                        <td>2024-10-03</td>
                                        <td>Appeal</td>
                                        <td>Reviewed</td>
                                    </tr>
                                    <tr>
                                        <td>003</td>
                                        <td>2024-10-05</td>
                                        <td>Complaint</td>
                                        <td>Resolved</td>
                                    </tr>
                                    <tr>
                                        <td>004</td>
                                        <td>2024-10-07</td>
                                        <td>Violation</td>
                                        <td>Pending</td>
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
  const ctx = document.getElementById('myChart').getContext('2d');

  const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

  const reportData = [20, 39, 57, 23, 43, 45, 16, 32, 18, 28, 3, 61];
  const violationData = [3, 7, 6, 10, 13, 24, 15, 19, 30, 70, 25, 31];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Reports',
      data: reportData,
      borderColor: 'blue',
      fill: false
    }, {
      label: 'Violations',
      data: violationData,
      borderColor: 'red',
      fill: false
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true, 
    maintainAspectRatio: false, 
      responsive: true,
      maintainAspectRatio: false,
      title: {
        display: true,
        text: 'Monthly Reports and Violations'
      }
    }
  };

  const myChart = new Chart(ctx, config);


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