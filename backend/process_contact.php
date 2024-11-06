<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/config.php';

// Check if the PDO connection is set
if (!isset($pdo)) {
    die("Database connection variable is not set.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validation
    if (empty($name) || empty($email) || empty($message)) {
        $_SESSION['contact_error'] = "All fields are required.";
        header("Location: ../pages/contact.php");
        exit();
    }

    // Save to database using PDO
    $sql = "INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    // Execute and handle success or error
    if ($stmt->execute()) {
        $_SESSION['contact_success'] = "Thank you! Your message has been sent.";
    } else {
        $_SESSION['contact_error'] = "An error occurred. Please try again.";
    }

    // Redirect back to the contact page
    header("Location: ../pages/contact.php");
    exit();
}
?>
