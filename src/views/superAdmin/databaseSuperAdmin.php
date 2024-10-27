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
    <title>Dashboard</title>
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

        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .card-container {
            display: flex;
            justify-content: space-around; 
            flex-wrap: wrap;
            height: auto; 
}

.card {
    background-color: gainsboro;
    width: 20%; 
    height: auto; 
    padding: 20px;
    text-align: center; 
    border-radius: 8px; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
}

.card-count {
    font-size: 40px;
    font-weight: bold; 
}

.page-name{
    margin-left: 5%;
}

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-title">
            <ul class="nav-links horizontal">
                <li><a href="databaseSuperAdmin">Home</a></li>
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
        <div class="container">
            <div class="page-name">
                <h1>Database</h1>
            </div>
            <div class="card-container">
            <div class="card">
                <div class="card-count"><?php echo htmlspecialchars($tableCount); ?></div>
                <div class="card-name">Tables In Use</div>
            </div>
            <div class="card">
                <div class="card-count">101</div>
                <div class="card-name">Violation Type</div>
            </div>
            <div class="card">
                <div class="card-count">102</div>
                <div class="card-name">Complaint Type</div>
            </div>
        </div>
        </div>
    </div>
    </div>
</body>
</html>
