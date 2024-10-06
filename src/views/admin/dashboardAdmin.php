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
        font-family: 'pop';
    }

    .container{
        width: 100%;
        height: 100%;
        display: flex;
    }

     /* sidebar */

.sidebar{
background-color: white;
width: 25%;
height: 100%;
border-top-right-radius: 5%;
border-bottom-right-radius: 5%;
}

.logo{
    width: 100%;
    height: 15%;
    display: flex;
    align-items: start;
    justify-content: left;
    color: #35408E;
}

.pic{
width: 50px;
height: 60px;
margin-right: 10px;
margin-left: 50px;
margin-top: 30px;
}

.NU{
    line-height: 1;
    font-size: 20px;
    margin-top: 40px;
}

.overview{
    width: 100%;
    height: 10px;
    font-size: 15px;
    display: flex;
    align-items: start;
    justify-content:left;
    color: #AFB1C2;
    margin-top: 50px;
    margin-left: 40px;
}

.dashboard{
    width: 100%;
    height: 50%;  
    margin-top: 20px;  
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


/* sidebar */

    .topbar{
        background-color: white;
        width:70%;
        height: 70px;
        display: flex;
    }


    .student{
        background-color: whitesmoke;
        width: 35%;
        height: 30%;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        margin-left: 55%;
        display: flex;
        align-items: center;
        justify-content: left;
    }

    .inf{
        display: flex;
        width: 100%;
    }

    .info{
        width: 50%;
        display: flex;
        margin-left: 20px;
    }

    .info2{
        width: 50%;
        display: flex ;
        justify-content: end;
        margin-right: 10px;
    }

    .toplogo{
        width: 35px;
        height: 35px;
        margin: 10px;
        color: #AFB1C2;
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
    font-size: 40px;
    margin-left: 80px;
    margin-top: 10px;
    }

    .content{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        background-color: lavender;
    }

    .box2 {
        margin-left:50% ;
    }

    .mainbar{
        justify-content: start;
        padding: 30px;
        color: #35408E;
    }

    .students{
        width: 87%;
    height: 300%;
    background-color: white;
    margin-left: 80px;
    margin-top: 30px;
    border-radius: 10px;   
    color: #34408D;
    font-family: 'pop';
    padding: 3%;
    }
    

    



</style>

<body>
    <div class="container">

        <div class="sidebar">

            <div class="logo">
                <img src="../../../public/assets/images/NU_shield.svg.png" class="pic">
            <h3 class="NU">NATIONAL <BR> UNIVERSITY</h3> 
            </div> 
            
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
        
        <line onclick="navigateTo('usersAdmin.php')" class="dashB">
            <a href="usersAdmin.php"><img src="../../../public/assets/images/users.png" class="dashPIC"></a>
            <label class="txtR"> VIEW USER</label>
        </line>

    </div>
        </div>
            

        <div class="content">

            <div class="student">

                <div class="inf">

                
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

            </div>

            <div class="col">

                <div class="text">
                    <label class="hello"> HELLO, 
                        <?php
                        // Check if the session variable 'id' is set
                        echo $_SESSION["name"];
                        ?>
                    </label>
                </div>
    
            </div>

            <div class="students">

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