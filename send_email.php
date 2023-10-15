<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // This loads the Composer-generated autoloader

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $paragraph = $_POST["paragraph"]; // New input field for a paragraph

    $mail = new PHPMailer;

    // Your email configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'basedharsh@gmail.com'; // Your Gmail email address
    $mail->Password = 'mtkq cxld zvpb abpr'; // Your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient
    $mail->setFrom('basedharsh@gmail.com', $name); // Use the provided name as the sender's name
    $mail->addAddress($email, $name); // Send the email to the user's provided email

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Subject';
    $mail->Body = 'Hello ' . $name . ',<br>Your Number: ' . $number . '<br>' . $paragraph; // Include the paragraph in the email

    if ($mail->send()) {
        echo 'Email sent successfully';
    } else {
        echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>


