<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
    $vioID = '';
    $vioName = '';
    $vioSeverity = '';
    $vioDate = '';
    if(isset($_GET['violationID'])){
       $vioID = $_GET['violationID'];
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>writeAppealStudent</title>
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

    .content{
            width: 100%;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .col{
            width: 100%;
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

        /* Form Styling */
        .report-form {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .report-form label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
            color: #34408D;
        }

        .report-form input, .report-form select, .report-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .report-form textarea {
            height: 100px;
        }

        .report-form button {
            padding: 10px 20px;
            background-color: #34408D;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .report-form button:hover {
            background-color: #2b357a;
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

            <line onclick="navigateTo('dashboardstudent.php')" class="dashB">
                    <img src="../../../public/assets/images/dashboard.png" class="dashPIC">
                    <label class="txtR"> VIEW VIOALTIONS</label>
                </line>
        
                <line onclick="navigateTo('reportstudent.php')" class="dashB">
                    <img src="../../../public/assets/images/report.png" class="dashPIC">
                    <label class="txtR"> WRITE A REPORT</label>
                </line>
                
                <line onclick="navigateTo('appealStudent.php')" class="dashB">
                    <img src="../../../public/assets/images/report.png" class="dashPIC">
                    <label class="txtR"> WRITE AN APPEAL</label>
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
                        <label class="hello"> APPEAL TO A VIOLATION
                            <?php
                                // echo $_SESSION["name"];
                            ?>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Report Form -->
            <form class="report-form" action="submitReport.php" method="POST">
                <label for="title">Select Violation:</label>
                <select id="title" name="title" required>
                    <option value="v1">Violation 1</option>
                    <option value="v2">Violation 2</option>
                </select>

                <label for="type">Report Type:</label>
                <select id="type" name="type" required>
                    <option value="violation">Violation</option>
                    <option value="complaint">Complaint</option>
                </select>

                <label for="description">Enter your appeal:</label>
                <textarea id="description" name="description" required></textarea>

                <button type="submit">Submit Appeal</button>
            </form>

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
    const violationID = "v" + <?php echo $vioID ?>;
    console.log(violationID);
    const violationTitle = document.getElementById('title');

    // Loop through the options to find the matching value
    for (var i = 0; i < violationTitle.options.length; i++) {
        if (violationTitle.options[i].value === violationID) {
            violationTitle.value = violationID; // Set the value to the matching violationID
            break; // Exit the loop once the value is set
        }
    }
    document.getElementById('logout-link').addEventListener('click', function(event) {                  
        event.preventDefault();                           
        var confirmation = confirm('Are you sure you want to log out?');                         
        if (confirmation) {
            window.location.href = "../../config/logout.php";
        }
    });
</script>

</html>