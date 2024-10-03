<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
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

   

    .wrap2{
        display: flex;
        flex-direction: row;
        height: 80%;
        width: 100%;
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
    width: 36%;
}

.students{
    width: 70%;
    height: 100%;
    background-color: white;
    margin-left: 15%;
    margin-top: 3%;
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

.pic{
    width: 60px;
    height: 60px;
    margin-left: 5%;
}

.baba{
    line-height: 1;
}

.up{
    display: flex;
    align-content: start;
    margin-top: 30px;
    margin-bottom: 10%;
}

.up p{
    margin-left: 30px;
    margin-top: 5px;
}

labeli{
    color: #E6C213;
    font-size: 1.5rem;
}

.form{
    display: flex;
    flex-direction: column;
    height: 80%;
}

.loob{
    width: 100%;
    height: 100%;
}

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

    .email2{
        margin-bottom: 7%;
    }

    .plus{
        height: 30px;
        width: 30px;
    }

    button{
        border: none;
        background-color: transparent;
        cursor: pointer;
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
        <line>
            <a href="dashboardAdmin.php"><img src="../../../public/assets/images/dashboard.png" class="logos"></a>
            <label> DASHBOARD</label>
        </line>
        
        <line>
            <a href="reportsAdmin.php"><img src="../../../public/assets/images/report.png" class="logos"></a>
            <label> REPORTS</label>
        </line>
        
        <line>
            <a href="appealAdmin.php"><img src="../../../public/assets/images/paper.png" class="logos"></a>
            <label> REPLY TO APPEAL</label>
        </line>
        
        <line>
            <a href="usersAdmin.php"><img src="../../../public/assets/images/users.png" class="logos"></a>
            <label> VIEW USER</label>
        </line>
    </div>
</div>

        <div class="wrapper">
            <div class="box2">
                <div class="info">
                    <img src="../../../public/assets/images/logout.png" class="toplogo">
                    <label class="name ">NAME</label>
                </div>                
                <div class="info2">
                    <img src="../../../public/assets/images/bell.png" class="toplogo">
                    <img src="../../../public/assets/images/settings.png" class="toplogo">
                </div>
            </div>


          
        <div class="search">

            <div class="rep">
                <h4>USERS</h4>
            </div>
        

            <div class="col">
    <button id="addBtn"> 
        <img src="../../../public/assets/images/plus-5-xl.png" class="plus"> 
    </button>
    <div class="input-box1">
        <select id="roleSelect" name="role" placeholder="Select a role">             
            <option value="" disabled selected>Sort by:</option>   
            <option value="student">Student</option>
            <option value="faculty">Faculty</option>
        </select>
    </div>
    <div class="glass">
        <input type="text" placeholder="Search">
    </div>
</div>

<script>
    document.getElementById('addBtn').addEventListener('click', function() {
        const selectedRole = document.getElementById('roleSelect').value;

        if (selectedRole === 'student') {
            window.location.href = 'addStudent.php';
        } else if (selectedRole === 'faculty') {
            window.location.href = 'addFaculty.php';
        }
    });
</script>

        
    </div>
</div>
</body>
</html>