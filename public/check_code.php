<?php
include "../src/connection/db_conn.php";
if (isset($_POST['email']) && isset($_POST['code'])) {
    $email = $_POST['email'];
    $code = $_POST['code'];

    // Check code in the database
    $stmt = $conn->prepare("SELECT * FROM email_verifications WHERE email = ? AND code = ?");
    $stmt->bind_param("si", $email, $code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Code is correct, email is verified
        echo "
        <script>
        alert('Email Verified Successfully!');
        window.location.href = 'createAccount.php?email=$email';
        </script>
        ";
        
        // Optional: Remove the code after verification
        $stmt = $conn->prepare("DELETE FROM email_verifications WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
    } else {
        echo "Invalid verification code.";
    }
}
?>
