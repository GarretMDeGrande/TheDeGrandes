<?php
// Example using PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    $mail->setFrom('noreply@yoursite.com');
    $mail->addAddress('thedegrandes@gmail.com');
    $mail->Subject = 'Mail From Website';
    $mail->Body = "firstname = $firstname\r\nlastname = $lastname\r\nemail = $email\r\nmessage = $message";
    $mail->send();
    echo 'Mail sent successfully.<br>';
    header("Location: thankyou.html");
    exit();
} catch (Exception $e) {
    echo "Error: Message could not be sent. Mailer Error: {$mail->ErrorInfo}<br>";
}
if (mail($to, $subject, $txt, $headers)) {
    echo "Mail accepted for delivery.<br>";
} else {
    echo "Error: Message could not be sent.<br>";
}
?>
