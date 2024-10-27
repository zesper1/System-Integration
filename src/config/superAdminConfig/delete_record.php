<?php
include '../../connection/db_conn.php';
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true); // Retrieve the DELETE request body
    $table = $data["table"];
    $id = $data["id"];

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM `$table` WHERE id = ?");
    $stmt->bind_param("i", $id); // Assuming the ID is an integer

    try {
        // Attempt to execute the delete statement
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            // If the execution fails, check for specific error
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }
    } catch (mysqli_sql_exception $e) {
        // Catch foreign key constraint violation
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
