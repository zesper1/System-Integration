<?php
include "../connection/db_conn.php";
session_start();

///////////////////////
// ADMIN PROMPTS //////
///////////////////////
if (isset($_POST["add_student"])) {
    // Name variables
    $lname = $_POST["last_name"];
    $fname = $_POST["first_name"];
    $mname = $_POST["middle_name"];
    
    // Student details variables
    $program = $_POST["program"];
    $year_level = $_POST["year_level"];
    $student_id = $_POST["student_id"];
    $section = $_POST["section"];
    
    // Credentials
    $email = $_POST["email"];
    $password = $_POST["password"]; // Raw password from the form

    // Hashing the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $role = 3; // Default role
    
    // Duplicate checker
    if ($checker = $conn->prepare("SELECT * FROM user WHERE user_ID = ?")) {
        $checker->bind_param("s", $student_id);
        $checker->execute();
        $checkres = $checker->get_result();
        
        if ($checkres->num_rows > 0) {
            $_SESSION["exists"] = true; // Student ID already exists
        } else {
            $_SESSION["flag"] = true; // No duplicate found
            
            // User detail query
            if ($stmt1 = $conn->prepare("INSERT INTO user (user_ID, role_ID, email, password) VALUES (?, ?, ?, ?)")) {
                $stmt1->bind_param("iiss", $student_id, $role, $email, $hashed_password);
                
                // Execute and check success
                if ($stmt1->execute()) {
                    // User details query
                    if ($stmt2 = $conn->prepare("INSERT INTO userdetails (userID, first_name, middle_name, last_name) VALUES (?, ?, ?, ?)")) {
                        $stmt2->bind_param("ssss", $student_id, $fname, $mname, $lname);
                        
                        if ($stmt2->execute()) {
                            // Student details query
                            if ($stmt3 = $conn->prepare("INSERT INTO student (stud_id, program, yearlevel, section) VALUES (?, ?, ?, ?)")) {
                                $stmt3->bind_param("isss", $student_id, $program, $year_level, $section);
                                if ($stmt3->execute()) {
                                    $_SESSION["success"] = true; // Student added successfully
                                    header("Location: ../views/admin/addStudent.php");
                                    exit(); // Ensure no further code is executed
                                } else {
                                    // Handle error in student details insertion
                                    echo "Error inserting student details: " . $stmt3->error;
                                }
                            } else {
                                echo "Error preparing student details insert statement: " . $conn->error;
                            }
                        } else {
                            // Handle error in user details insertion
                            echo "Error inserting user details: " . $stmt2->error;
                        }
                    } else {
                        echo "Error preparing user details insert statement: " . $conn->error;
                    }
                } else {
                    // Handle error in user insertion
                    echo "Error inserting user: " . $stmt1->error;
                }
                
                // Close statement
                $stmt1->close();
            } else {
                echo "Error preparing user insert statement: " . $conn->error;
            }
        }
        
        // Close checker statement
        $checker->close();
    }
}


