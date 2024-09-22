<?php
require_once "../connection/db_conn.php"; // Ensure this file initializes $conn correctly
if (isset($_POST['login'])) {
    // Retrieve form data
    $username = $_POST["email"];
    $password = $_POST["password"];
    $roles = $_POST["role"];
    // Prepare the SQL statement
    if ($stmt = $conn->prepare("SELECT * FROM user WHERE email = ?")) {
        // Bind parameters
        $stmt->bind_param("s", $username);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Fetch and process the results
            $row = $result->fetch_assoc();
            $_SESSION["role"] = $row["role_ID"];
            $_SESSION["id"] = $row["user_ID"];
            switch($_SESSION["role"]){
                case 1:
                    Header("Location: ../views/dashboardAdmin.php");
                    break;
                case 2:
                    Header("Location: ../../src/views/dashboardAdmin.php");
                    break;
                case 3:
                    Header("Location: ../../src/views/dashboardAdmin.php");
                    break;
            }
        } else {
            // No rows returned, account does not exist
            echo "Account does not exist.";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Error preparing the statement
        echo "Error preparing the SQL statement: " . $conn->error;
    }
    // Close the database connection
    $conn->close();
}
?>