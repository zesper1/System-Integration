<!DOCTYPE html>
<?php
include '../../connection/db_conn.php';
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../../../public/index.php");
}
if ($conn) {
    // Prepare and execute the query
    $result = $conn->query("SHOW TABLES");

    // Check if the query was successful
    if ($result) {
        // Count the number of tables
        $tableCount = $result->num_rows;

        // Output the count
    } else {
        $tableCount = 0;
    }
} else {
    $tableCount = 0;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Reset some default styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            height: 100vh; 
            overflow: hidden;
        }

        /* Horizontal Navbar Styles */
        .navbar {
            background-color: #34408D; 
            width: 100%; 
            color: white;
            display: flex;
            justify-content: space-between; /* Space between items */
            align-items: center; /* Center items vertically */
            border-bottom: 5px solid #E6C213;
        }

        .nav-title{
            width: 50%;
            height: 100%;
            display: flex;
            align-content: center;
            margin-left: 2%;
        }

        .nav-right{
            width: 50%;
            display: flex;
            justify-content: end;
            margin-right: 2%;
        }
        /* Vertical Sidebar Styles */

        .main{
            display: flex;
            height: 100%;
        }
        .sidebar {
            width: 200px; 
            height: 100%;
            background-color: #34408D; 
            padding: 40px 10px; 
            height: 100%; 
            display: flex;
            flex-direction: column;
        }

        .nav-links {
            list-style-type: none; 
            padding: 0;
        }

        .nav-links a {
            color: white; 
            text-decoration: none; 
            padding: 10px; 
            display: block; 
            transition: background-color 0.3s; 
        }

        .nav-links a:hover {
            background-color: #575757; 
        }
        .horizontal{
            display: flex;
            padding: 0;
        }
        .horizontal a{
            padding: 5px 10px;
        }

        .content{
        width: 80%;
        height: 100%;
        display: flex;
        flex-direction: column;
        }

        .add{
        width: 44%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 30px;
        margin-top: 5%;
        }

        .add-fac{
        font-size: 20px;
        font-family: 'pop';
        color: #35408E;
        }

        .formcon{
        display: flex;
        justify-content: center;
        height: 100%;
        }
        .form {
            background-color: white;
            width: 65%;
            height: fit-content;
            padding: 30px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 2%;
        }

        h2 {
            color: #34408D;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-table {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }

        .form-table label {
            display: block;
            font-weight: bold;
            color: #34408D;
            margin-bottom: 5px;
        }

        .form-table input[type="text"],
        .form-table input[type="email"],
        .form-table input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-table .full-width {
            grid-column: span 3;
        }

        .form-table .half-width {
            grid-column: span 2;
        }

        .submit-btn {
            background-color: #34408D;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
            display: block;
            width: 100px;
            margin-left: auto;
        }

        .submit-btn:hover {
            background-color: #2b3675;
        }
     

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-title">
            <ul class="nav-links horizontal">
                <li><a href="#home">Home</a></li>
                <li><a href="#database">Database</a></li>
                <li><a href="#user">User</a></li>
            </ul>
        </div>
        <div class="nav-right">
            Hello, <?php echo htmlspecialchars($_SESSION["name"]); ?>
        </div>
    </nav>

    <div class="main">
    <nav class="sidebar">
        <ul class="nav-links vertical">
            <li><a href="manipulateSAdmin.php">Manipulate records</a></li>
            <li><a href="viewSAdmin.php">View records</a></li>
            <li><a href="addSAdmin.php">Add Admin</a></li>
        </ul>
    </nav>
    <div class="content">

<div class="add">
    <label class="add-fac">ADD ADMIN</label>
</div>
<div class="formcon">
    <div class="form">
        <form action="addAdmin.php" method="post">
            <div class="form-table">
                <div>
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
                <div>
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                <div>
                    <label for="middleName">Middle Name:</label>
                    <input type="text" id="middleName" name="middleName">
                </div>
                <div>
                    <label for="adminEmail">Email:</label>
                    <input type="email" id="adminEmail" name="adminEmail" required>
                </div>
                <div>
                    <label for="adminPassword">Password:</label>
                    <input type="password" id="adminPassword" name="adminPassword" required>
                </div>
                 <div>
                    <label for="role">Role:</label>
                    <input type="text" id="role" name="role" placeholder="Admin/Co Admin" required>
                </div>
                <div class="full-width">
                    <label for="department">Department:</label>
                    <input type="text" id="department" name="department" required>
                </div> 
            </div>
            <button type="submit" class="submit-btn">Add</button>
        </form>
    </div>
    </div>

</div>
    </div>
</body>
</html>