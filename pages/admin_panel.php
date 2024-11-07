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
    <!-- animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container my-5">
        <h2 class="text-center">Admin Panel</h2>

        <ul class="list-group mt-4">
            <li class="list-group-item"><a href="../admin/add_product.php">➕ Add New Product</a></li>
            <li class="list-group-item"><a href="../admin/update_product.php">✏️ Update Product</a></li>
            <li class="list-group-item"><a href="../admin/delete_product.php">❌ Delete Product</a></li>
            <li class="list-group-item"><a href="../admin/manage_orders.php">📦 Manage Orders</a></li>
        </ul>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>
