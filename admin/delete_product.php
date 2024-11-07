<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
    <?php session_start(); ?>
    <?php include '../components/navbar.php'; ?>

    <div class="container my-5">
        <h2 style="color: #FF7F50;" class="mt-5 mb-3">Delete Product</h2>
        <ul class="list-group">
            <?php
            require '../config/config.php';
            $stmt = $pdo->query("SELECT id, name FROM products");
            while ($product = $stmt->fetch()) {
                echo "
                    <li class='list-group-item d-flex justify-content-between align-items-center'>
                        {$product['name']}
                        <a href='process_delete_product.php?id={$product['id']}' class='btn btn-danger btn-sm'>Delete</a>
                    </li>";
            }
            ?>
        </ul>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>
