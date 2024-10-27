<?php
include '../../connection/db_conn.php';

$table = $_GET['table'] ?? '';

if ($table) {
    $foreignKeys = [];

    // Query to get foreign key columns
    $query = "
        SELECT COLUMN_NAME
        FROM information_schema.KEY_COLUMN_USAGE
        WHERE TABLE_NAME = '$table' AND TABLE_SCHEMA = 'your_database_name' AND REFERENCED_TABLE_NAME IS NOT NULL
    ";

    $result = $conn->query($query);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $foreignKeys[] = $row['COLUMN_NAME'];
        }
    }

    echo json_encode($foreignKeys);
} else {
    echo json_encode([]);
}
?>
