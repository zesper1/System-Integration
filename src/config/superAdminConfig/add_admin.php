<?php
include "../../connection/db_conn.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // user details
    $fName = $_POST["firstName"];
    $mName = $_POST["middleName"];
    $lName = $_POST["lastName"];

    // credentials
    $email = $_POST["adminEmail"];
    $pass = $_POST["adminPassword"];

    //role
    $role = $_POST["role"];
    echo $role;
}
?>