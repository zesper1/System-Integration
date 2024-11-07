<?php

include "../../connection/db_conn.php";
session_start();
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../public/assets/phpmailer/src/Exception.php';
require '../../../public/assets/phpmailer/src/PHPMailer.php';
require '../../../public/assets/phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && isset($_POST['appeal_id'])) {
        // Get action and appeal ID from POST
        $action = $_POST['action'];
        $appealId = $_POST['appeal_id'];

        // Determine the status based on the action
        if ($action === 'Reject' || $action === 'Resolve') {
            $status = ($action === 'Reject') ? 'Rejected' : 'Resolved';
            
            // Prepare the query to update the appeal status
            $query = "UPDATE studentappeals SET status = ? WHERE appeal_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $status, $appealId);

            if ($stmt->execute()) {
                // Send an email notification to the user
                try {
                    // Create an instance of PHPMailer
                    $mail = new PHPMailer(true);
                    
                    // SMTP configuration
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'sdaonud@gmail.com'; // Your email
                    $mail->Password = 'zuuhweocexklqmur'; // Use App Password if 2FA is enabled
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;

                    // Recipients
                    $mail->setFrom('sdaonud@gmail.com', 'SDAO');
                    // Assuming the appeal details include the user's email
                    $mail->addAddress($_POST['email']); // Recipient's email (you can modify as needed)

                    // Email content
                    $mail->isHTML(true);
                    $mail->Subject = 'Reply to Your Appeal';
                    $mail->Body    = nl2br($_POST['replyMessage']); // You can adjust this to suit your email message
                    
                    // Send the email
                    if ($mail->send()) {
                        echo "Appeal has been {$status} and the reply has been sent via email.";
                    } else {
                        echo "Error sending email: " . $mail->ErrorInfo;
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}\n";
                    error_log("Mailer Error: {$mail->ErrorInfo}"); // Log the error
                }
            } else {
                echo "Error updating appeal status.";
            }
        } else {
            echo "Invalid action.";
        }
    } else {
        echo "Required parameters are missing.";
    }
} else {
    echo "Invalid request method.";
}
?>
