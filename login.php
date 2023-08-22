<?php
// login.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the entered username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Define the expected admin username and password
    $expectedUsername = "pdkpadmin";
    $expectedPassword = "admin@pdkp";

    // Check if the entered credentials match the expected values
    if ($username === $expectedUsername && $password === $expectedPassword) {
        // Start the session and set a session variable to indicate the admin is logged in
        session_start();
        $_SESSION["admin"] = true;

        // Redirect the admin to the admin dashboard
        header("Location: adminDashboard.php");
        exit;
    } else {
        // Authentication failed, display an error message or redirect back to the login page with an error message
        // For example, you can use the following code to redirect back to the login page:
        echo '<script>alert("Wrong password. Please try again.");</script>';
    
        header("Location: main.php?error=1");

        exit;
    }
}
?>
