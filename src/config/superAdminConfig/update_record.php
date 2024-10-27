<?php
include '../../connection/db_conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = $_POST['table'];
    $id = $_POST['id'];
    unset($_POST['table'], $_POST['id']); // Remove these fields from the data

    // Create an update query dynamically
    $setClause = [];
    $values = [];
    foreach ($_POST as $column => $value) {
        $setClause[] = "`$column` = ?";
        $values[] = $value;
    }

    $setString = implode(', ', $setClause);
    $updateSql = "UPDATE `$table` SET $setString WHERE `id` = ?";
    $stmt = $conn->prepare($updateSql);

    // Bind the values
    $values[] = $id; // Append ID for the WHERE clause
    $types = str_repeat('s', count($values) - 1) . 'i'; // Assuming all are strings except ID
    $stmt->bind_param($types, ...$values); // Bind parameters

    // Execute the update
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
        header("Location: ../../views/superAdmin/manipulateSAdmin.php?update success");
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
