<?php
include '../../connection/db_conn.php';
session_start();

header('Content-Type: application/json'); // Set header for JSON response

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = $_POST['table'];
    $id = $_POST['id'];
    $attribute = $_POST["attribute"];
    unset($_POST['table'], $_POST['id'], $_POST["attribute"]); // Remove these fields from the data

    // Validate table and ID
    if (empty($table) || empty($id)) {
        echo json_encode(['success' => false, 'error' => 'Table name and ID are required.']);
        exit;
    }

    // Create an update query dynamically
    $setClause = [];
    $values = [];
    foreach ($_POST as $column => $value) {
        $setClause[] = "`$column` = ?";
        $values[] = $value;
    }

    $setString = implode(', ', $setClause);
    $updateSql = "UPDATE `$table` SET $setString WHERE `$attribute` = ?";

    $stmt = $conn->prepare($updateSql);
    if (!$stmt) {
        echo json_encode(['success' => false, 'error' => 'Prepare failed: ' . $conn->error]);
        exit;
    }

    // Bind the values
    $values[] = $id; // Append ID for the WHERE clause
    $types = str_repeat('s', count($values) - 1) . 'i'; // Assuming all are strings except ID
    $stmt->bind_param($types, ...$values);

    // Execute the update
    if ($stmt->execute()) {
        header("Location: ../../views/superAdmin/manipulateSAdmin.php?update success");
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