if (isset($_POST["add_faculty"])) {
    // User details
    $lname = $_POST["lname"];
    $mname = $_POST["mname"];
    $fname = $_POST["fname"];
    
    // Credentials
    $email = $_POST["email"];
    $password = $_POST["pass"]; // Raw password from the form

    // Hashing the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Faculty details
    $dept = $_POST["school"];
    $emp_id = $_POST["employee_ID"];
    $role = 2; // Role for faculty

    // Start transaction
    $conn->begin_transaction();
    try {
        // Duplicate checker
        if ($checker = $conn->prepare("SELECT * FROM user WHERE user_ID = ?")) {
            $checker->bind_param("s", $emp_id);
            $checker->execute();
            $checkres = $checker->get_result();
            
            if ($checkres->num_rows > 0) {
                $_SESSION["exists"] = true; // Faculty ID already exists
                throw new Exception("Faculty ID already exists.");
            } else {
                $_SESSION["flag"] = true; // No duplicate found
                
                // User detail query
                if ($stmt1 = $conn->prepare("INSERT INTO user (user_ID, role_ID, email, password) VALUES (?, ?, ?, ?)")) {
                    $stmt1->bind_param("iiss", $emp_id, $role, $email, $hashed_password);
                    
                    // Execute and check success
                    if ($stmt1->execute()) {
                        // User details query
                        if ($stmt2 = $conn->prepare("INSERT INTO userdetails (userID, first_name, middle_name, last_name) VALUES (?, ?, ?, ?)")) {
                            $stmt2->bind_param("ssss", $emp_id, $fname, $mname, $lname);
                            
                            if ($stmt2->execute()) {
                                // Faculty details query
                                if ($stmt3 = $conn->prepare("INSERT INTO faculty (fac_id, dept) VALUES (?, ?)")) {
                                    $stmt3->bind_param("is", $emp_id, $dept);
                                    
                                    if ($stmt3->execute()) {
                                        $_SESSION["message"] = "Faculty account added successfully."; // Set success message
                                        $conn->commit(); // Commit transaction
                                        header("Location: ../views/admin/addFaculty.php");
                                        exit();
                                    } else {
                                        throw new Exception("Error inserting faculty details: " . $stmt3->error);
                                    }
                                } else {
                                    throw new Exception("Error preparing faculty insert statement: " . $conn->error);
                                }
                            } else {
                                throw new Exception("Error inserting user details: " . $stmt2->error);
                            }
                        } else {
                            throw new Exception("Error preparing user details insert statement: " . $conn->error);
                        }
                    } else {
                        throw new Exception("Error inserting user: " . $stmt1->error);
                    }
                }
            }
            // Close checker statement
            $checker->close();
        }
    } catch (Exception $e) {
        // Rollback transaction if something went wrong
        $conn->rollback();
        $_SESSION["message"] = "Transaction failed: " . $e->getMessage();
        header("Location: ../views/admin/addFaculty.php"); // Redirect even if it fails
        exit();
    }
}

