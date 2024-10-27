<?php
include '../../connection/db_conn.php';

if (isset($_GET['table'])) {
    $table = $_GET['table'];

    // Fetch column names
    $columnsResult = $conn->query("SHOW COLUMNS FROM `$table`");
    if (!$columnsResult) {
        echo json_encode(['error' => 'Failed to fetch columns: ' . $conn->error]);
        exit();
    }
    
    $columns = [];
    while ($row = $columnsResult->fetch_assoc()) {
        $columns[] = $row['Field'];
    }

    // Fetch records
    $recordsResult = $conn->query("SELECT * FROM `$table`");
    if (!$recordsResult) {
        echo json_encode(['error' => 'Failed to fetch records: ' . $conn->error]);
        exit();
    }
    
    $records = [];
    while ($row = $recordsResult->fetch_row()) {
        $records[] = $row;
    }

    // Return data as JSON
    echo json_encode(['columns' => $columns, 'records' => $records]);
} else {
    echo json_encode(['error' => 'No table specified']);
}
?>
