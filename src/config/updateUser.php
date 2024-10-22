<?php
include "../connection/db_conn.php";
session_start();
if (isset($_POST["updateUser"])) {
    $id = $_POST["userID"];
    $fName = $_POST["FirstName"];
    $lName = $_POST["LastName"];
    $email = $_POST["Email"];
    $role = $_POST["Role"];

    // Prepare the stored procedure call
    $stmt = $conn->prepare("CALL update_user_and_profile(?, ?, ?, ?, ?)");
    
    // Check if the statement was prepared successfully
    if (!$stmt) {
        die("Preparation failed: " . $conn->error);
    }

    // Bind parameters to the SQL statement
    $stmt->bind_param("isssi", $id, $fName, $lName, $email, $role);

    // Execute the statement
    if ($stmt->execute()) {
        // Success message
        echo "Success: User and profile updated.";
    } else {
        // Error message
        echo "Error executing stored procedure: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection if needed
$conn->close();

?>