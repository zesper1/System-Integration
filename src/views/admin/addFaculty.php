<?php
    include "../../connection/db_conn.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADDfaculty</title>
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
        font-family: 'pop';
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
    color: #999;
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

.LogOut{
    width: 100%;
    height: 25%;
    display: flex;
    align-items: center;
    justify-content: left;
}

.LogOut .LOut{
    width: 30px;
    height: 30px;
    margin-left: 50px;
}

.LogOut .txtR{
    font-size: 20px;
    color: #595959;
    margin-left: 30px;
}


/* sidebar */

/* topbar */





/* topbar */

.glass {
  width: 250px; 
  height: 40px;
  border-radius: 25px;
  background-color: rgba(255, 255, 255, 0.8); 
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  display: flex; 
  align-items: center; 
  padding: 0 15px;
  margin-left:10px ;
  margin-top: 10px;

}

.glass input {
  border: none;
  outline: none;
  background: transparent;
  width: 100%;
  font-size: 16px;
  font-family: 'pop';
}

.glass input::placeholder {
  color: #999;
}

.input-box1{
    display: flex;
    background-color: #DBDCE6;
    width: 130px;
    border-radius: 10px;
    color: #34408D;
    margin-left: 680px;
    margin-top: 10px;

} 

.input-box1 select {
  width: 100%;
  height: 38px;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, .2);
  border-radius: 10px;
  appearance: none; 
  cursor: pointer;
  font-size: 16px;
  font-family: 'pop';
  color: #34408D;
  background-color: #DBDCE6;
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

.col{
    display: flex; 
}

/* Sa student DIV */

.students{
    width: 87%;
    height: 300%;
    background-color: white;
    margin-left: 80px;
    margin-top: 30px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: start;
    justify-content: start;
    color: #34408D;
    font-family: 'pop';
    padding: 3%;
}

.students .form {
  display: flex;
  flex-direction: column;
  gap: 35px; 
  width: 100%;
}

.students .input-group {
  display: flex;
  gap: 15px; 
}

.students .input-group input {
  flex: 1;
  padding: 15px; 
  border-radius: 10px;
  border: 1px solid #ccc;
  font-family: 'pop';
  font-size: 16px;
  background-color: #DBDCE6;
  color: black;
}

.students .add-btn {
    width: 100px;
    height: 30px;
    background-color: #007bff; 
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-family: 'pop';
    margin-top: 15px;
}

.btn{
    display: flex;
    justify-content: end;
}


/* hanggang dito */


