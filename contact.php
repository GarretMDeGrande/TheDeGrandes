<?php

// Get the form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

// Set up the email body
$body = "Name: $firstname $lastname\n";
$body .= "Phone Number: $phone\n";
$body .= "Email: $email\n";
$body .= "Message: $message\n";

// Send the email
$to = "thedegrandes@gmail.com";
$subject = "Contact Form Submission";
$headers = "From: $email";

mail($to, $subject, $body, $headers);

// Redirect to the thank you page
header('Location: thankyou.html');

?>
