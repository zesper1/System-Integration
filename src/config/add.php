<?php
include "../connection/db_conn.php";
session_start();

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
    $password = $_POST["password"]; // Hashing the password
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
                $stmt1->bind_param("iiss", $student_id, $role, $email, $password);
                
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
                                } else {
                                    // Handle error in student details insertion
                                    echo"flagged";
                                    echo "Error inserting student details: " . $stmt3->error;
                                }
                            }
                        } else {
                            // Handle error in user details insertion
                            echo "Error inserting user details: " . $stmt2->error;
                        }
                    }
                } else {
                    // Handle error in user insertion
                    echo "Error inserting user: " . $stmt1->error;
                }
                
                // Close statement
                $stmt1->close();
            }
        }
        
        // Close checker statement
        $checker->close();
    }
} else {
}
?>
