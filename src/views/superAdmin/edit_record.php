<?php
include '../../connection/db_conn.php';
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../../../public/index.php");
}

$table = $_GET['table'];
$id = $_GET['id'];
$attribute = $_GET['attribute'];
echo $attribute;
// Fetch the record to edit
$stmt = $conn->prepare("SELECT * FROM `$table` WHERE `$attribute` = ?");
$stmt->bind_param("i", $id); // Assuming the ID is an integer
$stmt->execute();
$result = $stmt->get_result();
$record = $result->fetch_assoc();

if (!$record) {
    echo "Record not found.";
    exit;
}

// Fetch table columns
$columns = array_keys($record);
?>
<!DOCTYPE html>
<html lang="en">

<style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Body Styling */
body {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    background-color: #f3f4f6; /* Light gray background */
}

/* Container */
form {
    background-color: #ffffff;
    width: 90%;
    max-width: 600px;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

/* Form Title */
h2 {
    color: #34408D;
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

/* Input Field Styling */
label {
    display: block;
    font-size: 16px;
    color: #34408D;
    margin: 15px 0 5px;
}

input[type="text"] {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    transition: border-color 0.3s;
}

input[type="text"]:focus {
    border-color: #34408D;
    outline: none;
}

/* Button Styling */
button[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #34408D;
    color: #ffffff;
    font-size: 18px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 20px;
}

button[type="submit"]:hover {
    background-color: #2a346b;
}

</style>    
<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
</head>
<body>
    <h2>Edit Record in <?php echo htmlspecialchars($table); ?></h2>
    <form action="../../config/superAdminConfig/update_record.php" method="POST">
        <input type="hidden" name="table" value="<?php echo htmlspecialchars($table); ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <input type="hidden" name="attribute" value="<?php echo htmlspecialchars($attribute);?>">
        <?php foreach ($columns as $column): ?>
            <label for="<?php echo htmlspecialchars($column); ?>"><?php echo htmlspecialchars(ucfirst($column)); ?></label>
            <input type="text" id="<?php echo htmlspecialchars($column); ?>" name="<?php echo htmlspecialchars($column); ?>" 
                   value="<?php echo htmlspecialchars($record[$column]); ?>" required>
        <?php endforeach; ?>
        <button type="submit">Update Record</button>
    </form>
</body>
</html>