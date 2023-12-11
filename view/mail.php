<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {
 
  $mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();                         // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';   // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                // Enable SMTP authentication
    $mail->Username   = 'mouhameddhia.shiri@esprit.tn'; // Your SMTP username
    $mail->Password   = 'dbjdlvkxgcxordwx'; // Your SMTP password
    $mail->SMTPSecure = 'tls';               // Enable explicit TLS encryption
    $mail->Port       = 587;                 // Adjust the port accordingly

    // Recipients
    $mail->setFrom($_POST["email"], $_POST["name"]);    // Sender Email and name
    $mail->addAddress('recipient@example.com');          // Add a recipient email
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // Reply to sender email

    // Content
    $mail->isHTML(true);               // Set email format to HTML
    $mail->Subject = $_POST["subject"]; // Email subject heading
    $mail->Body    = $_POST["message"]; // Email message

    try {
        // Success sent message alert
        $mail->send();
        echo "
        <script>
            alert('Message was sent successfully!');
            document.location.href = 'index.php';
        </script>";
    } catch (Exception $e) {
        echo "
        <script>
            alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
            document.location.href = 'index.php';
        </script>";
    }
}
?>
