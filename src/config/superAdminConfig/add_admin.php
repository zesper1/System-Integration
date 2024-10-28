<?php
include "../../connection/db_conn.php";
session_start();

if(isset($_POST["add_admin"])){
    // Credentials
    $email = $_POST["adminEmail"];
    $pass = $_POST["adminPassword"];
    $role = $_POST["role"];
    // User details
    $fName = $_POST["firstName"];
    $mName = $_POST["middleName"];
    $lName = $_POST["lastName"];

    // Insert into user table
    $insert = "INSERT INTO user (email, password, role_ID) VALUES (?, ?, ?);";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param("ssi", $email, $pass, $role);

    if ($stmt->execute()) {
        $userID = $conn->insert_id; // Get the newly inserted user ID

        // Insert into userdetails table
        $insert1 = "INSERT INTO userdetails VALUES (?, ?, ?, ?);";
        $stmt1 = $conn->prepare($insert1);
        $stmt1->bind_param("isss", $userID, $fName, $mName, $lName);

        if ($stmt1->execute()) {
            echo "
            <script>
                alert('Admin created successfully!');
                window.location.href = '../../views/superAdmin/addSAdmin.php';
            </script>
            ";
        } else {
            echo "<script>alert('Failed to insert into userdetails.');</script>";
        }
    } else {
        echo "<script>alert('Failed to insert into user table.');</script>";
    }
}
?>