if (isset($_POST["add_admin"])) {
    // User details
    $lname = $_POST["lname"];
    $mname = $_POST["mname"];
    $fname = $_POST["fname"];
    
    // Credentials
    $email = $_POST["email"];
    $password = $_POST["pass"]; // Raw password from the form

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Admin-specific details
    $role = 1; // Role ID for Admin

    // Start transaction
    $conn->begin_transaction();
    try {
        // Duplicate checker (checking if the email already exists)
        if ($checker = $conn->prepare("SELECT * FROM user WHERE email = ?")) {
            $checker->bind_param("s", $email);
            $checker->execute();
            $checkres = $checker->get_result();
            
            if ($checkres->num_rows > 0) {
                $_SESSION["exists"] = true; // Admin email already exists
                throw new Exception("Admin email already exists.");
            } else {
                $_SESSION["flag"] = true; // No duplicate found
                
                // Insert admin credentials into `user` table
                if ($stmt1 = $conn->prepare("INSERT INTO user (role_ID, email, password) VALUES (?, ?, ?)")) {
                    $stmt1->bind_param("iss", $role, $email, $hashed_password);
                    
                    // Execute and check success
                    if ($stmt1->execute()) {
                        // Get the user ID of the newly added admin
                        $user_ID = $conn->insert_id;

                        // Insert admin details into `userdetails` table
                        if ($stmt2 = $conn->prepare("INSERT INTO userdetails (userID, first_name, middle_name, last_name) VALUES (?, ?, ?, ?)")) {
                            $stmt2->bind_param("isss", $user_ID, $fname, $mname, $lname);
                            
                            if ($stmt2->execute()) {
                                $_SESSION["message"] = "Admin account added successfully."; // Success message
                                $conn->commit(); // Commit transaction
                                header("Location: ../views/admin/addAdmin.php");
                                exit();
                            } else {
                                throw new Exception("Error inserting admin details: " . $stmt2->error);
                            }
                        } else {
                            throw new Exception("Error preparing admin details insert statement: " . $conn->error);
                        }
                    } else {
                        throw new Exception("Error inserting admin: " . $stmt1->error);
                    }
                }
            }
            // Close checker statement
            $checker->close();
        }
    } catch (Exception $e) {
        // Rollback transaction if something went wrong
        $conn->rollback();
        $_SESSION["message"] = "Transaction failed: " . $e->getMessage();
        header("Location: ../views/admin/addAdmin.php"); // Redirect even if it fails
        exit();
    }
}


    if (isset($_POST["addViolation"])) {
        $vID = $_POST["StudentName"];
        
        if (preg_match('/\d+/', $vID, $matches)) {
            $id = $matches[0]; // Get the first match
        }
        
        $vType = $_POST["ViolationType"];
        $vSeverity = $_POST["ViolationSeverity"];
        $repDetID = $_POST["repDetID"];
        $stmt = $conn->prepare("INSERT INTO 
                violation(severity_ID, violationType_ID, violationDetail_ID, violator_ID) 
                VALUES (?,?,?,?)");
        $stmt->bind_param("iiii", $vSeverity, $vType, $repDetID, $id);
        
        if ($stmt->execute()) {
            $_SESSION["success"] = true;
        } else {
            $_SESSION["success"] = false;
        }
        header("Location: ../views/admin/adminViolation.php");
        exit(); // Ensure the script terminates after redirection
    }



///////////////////////
// STUDENT PROMPTS ////
///////////////////////

if (isset($_POST['submitReport']) & isset($_POST['type'])) {
    // REPORT DETAILS FUNCTION
    $rTitle = $_POST['title'];
    $rType = $_POST['type'];
    $rDesc = $_POST['description'];

    if ($rType == 'Violation') {
        $violatorID = $_POST['violator'];
        $violationID = $_POST['vType'];

        // Use regex to match the ID
        if (preg_match('/\d+/', $violatorID, $matches)) {
            $id = $matches[0]; // Get the first match
        }

        $stmt = $conn->prepare("INSERT INTO report (reportName, reportOwnerID, reportType) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $rTitle, $_SESSION['id'], $rType);

        if ($stmt->execute()) {
            $report_id = $stmt->insert_id;
            $stmt1 = $conn->prepare("INSERT INTO reportstatus (reportID, status_DETAILS) VALUES (?, ?)");
            $stmt1->bind_param("is", $report_id, $rDesc);

            if ($stmt1->execute()) {
                $vReportQuery = $conn->prepare("INSERT INTO violationreport (reportID, violationTypeID, accusedID) VALUES (?, ?, ?)");
                $vReportQuery->bind_param("iii", $report_id, $violationID, $id);

                if ($vReportQuery->execute()) {
                    if (isset($_FILES['my_image']) && $_FILES['my_image']['error'] === UPLOAD_ERR_NO_FILE) {
                        $_SESSION["report_success"] = true; // Set session variable

                        if ($_SESSION['role'] == 2) {
                            header("Location: ../views/faculty/reportFaculty.php");
                        } else {
                            // header("Location: ../views/student/reportStudent.php");
                            echo "
                                <script>
                                    alert('Success');
                                    window.location.href = '../views/student/reportStudent.php?message=report added successfully';
                                </script>
                            ";
                        }
                        exit();
                    } else {
                        include_once "upload.php";
                    }
                }
            }
        }
    } else {
        $complaintID = $_POST['cType'];
        $stmt = $conn->prepare("INSERT INTO report (reportName, reportOwnerID, reportType) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $rTitle, $_SESSION['id'], $rType);

        if ($stmt->execute()) {
            $report_id = $stmt->insert_id;
            $stmt1 = $conn->prepare("INSERT INTO reportstatus (reportID, status_DETAILS) VALUES (?, ?)");
            $stmt1->bind_param("is", $report_id, $rDesc);

            if ($stmt1->execute()) {
                $cReportQuery = $conn->prepare("INSERT INTO complainsreport (reportID, cr_Category) VALUES (?, ?)");
                $cReportQuery->bind_param("ii", $report_id, $complaintID);

                if ($cReportQuery->execute()) {
                    if (isset($_FILES['my_image']) && $_FILES['my_image']['error'] === UPLOAD_ERR_NO_FILE) {
                        $_SESSION["report_success"] = true; // Set session variable

                        if ($_SESSION['role'] == 2) {
                            header("Location: ../views/faculty/reportFaculty.php");
                        } else {
                            // header("Location: ../views/student/reportStudent.php");
                            echo "
                                <script>
                                    alert('Success');
                                    window.location.href = '../views/student/reportStudent.php?message=report added successfully';
                                </script>
                            ";
                        }
                        exit();
                    } else {
                        include_once "upload.php";
                    }
                }
            }
        }
    }
} else {
    echo "
        <script>
            window.location.href = '../views/student/reportStudent.php?message=please complete fields';
        </script>
    ";
}
?>
