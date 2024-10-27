<!DOCTYPE html>
<?php
include '../../connection/db_conn.php';
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../../../public/index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Manipulation</title>
    <style>
        /* Basic styles for the layout */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed; /* Ensures consistent column width */
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left; /* Align text to the left */
            overflow: hidden; /* Prevent overflow for long text */
            white-space: nowrap; /* Prevent text wrapping */
            text-overflow: ellipsis; /* Show ellipsis for overflow text */
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold; /* Make headers bold */
        }
        td {
            background-color: #fff; /* Light background for records */
        }
        .action-buttons {
            display: flex;
            gap: 10px; /* Space between buttons */
        }
        .action-buttons button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .edit-button {
            background-color: #4CAF50; /* Green */
            color: white;
        }
        .delete-button {
            background-color: #f44336; /* Red */
            color: white;
        }
        .add-button {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #2196F3; /* Blue */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-title">
            <ul class="nav-links horizontal">
                <li><a href="#home">Home</a></li>
                <li><a href="#database">Database</a></li>
            </ul>
        </div>
        <div class="nav-right">
            Hello, <?php echo htmlspecialchars($_SESSION["name"]); ?>
        </div>
    </nav>
    <div class="container">
        <h2>Select a Table</h2>
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

    <script src="../../../public/assets/js/manipulateSAdmin.js">

    </script>
</body>
</html>
