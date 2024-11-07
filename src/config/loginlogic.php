<?php
require_once "../connection/db_conn.php";

if (isset($_POST['login'])) {
    $username = $_POST["email"];
    $password = $_POST["password"];
    
    if ($stmt = $conn->prepare("SELECT * FROM user WHERE email = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Retrieve the password stored in the database
            $retrievedPassword = $row['password'];
            // Compare the entered password with the stored password (no hashing)
            if (password_verify($password, $retrievedPassword)) {
                session_start();
                $_SESSION["role"] = $row["role_ID"];
                $_SESSION["id"] = $row["user_ID"];
                
                if ($stmt1 = $conn->prepare("SELECT * FROM userdetails WHERE userID = ?")) {
                    $stmt1->bind_param("s", $_SESSION["id"]);
                    $stmt1->execute();
                    $result1 = $stmt1->get_result();

                    if ($result1 && $result1->num_rows > 0) {
                        $row1 = $result1->fetch_assoc();
                        $_SESSION["name"] = strtoupper($row1['first_name'] . " " . $row1['last_name']);
                    } else {
                        echo "Name not found.";
                    }
                    $stmt1->close();
                } else {
                    echo "Error preparing the SQL statement for user details: " . $conn->error;
                }
                
                // Redirect based on role
                switch ($_SESSION["role"]) {
                    case 1:
                        header("Location: ../views/admin/dashboardAdmin.php");
                        break;
                    case 2:
                        header("Location: ../../src/views/faculty/dashboardfaculty.php");
                        break;
                    case 3:
                        header("Location: ../../src/views/student/dashboardstudent.php");
                        break;
                    case 4:
                        header("Location: ../../src/views/superAdmin/databaseSuperAdmin.php");
                        break;
                    default:
                        echo "Role not defined.";
                        break;
                }

            } else {
                // Invalid password
                echo "<script>
                        alert('Invalid password.');
                        setTimeout(function(){
                            window.location.href = '../../public/';
                        }, 300);
                     </script>";
            }
        } else {
            // Account does not exist
            echo "<script>
                    alert('Account does not exist.');
                    setTimeout(function(){
                            window.location.href = '../../public/';
                    }, 300);
                  </script>";
        }
        $stmt->close();
    } else {
        // Error preparing the SQL statement
        echo "<script>
                alert('Error preparing the SQL statement: " . addslashes($conn->error) . "');
                setTimeout(function(){
                            window.location.href = '../../public/';
                }, 300);
            </script>";
    }

    // Close the database connection
    $conn->close();
}
?>
