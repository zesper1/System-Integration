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
            height: 100vh; /* Full viewport height */
        }

        /* Horizontal Navbar Styles */
        .navbar {
            background-color: #333; /* Dark background color */
            width: 100%; /* Full width */
            color: white;
            display: flex;
            justify-content: space-between; /* Space between items */
            align-items: center; /* Center items vertically */
            position: relative; /* Position relative to contain the sidebar */
            z-index: 1; /* Ensure the navbar is on top of the sidebar */
        }

        /* Vertical Sidebar Styles */
        .sidebar {
            width: 200px; /* Set width of the sidebar */
            background-color: #444; /* Darker background for the sidebar */
            padding: 40px 10px; /* Spacing around the nav items */
            height: 100%; /* Full height of the viewport */
            display: flex;
            flex-direction: column; /* Arrange items vertically */
            position: fixed; /* Keep the sidebar fixed */
            top: 0; /* Align at the top */
            left: 0; /* Align to the left */
            z-index: 0; /* Sidebar below the navbar */
            overflow-y: auto; /* Scroll if sidebar content overflows */
        }
        .nav-links {
            list-style-type: none; /* Remove bullet points from list */
            padding: 0; /* Remove default padding */
        }

        .nav-links li {
            margin: 10px 0; /* Spacing between links */
        }

        .nav-links a {
            color: white; /* Text color */
            text-decoration: none; /* Remove underline from links */
            padding: 10px; /* Spacing around text */
            display: block; /* Make links block-level elements */
            transition: background-color 0.3s; /* Smooth background transition */
        }

        .nav-links a:hover {
            background-color: #575757; /* Background color on hover */
            border-radius: 4px; /* Rounded corners on hover */
        }
        
        .horizontal{
            display: flex;
            padding: 0;
        }
        .horizontal a{
            padding: 5px 10px;
        }

        .content {
            flex-grow: 1; /* Allow content to take remaining space */
            padding: 20px; /* Spacing for content */
            margin-left: 220px; /* Space for the sidebar */
            overflow: auto; /* Scroll if content overflows */
        }
        .card-container {
            display: flex;
            justify-content: space-around; /* Space cards evenly */
            flex-wrap: wrap; /* Allow cards to wrap */
            gap: 20px; /* Spacing between cards */
            height: auto; /* Allow height to adjust based on content */
}

.card {
    background-color: gainsboro;
    width: 30%; /* Adjust width for responsiveness */
    min-width: 200px; /* Minimum width for smaller screens */
    height: auto; /* Allow height to adjust based on content */
    padding: 20px;
    text-align: center; /* Center text in cards */
    border-radius: 8px; /* Rounded corners for cards */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add subtle shadow */
}

.card-count {
    font-size: 40px;
    font-weight: bold; /* Make count text bold */
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
    <nav class="sidebar">
        <ul class="nav-links vertical">
            <li><a href="manipulateSAdmin.php">Manipulate records</a></li>
            <li><a href="viewSAdmin.php">View records</a></li>
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
</body>
</html>
