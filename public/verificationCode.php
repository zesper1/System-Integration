<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>emailCodeVerification</title>
</head>
<body>
<div class= "conent">
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