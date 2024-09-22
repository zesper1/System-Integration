<?php
include('connection.php');


if (isset($_POST['submit'])) {
    
    $username = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $role = mysqli_real_escape_string($conn, $role);

    
    $query = "SELECT * FROM user WHERE email = '$username' AND password = '$password' AND role = '$role'";

    
    $result = mysqli_query($conn, $query);

    
    if ($result && mysqli_num_rows($result) > 0) {
        
        $user = mysqli_fetch_assoc($result);

        
        $_SESSION["first_name"] = $user["first_name"];
        $_SESSION["role"] = $user["role"]; 

if ($user["role"] == "admin") {
    header("Location: ../../src/views/dashboardAdmin.php");
    exit(); 
} elseif ($user["role"] == "faculty") {
    header("Location: dashboardfaculty.php");
    exit(); 
} elseif ($user["role"] == "student") {
    header("Location: dashboardstudent.php");
    exit(); 
}
    } else {
        
        echo '<script>
                  alert("Login failed. Invalid username, password, or role!");
                  window.location.href = "login.php";
              </script>';
    }
} else {
    echo '<script>alert("Submit button not clicked!");</script>';
}
?>
