<?php
require '../connection/db_conn.php'; // Make sure to include your database connection
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['id'])) {
    $messageId = $input['id'];

    $sql = "UPDATE reportstatus SET status = 'Read' WHERE reportID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $messageId);

    if ($stmt->execute()) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false, 'message' => 'No ID provided'];
    }
    echo json_encode($response);
}
?>
