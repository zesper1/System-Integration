<!DOCTYPE html>
<?php
include "../src/connection/db_conn.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get admin email and password
    $email = $_POST['Email'];
    $role_id = 3; // Fixed role_id

    $verificationCode = rand(100000, 999999);
    
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>emailVerification</title>
</head>
<body>

<div class= "container">
<div class= "form" >
<h2> Email Verification </h2>
<form action="emailverification.php" method="POST">
    <label for="email">Enter your Gmail address:</label>
    <input type="email" name="email" id="email" required pattern="[a-zA-Z0-9._%+-]+@gmail\.com" title="Please enter a valid Gmail address">
    <button type="submit">Send Verification Code</button>
</form>
</div>
</div>
</body>