<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
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
        height: 100%;
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

    .search{
        width: 100%;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        color: #E6C213;
        font-family: 'pop';
        font-size: 2.5rem;
        margin-right: 35px ;
    }

    h4{
        margin-left: 5%;
    }

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
    margin: 0 auto;
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

.rep{
   width: 30%;
}

.col{
    display: flex;
   
}

.students{
    width: 70%;
    height: 100px;
    background-color: white;
    margin-left: 15%;
    margin-top: 3%;
    border-radius: 20px;
    display: flex;
    align-items: center;
    color: #34408D;
    font-family: 'pop';
}

.pic{
    width: 60px;
    height: 60px;
    margin-left: 5%;
}

.baba{
    display: flex;
    flex-direction: column;
    line-height: 0.5;
    margin-bottom:13px ;
    margin-left: 10px;
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
        <a href="login.php" id="logout-link">
            <img src="../../../public/assets/images/logout.png" class="toplogo" alt="Logout">
        </a>
        <label class="name">NAME</label>
    </div>
    
    <script>
                    
                    document.getElementById('logout-link').addEventListener('click', function(event) {
                        
                        event.preventDefault();
                        
                        
                        var confirmation = confirm('Are you sure you want to log out?');
                        
                        
                        if (confirmation) {
                            window.location.href = "logout.php";
                        }
                    });
                </script>

                <div class="info2">
                    <img src="../../../public/assets/images/bell.png" class="toplogo">
                    <img src="../../../public/assets/images/settings.png" class="toplogo">
                </div>
            </div>


          
        <div class="search">

            <div class="rep">
                <h4>REPORTS</h4>
            </div>
        

            <div class="col">
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

        <div class="students">
            <img src="../../../public/assets/images/NU_shield.svg.png" class="pic" >

            <div class="baba">
            <label>ROVIC BATACANDOLO</label>
            <label> PDA</label>
        </div>
        </div>
        </div>
    </div>
    <script>
    function navigateTo(pagename){
        window.location.href = pagename;
    }
    </script>
</body>
</html>