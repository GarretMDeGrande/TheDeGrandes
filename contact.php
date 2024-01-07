<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

mail('thedegrandes@gmail.com', 'Test Subject', 'Test Message');

echo "Script is running."; // Add this for basic debugging

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Check if email is not empty and is valid
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "thedegrandes@gmail.com";
        $subject = "Mail From Website";
        $txt = "First Name = $firstname\r\nLast Name = $lastname\r\nEmail = $email\r\nMessage = $message";
        $headers = "From: noreply@yoursite.com\r\n" .
            "CC: somebodyelse@example.com";

        // Send the email
       if (mail($to, $subject, $txt, $headers)) {
        echo "Mail sent successfully.<br>";
        header("Location: thankyou.html");
        exit();
    } else {
        echo "Error: Message could not be sent.<br>";
    }
} else {
    echo "Form submitted successfully.<br>";
}
?>
