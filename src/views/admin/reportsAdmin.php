<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
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

     /* sidebar */

.sidebar{
background-color: white;
width: 25%;
height: 92vh;
}

.logo{
    width: 100%;
    display: flex;
    color: white;
    margin-left: 10px;
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


/* sidebar */

    .topbar{
        background-color: white;
        width:70%;
        height: 70px;
        display: flex;
    }


    .student{
        background-color: #34408D;
        width: 100%;
        height: 8%;
        display: flex;
        align-items: center;
        justify-content: left;
        border-bottom: 5px solid #E6C213;
    }

    .inf{
        display: flex;
        width: 50%;
        align-items: center;
    }

    .inf1{
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

 
    .col{
        width:100%;
        height: 55px;
        display: flex;
        justify-content: start;
        color: #35408E;
        font-family: 'pop';
    }

    .rep{
        width: 50%;
        display: flex;
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
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .content1{
        display: flex;
        width: 100%;
        height: 15%;
    }

    .content2{
        width: 80%;
        height: 80%;
        display: flex;
        justify-content: start;
        margin-left: 5%;
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

.pupil{
    width: 100%;
    height: 20%;
    background-color: white;
    border-radius: 10px;
    align-items: center;
    display: flex;
    color: #34408D;
    font-family: 'pop';
}

.baba{
    display: flex;
    margin-left: 10px ;
}
.tblpic{
    width: 50px;
    height: 50px;
}
/*.reportcontainer{
    width: 100%;
    height: 100%;
    background-color: white;
    border-radius: 10px;
    color: #34408D;
    font-family: 'pop';
    border: 1px solid black;
    display: flex;

}
    .rc-left{
        width: 25%;
        height: 100%;
        border-right: 1px solid black;
    }
    .rc-header{
        padding: 20px;
        font-size: x-large;
        border-bottom: 1px solid gray;
        text-align: center;
    }
    .rc-card{
        padding: 20px;
        border: 1px solid red;
        width: 80%;
        margin: 0 auto;
        margin-block: 10px;
        
    }
    .rcdesc-cont{
        padding: 20px;
    }
    .rcdc-header{
        font-size: x-large;
        color: #E6C213;
        margin-bottom: 50px;
    }
    .rcdc-details-container{
        display: flex;
}*/
</style>

<body>
    <div class="container">

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

        <div class="con2">

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
        
        <line onclick="navigateTo('usersAdmin.php')" class="dashB">
            <a href="usersAdmin.php"><img src="../../../public/assets/images/users.png" class="dashPIC"></a>
            <label class="txtR"> VIEW USER</label>
        </line>

        <line onclick="navigateTo('usersAdmin.php')" class="dashB">
            <a href="usersAdmin.php"><img src="../../../public/assets/images/add-user-3-xxl.png" class="dashPIC"></a>
            <label class="txtR"> ADD ADMIN</label>
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
            

        <div class="content">

            <div class="content1">
            <div class="col">
                <div class="text">
                    <label class="hello"> REPORTS
                        <?php
                        // Check if the session variable 'id' is set
                        echo $_SESSION["name"];
                        ?>
                    </label>
                </div>
            </div>

            <div class="rep">
                <div class="input-box1">
                    <select name="role" placeholder="Select a role">             
                        <option value=""disabled selected>Select Filter</option >   
                      <option value="admin">Pending</option >
                      <option value="user">Solved</option>
                    </select>
                  </div>

                  <div class="glass">
                    <input type="text" placeholder="Search">
                </div>
            </div>
            </div>
        <div class="content2">
            <div class="pupil">

                <div class="baba">
                    <img src="../../../public/assets/images/NU_shield.svg.png" class="tblpic" >

                    <div class="label">
                        <label>ROVIC BATACANDOLO <br> Public Display of Affection</label> 
                    </div>
               
                </div>
            
            </div>
            <!-- <div class="reportcontainer">
                <div class="rc-left">
                    <div class="rc-header">
                        Open a report.
                    </div>
                    <div class="rc-card">
                        <div class="rcc-name">
                            Rovic Batacandolo
                        </div>
                        <div class="rcc-type">
                            Public Exhibition
                        </div>
                    </div>
                </div>
                <div class="rc-right">
                    <div class="rcdesc-cont">
                        <div class="rcdc-header">Report Details.</div>
                        <div class="rcdc-details-container">
                            <div class="rcdc-dc-left">
                                <img src="" alt="">
                            </div>
                            <div class="rcdc-dc-right">
                                <div class="rcdc-name">Name: Rovic Batacandulo</div>
                                <div class="rcdc-id">ID: 171292</div>
                                <div class="rcdc-vio">Violation: Public Indecency</div>
                            </div>
                        </div>
                        <div class="rcdc-od">
                            <div class="rcdc-od-header">
                                Violation Details and other attachments.
                            </div>
                            <div class="rcdc-od-cont">
                            Rovic Batacandolo was caught with his significant other kissing near the fire exit around 3:09 pm, 
                            dated August 30, 2024. The report was submitted by an admin and the ID of the reported student was confiscated.
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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