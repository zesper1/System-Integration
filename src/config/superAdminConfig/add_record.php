<?php
include '../../connection/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST['table'];
    $columns = array_keys($_POST);
    array_shift($columns); // Remove the 'table' key

    // Prepare the SQL statement
    $placeholders = implode(',', array_fill(0, count($columns), '?'));
    $sql = "INSERT INTO $table (" . implode(',', $columns) . ") VALUES ($placeholders)";

    $stmt = $conn->prepare($sql);

    // Bind parameters dynamically
    $params = [];
    foreach ($columns as $column) {
        $params[] = $_POST[$column];
    }

    if ($stmt->execute($params)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
