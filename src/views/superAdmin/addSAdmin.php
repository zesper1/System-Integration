<!DOCTYPE html>
<?php
include '../../connection/db_conn.php';
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../../../public/index.php");
}
function fetchRoles($conn){
    $query = "SELECT * FROM roles;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}
function fetchDept($conn){
    $query = "SELECT * FROM school;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
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

        .nav-right{
            width: 100%;
            height: 50px;
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

        .form-table select {
    width: 95%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    font-size: 14px;
    color: #34408D;
    appearance: none; /* Remove default arrow for more control */
    cursor: pointer;
    outline: none;
    transition: border-color 0.3s ease;
}

/* Custom arrow for dropdowns */
.form-table select::-ms-expand {
    display: none; /* Hide default arrow in IE */
}

.form-table select:focus {
    border-color: #34408D;
}

.form-table select option {
    color: #333;
}

/* Style the dropdown on hover */
.form-table select:hover {
    border-color: #2b3675;
    background-color: #f1f1f1;
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
    <div class="content">

<div class="add">
    <label class="add-fac">ADD ADMIN</label>
</div>
<div class="formcon">
    <div class="form">
        <form action="../../config/superAdminConfig/add_admin.php" method="post">
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
                 <?php $roles = fetchRoles($conn); ?>
                    <label for="role">Role:</label>
                    <select name="role" id="role">
                        <option value="" default>Select a role.</option>
                        <?php foreach($roles as $r): ?>
                            <?php $option = trim($r["rolename"]); // Trim any extra spaces ?>
                            <?php if($option == "Admin" || $option == "Super Admin"): ?>
                                <option value="<?php echo $r['role_ID']; ?>"><?php echo $option; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="full-width">
                <?php $dept = fetchDept($conn); ?>
                    <label for="department">School:</label>
                    <select name="department" id="">
                        <option value="" default>Select a school.</option>
                        <?php foreach($dept as $d): ?>
                            <?php $option = trim($d["SchoolName"]); // Trim any extra spaces ?>
                            <option value="<?php echo $d['id']; ?>"><?php echo $option; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 
            </div>
            <button type="submit" class="submit-btn" name="add_admin">Add</button>
        </form>
    </div>
    </div>

</div>
    </div>
</body>
</html>
