<?php
include "../../connection/db_conn.php";
session_start();

$user_id = $_SESSION['id'];

echo $user_id;

// Insert appeal if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['description'])) {
    $selectedViolationID = $_POST['title']; // Get the selected violation ID
    $description = $_POST['description'];

    // Insert into appeals table
    $insertAppealQuery = "INSERT INTO appeals (student_id, appeal_reason) VALUES (?, ?)";
    $insertAppealStmt = $conn->prepare($insertAppealQuery);
    $insertAppealStmt->bind_param("is", $user_id, $description);
    
    if ($insertAppealStmt->execute()) {
        $appealId = $insertAppealStmt->insert_id; // Get the last inserted appeal ID
        
        // Insert into studentAppeals table
        $insertStudentAppealQuery = "INSERT INTO studentAppeals (appeal_id, status) VALUES (?, 'Pending')";
        $insertStudentAppealStmt = $conn->prepare($insertStudentAppealQuery);
        $insertStudentAppealStmt->bind_param("i", $appealId);
        
        if ($insertStudentAppealStmt->execute()) {
            // Redirect to appealStudent.php after successful insertion
            header("Location: appealStudent.php?success=1");
            echo "<script>
                    alert('Successfully submitted your appeal. We will reach out to you via email. Thank you!');
                  </script>";
            exit(); // Make sure to exit after header to prevent further script execution
        } else {
            echo "Error inserting into studentAppeals: " . $insertStudentAppealStmt->error;
        }
    } else {
        echo "Error inserting into appeals: " . $insertAppealStmt->error;
    }
}

?>