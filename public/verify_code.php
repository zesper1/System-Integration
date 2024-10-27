<!DOCTYPE html>
<?php
include "../src/connection/db_conn.php";
session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>emailCodeVerification</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4; 
    margin: 0;
    padding: 0;
}

.content {
    display: flex;
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
}

.form {
    background: white; 
    border-radius: 8px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    padding: 20px;
    width: auto;
}    

label {
    display: block;
    margin-bottom: 8px; 
    font-weight: bold; 
}

input[type="text"] {
    width: 92%; 
    padding: 10px;
    border: 1px solid #ccc; 
    border-radius: 4px; 
    margin-bottom: 15px; 
    font-size: 16px;
}

input[type="text"]:focus {
    border-color: #66afe9; 
    outline: none; 
}

button {
    background-color: #007bff; 
    color: white; 
    border: none;
    border-radius: 4px; 
    padding: 10px;
    width: 100%; 
    font-size: 16px; 
    cursor: pointer; 
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3; 
}

    </style>
</head>
<body>
<div class= "content">
    <div class="form">

    <form action="check_code.php" method="POST">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">
    <label for="code">Enter your verification code:</label>
    <input type="text" name="code" id="code" required pattern="\d{6}" title="Enter the 6-digit code">
    <button type="submit">Verify</button>
</form>

</div>

</div>

</body>