<?php
// process_signin.php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session at the very beginning of the script
session_start();

// Include the configuration file
require_once '../config/config.php';

// Check if the PDO variable is set
if (!isset($pdo)) {
    die("Database connection variable is not set.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the posted data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Check if user exists
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Save user data in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect to home page
            header("Location: ../index.php");
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        // Redirect to sign-up page if user does not exist
        header("Location: ../signUp.php");
        exit();
    }
} else {
    // Redirect to sign-in page if accessed directly
    header("Location: ../signIn.php");
    exit();
}
?>