.tf{
    width: 100%;
        height: 50px;
        margin: 30px 0;
        transform: translateY(-50%);
        font-size: 20px;
        font-family: 'pop';
        box-sizing: border-box;
        padding: 12px, 36px, 12px, 12px;
        position: relative;
        border-radius: 15px;
        background-color: rgba(255, 255, 255, 0.8); 
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.tf input{
        width: 100%;
        height: 100%;
        background: #DBDCE6 ;
        border: none;
        outline: none;
        border: 2px solid rgba(255, 255, 255, .2);
        border-radius:12px;
        font-size: 16px;
        color: black;
        padding: 20px 45px 20px 20px;
        font-family: 'monslogin';
        font-family: 'pop';
    }

.tf1{
        width: 100%;
        height: 80%;
        margin: 30px 0;
        transform: translateY(-50%);
        font-size: 20px;
        font-family: 'pop';
        box-sizing: border-box;
        position: relative;
        border-radius: 15px;
        background-color: rgba(255, 255, 255, 0.8); 
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.tf1 input{
        width: 100%;
        height: 100%;
        margin: 30px 0;
        transform: translateY(-50%);
        font-size: 20px;
        font-family: 'pop';
        box-sizing: border-box;
        position: relative;
        border-radius: 15px;
        background-color: rgba(255, 255, 255, 0.8); 
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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

        .student .profT{
        font-size: 15px;
        color: #595959;

        }

        .student .profPic{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-left: 30px;
        margin-right: 20px;
        }

        .student .pic2{
        width: 30px;
        height: 30px;
        margin-left: 10px;
        margin-right: 20px;
        margin-bottom: 6px;
        color: #595959;
            
        }

        .student .pic1{
        width: 30px;
        height: 30px;
        margin-left: 150px;
        margin-right: 10px;
        margin-bottom: 6px;
        color: #595959;

        }

        .content{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        background-color: lavender;
        }

        .user{
        width: 50%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: start;
        margin-left: 5%;
        }

        .item{
        width: 50%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 35%;
        }

        button{
        margin-right: 10px;
        }

        .content .addU{
        width: 100%;
        font-size: 35px;
        color: gold;
        display: flex;
        justify-content: space-between;
        }

        .addU .button{
        width: 100px;
        height: 30px;
        background-color: #007bff; 
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-family: 'pop';
        margin-top: 15px;
        }

        .addU .AUser{
        font-size: 40px;
        color: gold;
        margin-left: 30px;
        margin-top: 10px;
        }

        .addU .select-element{
        display: flex;
        background-color: #DBDCE6;
        border-radius: 5px;
        color: #34408D;
        margin-top: 15px;
        font-family: 'pop';
        width: 90px;
        height: 30px;
        font-size: 15px;
        } 

        .select-element select {
        width: 100%;
        height: 38px;
        border: none;
        outline: none;
        border: 2px solid rgba(255, 255, 255, .2);
        border-radius: 10px;
        appearance: none; 
        cursor: pointer;
        font-size: 16px;
        font-family: 'pop';
        color: #34408D;
        background-color: #DBDCE6;
        }

        .select-element select::after {
        content: '\25BC'; 
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #999;
        }

        .select-element select option {
        text-align: center; 
        }

        .Mname{
            width: 0px;
        }

</style>

<body>
    <div class="container">
        <!-- --------------<p>sidebar</p>-------------------- -->
        <div class="sidebar">
            <div class="logo">
                <img src="../../../public/assets/images/NU_shield.svg.png" class="pic">   
                <text class="NU">NATIONAL<br>UNIVERSITY</text>
            </div>

            <div class="overview"> OVERVIEW</div>

            <div class="dashboard">
                <div class="dashB" onclick="navigateTo('dashboardAdmin.php')" style = "cursor:pointer;">
                <img src="../../../public/assets/images/dashboard.png" class="dashPIC">
                <text class="txtR"> DASHBOARD</text>

                </div>

                <div class="dashB" onclick="navigateTo('dashboardAdmin.php')" style = "cursor:pointer;">
                <img src="../../../public/assets/images/report.png" class="dashPIC">
                <text class="txtR"> REPORTS</text>
                </div>

                <div class="dashB" onclick="navigateTo('dashboardAdmin.php')" style = "cursor:pointer;">
                <img src="../../../public/assets/images/paper.png" class="dashPIC">
                <text class="txtR"> WRITE TO APPEAL</text>

                </div>
                
                <div class="dashB" onclick="navigateTo('dashboardAdmin.php')" style = "cursor:pointer;">
                <img src="../../../public/assets/images/users.png" class="dashPIC">
                <text class="txtA"> ADD USERS</text>

                </div>
            </div>
            <div class="LogOut">
                <img src="../../../public/assets/images/logout.png" class="LOut"/>
                <text class="txtR">LOGOUT</text>
            </div>
        </div>
        <!-- --------------<p>sidebar</p>-------------------- -->

        <div class="content">
            <!-- --------------<p>student</p>-------------------- -->
            <div class="student">
                <img src="../../../public/assets/images/first.jpg" class="profPic">
                <p class="profT">NAME</p>
                <img src="../../../public/assets/images/bell.png" class="pic1">
                <img src="../../../public/assets/images/settings-8-xl.png" class="pic2">
            </div>
            <!-- Adding the title -->
            
            <!-- --------------<p>student</p>-------------------- -->

            <div class="col">

                <div class="input-box1">
                    
                    <select name="role" placeholder="Select a role">   
          
                        <option value=""disabled selected>Sort by:</option >   
                        <option value="admin">Course</option >
                        <option value="user">ID</option>
                    </select>
                </div>
                
                <div class="glass">
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class="students">
                <h2 style="color:#35408E; margin-bottom: 2%;  font-family: 'pop'; font-size: 2rem;">ADD USER</h2>

                <div class="form">
                    <form method = "POST" action = "../../config/add.php">
                        <div class="input-group">
                            <input type="text" placeholder="LAST NAME" name="lname">
                            <input type="text" placeholder="FIRST NAME" name="fname">
                            <input type="text" placeholder="MIDDLE NAME" class="Mname" name="mname">
                        </div>
                        <div class="input-group">
                            <input type="email" placeholder="NU EMAIL" name="email">
                            <input type="password" placeholder="PASSWORD" name="pass">
                        </div>
                        <div class="input-group">
                            <input type="program" placeholder="DEPARTMENT" name="department">
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="EMPLOYEE ID" name="employee_ID">
                        </div>
                        <div class="btn">
                            <button class="add-btn" name="add_faculty">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['exists']) && $_SESSION['exists'] == true){
            echo "
                <script>
                    alert('User already exists!');
                </script>
            ";
            $_SESSION['exists'] = false;
        } else {
             if(isset($_SESSION["success"])){
                if ($_SESSION["success"] == true){
                    echo "
                    <script>
                        alert('User registered successfully!');
                    </script>
                ";
                $_SESSION["success"] = false;
                } else {
                }
             }
        }
    ?>
    <script>
    function navigateTo(pagename){
        window.location.href = pagename;
    }
</script>
</body>
</html>