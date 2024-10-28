<?php
include '../../connection/db_conn.php';
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the table name from POST data
    if (!isset($_POST['table'])) {
        echo json_encode(['success' => false, 'error' => 'Table name is required.']);
        exit;
    }

    $table = $_POST['table'];
    unset($_POST['table']); // Remove 'table' from $_POST array to use only columns

    // Extract columns and values from $_POST
    $columns = array_keys($_POST);
    $values = array_values($_POST);

    // Prepare the SQL statement with placeholders for each column
    $placeholders = implode(',', array_fill(0, count($columns), '?'));
    $sql = "INSERT INTO `$table` (" . implode(',', $columns) . ") VALUES ($placeholders)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo json_encode(['success' => false, 'error' => 'Prepare failed: ' . $conn->error]);
        exit;
    }

    // Create a types string (assuming all are strings; adjust as needed)
    $types = str_repeat('s', count($values)); // 's' for string; adjust if needed for other types
    $stmt->bind_param($types, ...$values); // Bind all values at once using spread operator

    try{
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Record added successfully']);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }
    } catch (mysqli_sql_exception $e){
        if ($e->getCode() === 23000) { // MySQL error code for foreign key constraint violation
            echo json_encode(['success' => false, 'error' => 'Cannot delete record: Foreign key constraint violation.']);
        } else {
            // Handle other SQL exceptions
            echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
        }
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
