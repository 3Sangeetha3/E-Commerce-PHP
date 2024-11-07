<?php
require '../config/config.php'; // This path remains the same

// Start session at the very beginning of the script
session_start();

// Include the configuration file
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Initialize an error array to store multiple error messages
    $errors = [];

    // Check if all fields are filled
    if (empty($name) || empty($email) || empty($password)) {
        $errors[] = "All fields are required.";
    }

    // Check if password length is at least 6 characters
    if (strlen($_POST['password']) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }    

    // Check if the email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $errors[] = "An account with this email already exists. Please use a different email.";
    }

    if (!empty($errors)) {
        $_SESSION['error'] = implode("<br>", $errors);
        header("Location: ../pages/signUp.php");
        exit();
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $default_role = 'user';

        // Insert the user into the database
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $hashed_password])) {
            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_role'] = $default_role;
            $_SESSION['success'] = "Signup successful! Welcome to koza.";
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['error'] = "Error: Could not register user.";
            header("Location: ../pages/signUp.php");
            exit();
        }
    }
}
?>
