<?php
session_start(); // Start the session

// Check if the name is set in the session
if (isset($_SESSION["rsvp_name"])) {
    $name = $_SESSION["rsvp_name"];
    echo "Thank you, $name, for RSVPing!";
} else {
    echo "No RSVP name found.";
}
?>