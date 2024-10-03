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

    *
    {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        width: 100%;
        height: 100vh;
        background-color: #E9EAF6;
    }

    .container{
        width: 100%;
        height: 100%;
        display: flex;
    }

    .sidebar{
        width: 25%;
        height:100%;
        border-top-right-radius: 40px;
        border-bottom-right-radius: 40px;
        background-color: white;
        font-family: 'pop';
        color: #AFB1C2;
    }

    .txt1{
        margin-left: 5px;
        color: #35408E;
     }

    .logo{
        height: 70px;
        width: 60px;
        margin: 6px;           
    } /* nu logo sa header */

    .header{
        width: 100%;
        height: 100px;
        display: flex;
        align-items: center;
        padding: 30px;
        line-height: 1;
    }

    .overview{
        width: 100%;
        height: 70px;
        display: flex;
        align-items: end;
        padding-left: 30px;
        font-size: 20px;
    }

    .items{
        width: 100%;
        height: 51%;
        padding: 60px;
    }

    line{
        display: flex;
        margin-bottom: 40px;
    }
    
    .logos{
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    label{
        margin-top: 15px;
        margin-left: 5px ;
    }

    .logout{
        padding: 60px;
        display: flex;
        align-items: center;
        margin-top: 15px;
    }

    .topbar{
        background-color: white;
        width:70%;
        height: 70px;
        display: flex;
    }


    .box2{
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        background-color: white;
        width: 40%;
        height: 70px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .toplogo{
        width: 35px;
        height: 35px;
        margin: 10px;
        color: #AFB1C2;
    }

    .info{
        font-family: 'pop';
        margin-left: 10px;
        color: #AFB1C2;
        display: flex;
        align-items: center;
    }

    .info2{
        display: flex;
        align-items: center;
        margin-right: 20px;
    }

    .name{
        margin-bottom: 10px;
    }

    .mainbar{
        height: 10%;
        width: 100%;
        display: flex;
        align-items: center;
    }

    .text{
        font-family: 'pop';
        font-size: 30px;
    }

    .wrapper{
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
    }

    .box2 {
        margin-left:50% ;
    }

    .mainbar{
        justify-content: start;
        padding: 30px;
        color: #35408E;
    }

    .announcementw-win{
        background-color: white;
        border-radius: 20px;
        width: 55%;
        height: 98%;
        color: #AFB1C2;
        font-family: 'pop';
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin-left: 3%;
    }

    .wrap2{
        display: flex;
        flex-direction: row;
        height: 80%;
        width: 100%;
    }

    .wrap3{
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }

    .wrap{
        width: 37%;
        height: 98%;
    }

    .appeals{
        background-color: white;
        width: 100%;
        height: 48%;
        border-radius:20px ;
        margin-left: 7%;
        display: flex;
        margin-bottom: 4%;
        justify-content: center;
        align-items: center;
        color: #E6C213;
        font-family: 'pop';
    }

    .violations{
        background-color: white;
        width: 100%;
        height: 48%;
        border-radius:20px;
        margin-left: 7%;
        display: flex;
        justify-content: center;
        align-items: center;
        align-items: center;
        color: #E6C213;
        font-family: 'pop';
    }

    .t .t1{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .logo3{
        margin-left: 30%;
    }



</style>

<body>
    <div class="container">

        <div class="sidebar">

            <div class="header">
                <img src="../../../public/assets/images/NU_shield.svg.png" class="logo">
            <h3 class="txt1">NATIONAL <BR> UNIVERSITY</h3> 
            </div> 
            
            <div class="overview">
                <label> OVERVIEW </label>
            </div>
            
            <div class="items">
        <line onclick="navigateTo('dashboardAdmin.php')">
            <img src="../../../public/assets/images/dashboard.png" class="logos">
            <label> DASHBOARD</label>
        </line>
        
        <line onclick="navigateTo('reportsAdmin.php')">
            <img src="../../../public/assets/images/report.png" class="logos">
            <label> REPORTS</label>
        </line>
        
        <line onclick="navigateTo('appealAdmin.php')">
            <a href="appealAdmin.php"><img src="../../../public/assets/images/paper.png" class="logos"></a>
            <label> REPLY TO APPEAL</label>
        </line>
        
        <line onclick="navigateTo('usersAdmin.php')">
            <a href="usersAdmin.php"><img src="../../../public/assets/images/users.png" class="logos"></a>
            <label> VIEW USER</label>
        </line>
    </div>


            

        </div>
            

        <div class="wrapper">
            <div class="box2">
            <div class="info">
        <a id="logout-link">
            <img src="../../../public/assets/images/logout.png" class="toplogo" alt="Logout">
        </a>
        <label class="name"><?php
            echo $_SESSION["name"];
        ?></label>
    </div>
    
    <script>
                    
                    document.getElementById('logout-link').addEventListener('click', function(event) {
                        
                        event.preventDefault();
                        
                        
                        var confirmation = confirm('Are you sure you want to log out?');
                        
                        
                        if (confirmation) {
                            window.location.href = "../../config/logout.php";
                        }
                    });
                </script>
                
                <div class="info2">
                    <img src="../../../public/assets/images/bell.png" class="toplogo">
                    <img src="../../../public/assets/images/settings.png" class="toplogo">
                </div>

            </div>

            <div class="mainbar">

                <div class="text">
                    <label class="hello"> HELLO, 
                        <?php
                        // Check if the session variable 'id' is set
                        echo $_SESSION["name"];
                        ?>
                    </label>
                </div>
    
            </div>


        <div class="wrap2">

            <div class="announcementw-win">
                <label>ANNOUNCEMENTS WINDOWS</label>
            </div>


            <div class="wrap">

            
            <div class="appeals">
                <label>
                    <div class="t"><img src="../../../public/assets/images/envelope.png" class="logo3"></div>
                    <div class="t1">
                        <!-- 10 UNOPENED APPEALS -->
                         <?php
                            $stmt = $conn->prepare("SELECT * FROM report");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $unread = 0;
                            if($result->num_rows >0){
                                while($row = $result->fetch_assoc()){
                                    if($row['report_view'] = "unread"){
                                        $unread+=1;
                                    }
                                    else{}
                                }
                            } else {
                                $unread = 0;
                            }
                            echo $unread . " UNOPENED APPEALS";
                         ?>
                    </div>
                     
                </label>
            </div>

            <div class="violations">
                <label>
                    <div class="q"><img src="../../../public/assets/images/warning.png" class="logo3"></div>
                    <div class="q1">10 PENDING VIOLATIONS</div> 
                </label>
            </div>

        </div>
        </div>
            


          
        </div>   
    </div>
</body>
<script>
    function navigateTo(pagename){
        window.location.href = pagename;
    }
</script>
</html>