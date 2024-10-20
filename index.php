<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body class="bg-[#F5EDE1]">
<?php
    // Include the configuration file
    require_once 'config/config.php';
    
    $current_page = basename($_SERVER['PHP_SELF']);
?>


<!-- Navbar -->
<?php include 'components/navbar.php'; ?>

<!-- Hero Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 text-dark">
            <h1>Welcome to Koza</h1>
            <p>Discover the finest leather products crafted with excellence.</p>
            <a href="#" class="btn text-light" style="background-color: #FF7F50;">Shop Now</a>
        </div>
        <div class="col-md-6">
            <img src="assets/images/image1.svg" class="img-fluid" alt="Leather Products">
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'components/footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
