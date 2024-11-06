<!-- signIn.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Koza</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body class="bg-[#F5EDE1]">
<?php
// Include the configuration file
require_once '../config/config.php';
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Navbar -->
<?php include '../components/navbar.php'; ?>

<?php
session_start();
?>

<!-- Sign In Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 my-5 animate__animated animate__slideInLeft">
            <h2 class="text-dark mt-5 mb-3">Sign In</h2>

            <form action="../backend/process_signin.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" placeholder="Enter your Email" class="form-control form-control-sm" id="email" name="email" required style="width: 75%;">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" placeholder="Enter your password"class="form-control form-control-sm" id="password" name="password" required style="width: 75%;">
                </div>
                <button type="submit" class="btn text-light" style="background-color: #FF7F50;">Sign In</button>
            </form>
            <!-- Display error message -->
            <?php if (isset($_SESSION['error'])): ?>
                <div id="flash-error" class="alert alert-danger mt-3">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']); // Clear the error after displaying
                    ?>
                </div>
            <?php endif; ?>

            <p class="mt-3">Don't have an account? <a href="../pages/signUp.php">Sign Up</a></p>
        </div>
        <div class="col-md-6 p-0">
            <img src="../assets/images/signIn.svg" class="img-fluid animate__animated animate__slideInRight" alt="Sign-in">
        </div>
    </div>
</div>


<!-- Footer -->
<?php include '../components/footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
