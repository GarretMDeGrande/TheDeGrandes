<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Check if email is not empty (you should add more comprehensive validation)
    if (!empty($email)) {
        $to = "thedegrandes@gmail.com";
        $subject = "Mail From Website";
        $txt = "Name = $name\r\nEmail = $email\r\nMessage = $message";
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
        // Handle the case where email is empty (e.g., display an error message)
        echo "Email is required.";
    }
}
?>