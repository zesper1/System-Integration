<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReportSearch </title>
</head>

<style>
    
@font-face{
    font-family: 'pop';
    src: url(Poppins/Poppins-Bold.ttf);
    }

*{
padding:0;
margin: 0;
box-sizing: border-box;     
}

body{
    width: 100%;
    height: 100vh;
    
}

.container{
    width: 100%;
    height: 100%;   
    background-color: #E9EAF6; 
    font-family: 'pop';
    color: #35408E;
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
}

.pic{
width: 50px;
height: 60px;
margin-right: 10px;
margin-left: 50px;
margin-top: 30px;
}

.tblpic{
    width: 80px;
height: 80px;
border-radius: 50%;
background-color: #35408E;
margin-left: 100px;
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

.student{

    background-color: whitesmoke;
    width: 35%;
    height:30%;
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
        color: #595959;
        
}

.student .pic1{
    width: 30px;
    height: 30px;
    margin-left: 80px;
    margin-right: 20px;
    color: #595959;
}

/* topbar */

.content{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    background-color: lavender;
}

/* mainbar */

.search{
        width: 100%;
        display: flex;
        justify-content: space-between;
        color: #E6C213;
        font-family: 'pop';
        font-size: 35px;
    }

    .rep{
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: start;
    margin-left: 5%;
}

.report{
        font-size: 40px;
        color: #E6C213;
    margin-left: 30px;
    margin-top: 10px;
    }

.col{
    width: 90%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 32%;
}

    .glass {
  width: 200px; 
  height: 35px;
  border-radius: 10px;
  background-color: rgba(255, 255, 255, 0.8); 
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  display: flex; 
  align-items: center;
  margin-top: 5px;
}

.glass input {
  border: none;
  outline: none;
  background: transparent;
  width: 100%;
  font-size: 16px;
  font-family: 'pop';
  padding-left: 10px;
}

.glass input::placeholder {
  color: #999;
}

.input-box1{
    display: flex;
    background-color: #DBDCE6;
    width: 110px;
    height: 30px;
    border-radius: 10px;
    color: #34408D;
    margin-right: 10px;
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



/* mainbar */

.students{
    width: 100%;
    height: 40%;
    max-height: 100%;
    background-color: white;
    border-radius: 10px;
    align-items: center;
    display: flex;
    color: #34408D;
    font-family: 'pop';
    overflow: auto;
}

/* table */
.tableCon{
    width: 87%;
    height: 300%;
    overflow: auto;
    background-color: white;
    margin-left: 80px;
    margin-top: 30px;
    border-radius: 20px;
    position: relative;
}

.tableCon .picture{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #35408E;
    margin-left: 100px;
}

.tableCon .row{
    width: 90%;
    height: 15%;
    background-color: lavender;   
    display: flex;
    align-items: center;
    justify-content: left; 
    margin-left: 40px;
    margin-top: 30px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}

.tableCon .txt{
    font-size: 15px;
    color: #739BD0;
    line-height: 1;
    margin-left: 20px;
}

.tableEdit{
    width: 30px;
    height: 30px;
    margin-left: 25%;
}

.tableDelete{
    width: 30px;
    height: 30px;
    margin-left: 20px;
}

.baba{
        width: 90%;
height: 70%;
background-color: lavender;   
display: flex;
align-items: center;
justify-content: left; 
margin-left: 40px;
border-top-left-radius: 20px;
border-top-right-radius: 20px;
border-bottom-left-radius: 20px;
border-bottom-right-radius: 20px;
}

.label{
display: flex;
flex-direction: column;
margin-left: 30px;
}
</style>


<body>
    <div class="container">
        <!-- --------------<p>sidebar</p>-------------------- -->
        <div class="sidebar">
            <div class="logo">
                <img src="../PHPLOGIN/images/NU_shield.svg.png" class="pic">   
                <text class="NU">NATIONAL<br>UNIVERSITY</text>
            </div>

            <div class="overview"> OVERVIEW</div>

            <div class="dashboard">
                <div class="dashB">
                    <img src="../PHPLOGIN/images/dashboard.png" class="dashPIC"/>
                    <text class="txtR"> DASHBOARD</text>
                </div>


                <div class="dashB">
                    <img src="../PHPLOGIN/images/report.png" class="dashPIC"/>
                    <text class="txtA"> REPORTS</text>
                </div>

                <div class="dashB">
                    <img src="../PHPLOGIN/images/paper.png" class="dashPIC"/>
                    <text class="txtR"> WRITE TO APPEAL</text>
                </div>
                
                <div class="dashB">
                    <img src="../PHPLOGIN/images/users.png" class="dashPIC"/>
                    <text class="txtR"> ADD USERS</text>
                </div>
            </div>
            <div class="LogOut">
                <img src="../PHPLOGIN/images/logout.png" class="LOut"/>
                <text class="txtR">LOGOUT</text>
            </div>
        </div>
        <!-- --------------<p>sidebar</p>-------------------- -->



        <div class="content">
            <!-- --------------<p>student</p>-------------------- -->
            <div class="student">
                <img src="../PHPLOGIN/images/first.jpg" class="profPic">
                <p class="profT">JOHN LUIS MAGO</p>
                <img src="../PHPLOGIN/images/bell.png" class="pic1">
                <img src="../PHPLOGIN/images/settings-8-xl.png" class="pic2">
            </div>
            <!-- --------------<p>student</p>-------------------- -->

            <!-- --------------<p>ADD USER</p>-------------------- -->
            <div class="search">

                <div class="rep">
                    <p class="report">REPORTS</p>
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
    
            <!-- --------------<p>TABLE</p>-------------------- -->
            
            <div class="tableCon">
 
             <div class="students">

                <div class="baba">
                    <img src="../PHPLOGIN/images/NU_shield.svg.png" class="tblpic" >

                    <div class="label">
                        <label>ROVIC BATACANDOLO</label> 
                        <label> TOTAL VIOLATION: 45</label>
                        <label> PENDING VIOLATIONS: 34</label>
                        <label> APPEALS SENT: 453543</label>
                    </div>
               
                </div>
            
            </div>
            </div>
    
         
               
                 
            
                
                <!-- --------------<p>TABLE</p>-------------------- -->

            
        </div>
    </div>
</body>
</html>