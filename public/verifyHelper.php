<?php
include "../src/connection/db_conn.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/phpmailer/src/Exception.php';
require 'assets/phpmailer/src/PHPMailer.php';
require 'assets/phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Generate a random 6-digit verification code
    $verificationCode = rand(100000, 999999);

    // Check if email exists
    $query = "SELECT email FROM user WHERE email = ?";
    $check = $conn->prepare($query);
    $check->bind_param("s", $email);
    $check->execute();
    $checkRes = $check->get_result();
    if ($checkRes->num_rows > 0) {
        echo "
        <script>
            alert('Email already in use');
            window.location.href = 'emailVerification.php';
        </script>
        ";
    } else {
        // Insert email and code into the database
        $stmt = $conn->prepare("INSERT INTO email_verifications (email, code) VALUES (?, ?)");
        $stmt->bind_param("si", $email, $verificationCode);
        $stmt->execute();

        // Read the HTML template
        $message = file_get_contents('email_content.html');

        // Replace the placeholder with the actual verification code
        $message = str_replace('{{code}}', $verificationCode, $message);

        $subject = "Your Verification Code";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sdaonud@gmail.com'; // Your email
            $mail->Password = 'zuuhweocexklqmur'; // Use App Password if 2FA is enabled
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('sdaonud@gmail.com', 'SDAO');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            header("Location: verify_code.php?email=" . urlencode($email));
            exit;
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
