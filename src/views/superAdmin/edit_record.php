<?php
include '../../connection/db_conn.php';
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../../../public/index.php");
}

$table = $_GET['table'];
$id = $_GET['id'];
$attribute = $_GET['attribute'];
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
<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
</head>
<body>
    <h2>Edit Record in <?php echo htmlspecialchars($table); ?></h2>
    <form action="../../config/superAdminConfig/update_record.php" method="POST">
        <input type="hidden" name="table" value="<?php echo htmlspecialchars($table); ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <?php foreach ($columns as $column): ?>
            <label for="<?php echo htmlspecialchars($column); ?>"><?php echo htmlspecialchars(ucfirst($column)); ?></label>
            <input type="text" id="<?php echo htmlspecialchars($column); ?>" name="<?php echo htmlspecialchars($column); ?>" 
                   value="<?php echo htmlspecialchars($record[$column]); ?>" required>
        <?php endforeach; ?>
        <button type="submit">Update Record</button>
    </form>
</body>
</html>