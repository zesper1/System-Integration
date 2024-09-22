<!DOCTYPE html>
<?php include("../src/connection/db_conn.php");?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        @font-face {
            font-family: 'pop';
            src: url(../../public/assets/Fonts/Poppins-Bold.ttf);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            height: 100vh;
        }

        .container {
            width: 100%;
            height: 100%;
            display: flex;
        }

        .con1 {
            width: 50%;
            height: 100%;
            background-color: #353f8ec4;
            display: flex;
            color: white;
            text-align: center;
            justify-content: center;
            font-family: 'pop';
        }

        .title {
            display: flex;
            align-items: center;
        }

        .bg {
            width: 50%;
            height: 100%;
            position: absolute;
            z-index: -1;
        }

        .nav {
            width: 100%;
            height: 110px;
            color: #35408E;
            line-height: 1;
        }

        .nu {
            display: flex;
            padding: 25px;
        }

        .txt1 {
            margin-top: 20px;
            margin-left: 5px;
        }

        .logo {
            height: 70px;
            width: 60px;
            margin: 6px;           
        }

        .con2 {
            width: 50%;
            height: 100%;
            font-family: 'pop';
        }

        .show {
            display: flex;
            justify-content: end;
        }

        .wrapper {
            width: 100%;
            height: 80%;
            color: #35408E;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form {
            margin-bottom: 50px;
        }

        h1 {
            font-size: 36px;
            text-align: center;
        }

        .input-box {
            width: 100%;
            height: 50px;
            margin: 30px 0;
            transform: translateY(-50%);
            font-size: 20px;
            font-family: 'pop';
            box-sizing: border-box;
            padding: 12px, 36px, 12px, 12px;
            position: relative;
        }

        .fa-eye, .fa-eye-slash {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 20px; 
            color: #000;
            line-height: 1; 
            margin-top: 7.5%;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: #DBDCE6 ;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 12px;
            font-size: 15px;
            color: black;
            padding: 20px 45px 20px 20px;
            font-family: 'pop';
        }

        .wrapper .btn {
            width: 30%;
            height: 35px;
            background: #FFD41C;
            border: none;
            outline: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            font-family: 'pop';
            position: relative;
            left: 35%;
        }

        .input-box1 {
            display: flex;
            background-color: #DBDCE6;
            width: 30%;
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

        input[type="checkbox"] {
            width: 15px;
            height: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="checkbox"]:checked {
            background-color: #21b0fe;
            border-color: #21b0fe;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="con1">
            <img src="../public/assets/images/bg.jpg" class="bg">
            <h1 class="title">
                STUDENT CONDUCT <br>
                AND VIOLATION <br>
                MONITORING SYSTEM <br>
            </h1>
        </div>

        <div class="con2">
            <div class="nav">
                <div class="nu">
                    <img src="../public/assets/images/NU_shield.svg.png" class="logo">
                    <h3 class="txt1">NATIONAL <BR> UNIVERSITY</h3>    
                </div>      
            </div>  

            <div class="wrapper">
                <form action="../src/config/loginlogic.php" method="post" class="form">
                    <h1>Login</h1>

                    <div class="input-box1">
                        <select name="role" placeholder="Select a role" required>             
                            <option value="" disabled selected>Login as</option>   
                            <option value="admin">Admin</option>
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                        </select>
                    </div>
                
                    <div class="input-box">
                        <label class="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                
                    <div class="input-box">
                        <label class="Pass">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>      
                        <i class="fa-solid fa-eye" id="showpass"></i>                     
                    </div>               
                    <button type="submit" name="login" id="submit" class="btn">Login</button>                
                </form>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector("#showpass");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("fa-eye-slash");
        });
    </script>
</body>
</html>
