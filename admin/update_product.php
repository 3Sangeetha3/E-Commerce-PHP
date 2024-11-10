<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <?php
    session_start();
    include '../components/navbar.php';
    ?>

    <div class="container my-5">
        <h2 style="color: #FF7F50;" class="mt-5 mb-3">Update Product</h2>

        <!-- Display session message if available -->
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']; ?> alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['msg_type']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <form action="process_update_product.php" method="POST" onsubmit="return confirmUpdate()">
            <div class="mb-3">
                <label for="product_id" class="form-label">Select Product</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <?php
                    require '../config/config.php';
                    $stmt = $pdo->query("SELECT id, name FROM products");
                    while ($product = $stmt->fetch()) {
                        echo "<option value='{$product['id']}'>{$product['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">New Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">New Price</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color:#FF7F50; border:none">Update Product</button>
        </form>

    </div>

    <?php include '../components/footer.php'; ?>

    <!-- JavaScript for confirmation -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Confirmation before form submission
        function confirmUpdate() {
            return confirm("Are you sure you want to update this product?");
        }
    </script>
</body>

</html>
