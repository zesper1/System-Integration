<!DOCTYPE html>
<?php
include "../src/connection/db_conn.php";
session_start();
?>
<style>
    @font-face {
        font-family: 'pop';
        src: url(assets/Fonts/Poppins-Bold.ttf);
    }
    *{
        margin: 0 auto;
    }
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100 vw;
        background-color: lightslategrey;
        height: 100vh;
    }
    .container{
        width: 100%;
        height: 70%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .form{
        font-family: 'pop';
        border-radius: 20px;
        padding: 10px;
        width: 55%;
        height: 50%;
        display: flex;
        justify-content: space-between;
        background-color: white;
    }
    .form-right, .form-left{
        margin: 0;
        padding: 20px;
    }
    .form-right{
        display: flex;
        align-items: center;
    }
    .form-right input{
        padding:5px 10px;
        font-size: 20px;
        width: 500px;
        border-radius:5px ;
        height: 50px;
        border: 1px gray solid;
        margin: 10px 0;
    }
    .form-right button {
        background-color: #0d6efd;
        color: white;
        border-radius: 40px;
        padding: 10px 20px;
        font-size: 15px;
        border: none;
        margin-left: auto; /* Aligns button to the right */
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>emailVerification</title>
</head>
<body>

<div class= "container">
<div class= "form">
    <div class="form-left fcontent">
        <img 
        src="assets/images/NU_shield.svg.png" 
        alt="" 
        srcset="" 
        width="50px" 
        height="55px">
        <h1> Sign Up </h1>
        <br>
        <h3> Use registered email only.</h3>
    </div>
    <div class="form-right fcontent">
        <form action="verifyHelper.php" method="POST">
            <input type="email" name="email" id="email" required pattern="[a-zA-Z0-9._%+-]+@gmail\.com" title="Please enter a valid Gmail address" placeholder="Enter email">
            <br><button type="submit">Verify</button>
        </form>
    </div>
</div>
</div>
</body>