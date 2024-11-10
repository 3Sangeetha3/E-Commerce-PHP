<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
    body {
        background-color: white;
    }
    h2 {
        color: #FF7F50; /* Accent Color */
        font-size: 2rem;
    }
    .list-group-item {
        background-color: #BFBABA; /* Light Gray */
        color: #332D2D; /* Dark Text Color */
        font-size: 1.1rem; /* Increased font size */
        padding: 15px 20px;
        border: none;
        transition: background-color 0.3s ease;
        margin-bottom: 15px; /* Space between items */
        border-radius: 8px; /* Rounded corners for card effect */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Drop shadow */
    }
    .list-group-item a {
        text-decoration: none;
        color: inherit;
        display: block;
    }
    .list-group-item:hover {
        background-color: #757A5A; /* Hover color */
        color: #F5EDE1; /* Light text for contrast on hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Stronger shadow on hover */
    }
    .image-section img {
        width: 100%;
        border-radius: 8px;
    }
</style>
</head>
<body>
<?php include '../components/navbar.php'; ?>

<div class="container my-5">
    <h2 class="text-center animate__animated animate__fadeInDown">Admin Panel</h2>
    <div class="row align-items-center">
        <!-- List Group Section -->
        <div class="col-md-6 mt-5 animate__animated animate__slideInLeft">
            <ul class="list-group mt-5">
                <li class="list-group-item"><a href="../admin/add_product.php">➕ Add New Product</a></li>
                <li class="list-group-item"><a href="../admin/update_product.php">✏️ Update Product</a></li>
                <li class="list-group-item"><a href="../admin/delete_product.php">❌ Delete Product</a></li>
                <li class="list-group-item"><a href="../admin/manage_orders.php">📦 Manage Orders</a></li>
            </ul>
        </div>
        
        <!-- Image Section -->
        <div class="col-md-6 animate__animated animate__slideInRight">
            <div class="image-section">
                <img src="../assets/images/admin-panel.svg" alt="Admin Panel" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<?php include '../components/footer.php'; ?>
<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
