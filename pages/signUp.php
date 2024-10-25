<!-- pages/signup.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - E-commerce</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css"> 
</head>
<body class="bg-[#F5EDE1]">
<?php
// Include the configuration file
require_once '../config/config.php';
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Navbar -->
<?php include '../components/navbar.php'; ?>

<!-- Signup Section -->
<div class="container my-5">
    <h2>Signup</h2>
    <form action="../backend/process_signup.php" method="POST"> <!-- Adjust path -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Signup</button>
    </form>
    <hr>
    <h5>Or Signup with Google</h5>
    <a href="login_with_google.php" class="btn btn-danger">Sign in with Google</a>
</div>

<!-- Footer -->
<?php include '../components/footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
