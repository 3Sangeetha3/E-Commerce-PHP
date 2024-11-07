<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
    <?php
    session_start();
    ?>
    <?php include '../components/navbar.php'; ?>

    <div class="container py-6 my-6">
        <h2 style="color: #FF7F50;"  class="mt-5 mb-3">Our Products</h2>
        <div class="row">
            <?php
            require '../config/config.php';
            $stmt = $pdo->query("SELECT * FROM products");
            while ($product = $stmt->fetch()) {
                echo "
                    <div class='col-md-4'>
                        <div class='card mb-4 p-4'>
                            <img src='../uploads/{$product['image']}' class='card-img-top' alt='{$product['name']}'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$product['name']}</h5>
                                <p class='card-text'>\${$product['price']}</p>
                                <a href='#' class='btn' style='background-color: #757A5A ; border:none; color: white'>Buy Now</a>
                            </div>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>
