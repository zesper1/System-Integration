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

        .nav-right{
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: end;
            margin-right: 2%;
        }

        .nav-right a {
    color: white;
    padding: 10px;
    background-color: #f44336; /* Red background for logout */
    border-radius: 5px;
    text-decoration: none;
    margin-left: 15px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.nav-right a:hover {
    background-color: #d32f2f; /* Darker red on hover */
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

        .con1 {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 80%;
    height: 70%;
}
.con {
    width: 70%;
    max-width: 800px;
    background-color: #f5f5f5; /* Light background for contrast */
    padding: 20px;
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Soft shadow for depth */
    display: flex;
    flex-direction: column;
    align-items: center;
}

.select {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-bottom: 15px; /* Space below the header */
}

.container {
    width: 100%;
    background-color: #fff; /* White background for clarity */
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    table-layout: fixed;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

th {
    background-color: #e0e0e0; /* Light header background */
    font-weight: bold;
}

td {
    background-color: #fafafa;
}

/* Action Buttons Styling */
.action-buttons {
    display: flex;
    gap: 10px;
}

.action-buttons button {
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.edit-button {
    background-color: #4CAF50;
    color: white;
}

.delete-button {
    background-color: #f44336;
    color: white;
}

.add-button {
    margin-top: 20px;
    padding: 10px 15px;
    background-color: #2196F3;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

        /* Dropdown Styles */
#table-select {
    width: 200px; /* Set a consistent width */
    padding: 8px; /* Minimal padding */
    font-size: 16px; /* Readable font size */
    border: 1px solid #ccc; /* Light border */
    border-radius: 4px; /* Slightly rounded corners */
    background-color: #f9f9f9; /* Light background */
    color: #34408D; /* Dark text color */
    outline: none; /* Remove outline on focus */
    cursor: pointer; /* Pointer cursor */
}

#table-select:hover {
    background-color: #e6e6e6; /* Subtle hover effect */
}

#table-select:focus {
    border-color: #34408D; /* Dark border on focus */
}       

        /* Modal styles */
        .modal {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.6); /* Darker overlay */
    animation: fadeIn 0.3s ease-in-out; /* Fade-in effect */
}
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 30px;
    border-radius: 10px; /* Rounded corners */
    width: 60%;
    max-width: 600px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3); /* Deep shadow */
    animation: slideDown 0.4s ease-in-out; /* Slide-down animation */
}
.close {
    color: #888;
    font-size: 24px;
    font-weight: bold;
    position: absolute;
    top: 15px;
    right: 20px;
    cursor: pointer;
    transition: color 0.3s;
}

.close:hover,
.close:focus {
    color: #333; /* Darker color on hover */
}

.modal-content h3 {
    margin-top: 0;
    color: #34408D; /* Match the color theme */
}

.modal-content form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.modal-content button[type="submit"] {
    padding: 10px 15px;
    background-color: #34408D;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.modal-content button[type="submit"]:hover {
    background-color: #2a3671; /* Darker shade on hover */
}

/* Text Field Styling */
.modal-content input[type="text"],
.modal-content input[type="email"],
.modal-content input[type="number"],
.modal-content select,
.modal-content textarea {
    width: 100%;
    padding: 10px 12px;
    margin-top: 10px;
    font-size: 16px;
    color: #333;
    background-color: #f9f9f9; /* Light background */
    border: 1px solid #ccc; /* Soft border */
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s, background-color 0.3s;
}

.modal-content input[type="text"]:focus,
.modal-content input[type="email"]:focus,
.modal-content input[type="number"]:focus,
.modal-content select:focus,
.modal-content textarea:focus {
    border-color: #34408D; /* Match the theme color */
    background-color: #fff;
}

/* Textarea adjustments */
.modal-content textarea {
    resize: vertical; /* Allow vertical resizing */
    min-height: 100px; /* Minimum height for readability */
}

/* Label Styling */
.modal-content label {
    font-size: 14px;
    color: #34408D;
    margin-bottom: 5px;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideDown {
    from { transform: translateY(-20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-right">
            Hello, <?php echo htmlspecialchars($_SESSION["name"]); ?>
        </div>
    </nav>

    <div class="main">
    <nav class="sidebar">
        <ul class="nav-links vertical">
            <li><a href="manipulateSAdmin.php">Manipulate records</a></li>
            <li><a href="addSAdmin.php">Add Admin</a></li>
            <li><a href="databaseSuperAdmin.php">Database</a></li>
            <a href="../../config/logout.php">Logout</a>
        </ul>
    </nav>
    <div class="con1">
    <div class="con">
        <div class="select"><h2>Select a Table</h2></div>
    <div class="container">
        <select id="table-select" onchange="viewColumns()">
            <option value="">Select a table</option>
            <option value="school">School</option>
            <option value="course">Course</option>
            <option value="section">Section</option>
            <option value="violationtype">Violation Type</option>
            <option value="complains_category">Complains Type</option>
        </select>
        <button class="add-button" id="add-button" onclick="openModal()" style="display:none;">Add</button>
        
        <div class="columns-container" id="columns-display">
            <table>
                <thead>
                    <tr id="table-header"></tr>
                </thead>
                <tbody id="records-display"></tbody> <!-- To display the records -->
            </table>
        </div>
        </div>
        </div>

        <!-- Add Record Modal -->
        <div id="addRecordModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h3>Add New Record</h3>
                <form id="form-add-record" onsubmit="addRecord(event)">
                    <input type="hidden" name="table" id="add-table" value="">
                    <div id="add-fields-container"></div> <!-- Dynamic fields will be generated here -->
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div> 

    </div>
</body>

<script src="../../../public/assets/js/manipulateSAdmin.js"></script>
</html>
