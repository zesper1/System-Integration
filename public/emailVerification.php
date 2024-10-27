<!DOCTYPE html>
<?php
include "../src/connection/db_conn.php";
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        @font-face {
            font-family: 'pop';
            src: url(assets/Fonts/Poppins-Bold.ttf);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            background-color: lightslategrey;
            font-family: 'pop';
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
            max-width: 500px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .form-left {
            display: flex;
            align-items: center;
            color: #35408E;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .form-left img {
            margin-right: 10px;
        }

        .reg {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        label {
            color: black;
            font-size: 15px;
            margin-bottom: 10px;
            display: block;
        }

        .form-right {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-right input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .form-right button {
            background-color: #0d6efd;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .form-right button:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form">
        <div class="form-left">
            <img src="assets/images/NU_shield.svg.png" alt="NU Shield" width="50px" height="55px">
            <h1>Sign Up</h1>
        </div>
        <div class="reg">
            <label>Use registered email only.</label>
        </div>
        <div class="form-right fcontent">
            <form action="verifyHelper.php" method="POST">
                <input type="email" name="email" id="email" required pattern="[a-zA-Z0-9._%+-]+@gmail\.com" title="Please enter a valid Gmail address" placeholder="Enter email">
                <button type="submit">Verify</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
