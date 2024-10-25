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
            session_start();
            $_SESSION["role"] = $row["role_ID"];
            $_SESSION["id"] = $row["user_ID"];
            if ($stmt1 = $conn->prepare("SELECT * FROM userdetails WHERE userID = ?")) {
                $stmt1->bind_param("s", $_SESSION["id"]);
                $stmt1->execute();
                $result = $stmt1->get_result();
                if ($result) {
                    if ($result->num_rows > 0) {
                        $row1 = $result->fetch_assoc();
                        $_SESSION["name"] = strtoupper($row1['first_name'] . " " . $row1['last_name']);
                    } else {
                        echo "Name not found";
                    }
                } else {
                    echo "Error fetching the result: " . $conn->error;
                }
                $stmt1->close();
            } else {
                echo "Error preparing the SQL statement: " . $conn->error;
            }
            switch($_SESSION["role"]){
                case 1:
                    header("Location: ../views/admin/dashboardAdmin.php");
                    break;
                case 2:
                    header("Location: ../../src/views/faculty/dashboardfaculty.php");
                    break;
                case 3:
                    header("Location: ../../src/views/student/dashboardstudent.php");
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