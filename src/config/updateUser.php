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

    // Execute the statement and set success or error message
    if ($stmt->execute()) {
        $_SESSION['update_success'] = "User updated successfully!";
    } else {
        $_SESSION['update_error'] = "Failed to update user!";
    }

    // Redirect to the view page
    header("Location: ../views/admin/viewUsersAdmin.php");
    exit();
}

// Close the connection
$conn->close();
?>
