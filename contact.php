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
            // Redirect to the thank you page
            header("Location: thankyou.html");
            exit(); // Exit to ensure no further code is executed
        } else {
            // Handle email sending failure (e.g., display an error message)
            echo "Message could not be sent. Please try again later.";
        }
    } else {
        // Handle the case where email is empty or invalid
        echo "Email is required and must be valid.";
    }
}else {
    echo "Form submitted successfully.";
}
?>
