<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container my-5">
        <h2 style="color: #FF7F50;" class="mt-5 mb-3">Update Product</h2>
        <form action="process_update_product.php" method="POST">
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
            <button type="submit" class="btn btn-primary" style="background-color:#FF7F50 ; border:none">Update Product</button>
        </form>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>
