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
                    <label class="txtR"> VIEW VIOALTIONS</label>
                </line>
        
                <line onclick="navigateTo('reportsAdmin.php')" class="dashB">
                    <img src="../../../public/assets/images/report.png" class="dashPIC">
                    <label class="txtR"> WRITE A REPORT</label>
                </line>
                
                <line onclick="navigateTo('reportsAdmin.php')" class="dashB">
                    <img src="../../../public/assets/images/report.png" class="dashPIC">
                    <label class="txtR"> WRITE AN APPEAL</label>
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
                        <label class="hello"> VIEW VIOLATIONS
                            <?php
                                echo $_SESSION["name"];
                            ?>
                        </label>
                    </div>
                </div>
            </div>
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
                        <tr>
                            <td>1</td>
                            <td>2024-10-10</td>
                            <td>John Doe</td>
                            <td>Cheating in exams</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2024-10-05</td>
                            <td>Jane Smith</td>
                            <td>Plagiarism in assignment</td>
                            <td>Resolved</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2024-09-29</td>
                            <td>Sam Brown</td>
                            <td>Late submission</td>
                            <td>Pending</td>
                        </tr>
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

</html>