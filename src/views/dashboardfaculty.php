<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FacReport</title>

    <style>
        @font-face {
            font-family: 'pop';
            src: url(Poppins/Poppins-Bold.ttf);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            height: 100vh;
            background-color: #E9EAF6;
        }

        .container {
            width: 100%;
            height: 100%;
            display: flex;
            font-family: 'pop';
            color: #35408E;
        }

        .sidebar{

        background-color: whitesmoke;
        width: 25%;
        height: 100%;
        border-top-right-radius: 5%;
        border-bottom-right-radius: 5%;
        }

        .txt1 {
            margin-left: 5px;
            color: #35408E;
        }

        .logo {
            width: 100%;
            height: 15%;
            display: flex;
            align-items: start;
            justify-content: left;
        }

        .header {
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            padding: 30px;
            line-height: 1;
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

        .dashboard {
            width: 100%;
            height: 50%;  
            margin-top: 20px;  
        }

        .dashboard .dashB {
            width: 100%;
            height: 15%;
            display: flex;
            align-items: center;
            justify-content: left;
            margin-top: 10px;
        }

        .dashboard .dashPIC {
            width: 30px;
            height: 30px;
            margin-left: 40px;
        }

        .dashboard .txtR {
            font-size: 20px;
            color: #595959;
            margin-left: 30px;
        }

        .dashboard .txtA {
            font-size: 20px;
            color: gold;
            margin-left: 30px;
        }

        .LogOut {
            width: 100%;
            height: 25%;
            display: flex;
            align-items: center;
            justify-content: left;
        }

        .LogOut .LOut {
            width: 40px;
            height: 40px;
            margin-left: 50px;
        }

        .LogOut .txtR {
            font-size: 20px;
            color: #595959;
            margin-left: 30px;
        }


        .items {
            width: 100%;
            height: 51%;
            padding: 60px;
        }

        .items .txtR {
            font-size: 20px;
            color: #595959;
            margin-left: 20px;
        }

        .content{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            background-color: lavender;
        }

        .student{

        background-color: whitesmoke;
        width: 35%;
        height: 8%;
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


        line {
            display: flex;
            margin-bottom: 40px;
        }

        .logos {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        label {
            margin-top: 15px;
            margin-left: 5px;
        }

        .logout {
            padding: 60px;
            display: flex;
            align-items: center;
            margin-top: 15px;
        }

        .topbar {
            background-color: white;
            width: 70%;
            height: 70px;
            display: flex;
        }

        .box2 {
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: white;
            width: 40%;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 50%;
        }

        .toplogo {
            width: 35px;
            height: 35px;
            margin: 10px;
            color: #AFB1C2;
        }

        .info {
            font-family: 'pop';
            margin-left: 10px;
            color: #AFB1C2;
            display: flex;
            align-items: center;
        }

        .info2 {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .name {
            margin-bottom: 10px;
        }

        .mainbar {
            height: 10%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: start;
            padding: 30px;
            color: #35408E;
        }

        .text {
            font-family: 'pop';
            font-size: 30px;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
        }

        .announcementw-win {
            background-color: whitesmoke;
            border-radius: 20%;
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

        .wrap2 {
            display: flex;
            flex-direction: row;
            height: 80%;
            width: 100%;
        }

        .wrap3 {
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100%;
        }

        .wrap {
            width: 37%;
            height: 98%;
        }

        .violations {
            background-color: whitesmoke;
            width: 100%;
            height: 48%;
            border-radius: 10%;
            margin-left: 7%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #E6C213;
            font-family: 'pop';
        }

        .t .t1 {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .logo3 {
            margin-left: 30%;
        }

        .search {
            width: 38%;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #E6C213;
            font-family: 'pop';
            font-size: 2.5rem;
        }

        h4 {
            margin-left: 30%;
        }

        .items {
            width: 100%;
            height: 50%;  
            margin-top: 20px;  
        }

        .students {
            width: 70%;
            height: 450px;
            background-color: white;
            margin-left: 15%;
            margin-top: 3%;
            border-radius: 50px;
            display: flex;
            flex-direction: column;
            align-items: start;
            justify-content: start;
            color: #34408D;
            font-family: 'pop';
            padding: 3%;
            position: relative;
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

        .baba {
            line-height: 1;
        }

        .up {
            display: flex;
            align-content: start;
            margin-top: 30px;
            margin-bottom: 10%;
        }

        .up p {
            margin-left: 30px;
            margin-top: 5px;
        }

        labeli {
            color: #E6C213;
            font-size: 1.5rem;
        }

        .form {
            display: flex;
            flex-direction: column;
            height: 50%;
            margin-top: 10px;
        }

        .loob {
            width: 100%;
            height: 100%;
        }

        .tf {
            width: 50%;
            height: 40px;
            margin: 11px 0;
            margin-left: 5px;
            transform: translateY(-50%);
            font-size: 20px;
            font-family: 'pop';
            box-sizing: border-box;
            padding: 12px, 36px, 12px, 12px;
            border-radius: 15px;
            border: none;
        }

        .tf input {
            width: 100%;
            height: 100%;
            background: #DBDCE6;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 12px;
            font-size: 10px;
            color: black;
            padding: 20px 45px 20px 20px;
            font-family: 'pop';
        }

        .tf1 {
            width: 100%;
            height: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            font-family: 'pop';
            box-sizing: border-box;
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            position: relative;
            resize: none;
        }

        .tf1 input {
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

        .ib {
            display: flex;
            height: 20%;
            margin-bottom: 5px;
        }

        .bot{
            width: 90%;
            position: absolute;
            bottom: 20px;
            right: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .file{
            display: flex;
            flex-direction: column;
            align-items: start;
            justify-content: center;
            width: 50%;
        }
        
        .send-button {
            width: 120px;
            height: 40px;
            background-color: #E6C213;
            border-radius: 25px;
            color: white;
            font-family: 'pop';
            font-size: 1.2rem;
            border: none;
            cursor: pointer;
        }

        .boton{
            display: flex;
            align-items: center;
            justify-content: end;
        }


      

    </style>
</head>

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
                    <img src="../PHPLOGIN/images/paper.png" class="dashPIC"/>
                    <text class="txtR"> WRITE A REPORT</text>
                </div>
                
            </div>
            <div class="LogOut">
                <img src="../PHPLOGIN/images/logout.png" class="LOut"/>
                <text class="txtR">LOGOUT</text>
            </div>
        </div>

        <div class="content">
            <!-- --------------<p>student</p>-------------------- -->
            <div class="student">
                <img src="../PHPLOGIN/images/first.jpg" class="profPic">
                <p class="profT">JOHN LUIS MAGO</p>
                <img src="../PHPLOGIN/images/bell.png" class="pic1">
                <img src="../PHPLOGIN/images/settings-8-xl.png" class="pic2">
            </div>

            <div class="search">
                <div class="rep">
                    <h4>REPORTS</h4>
                </div>
            </div>

            <div class="students">
                <div class="loob">
                    <div class="apppeal">
                        <labeli>REPORT DETAILS</labeli>
                    </div>
                    <div class="form">
                        <div class="ib">
                            <div class="email"> To:</div>
                            <input type="text" class="tf" required>
                        </div>

                        <div class="ib">
                            <div class="email2"> Subject:</div>
                            <input type="text" class="tf" required>
                        </div>
                    </div>
                    <textarea type="text" class="tf1" required></textarea>
                    <div class="bot">
                        <div class="file">
                        <label for="fileInput" class="file-input">ATTACH YOUR FILES HERE</label>
                        <input type="file" id="fileInput" class="file-input">
                    </div>
                    <div class="boton">
                        <button class="send-button">SEND</button>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
