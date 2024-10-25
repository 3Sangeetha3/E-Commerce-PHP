<?php
require '../config/config.php'; // This path remains the same

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "Email already exists. Please try another one.";
    } else {
        // Insert the user into the database
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $password])) {
            echo "Signup successful!";
            header("Location: ../index.php"); // Redirect to signin page
            exit();
        } else {
            echo "Error: Could not register user.";
        }
    }
}
?>
