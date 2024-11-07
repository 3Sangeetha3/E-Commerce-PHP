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
    <!-- animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-[#F5EDE1]">
    <?php
    session_start();
    // Include the configuration file
    require_once 'config/config.php';
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>

    <!-- Hero Section -->
    <div class="container my-4 py-4">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 text-center text-md-start text-dark">
                <h1>Welcome to Koza</h1>
                <p>Discover the finest leather products crafted with excellence.</p>
                <a href="/E-commerce/pages/products.php" id="shopNowButton" class="btn text-light animate__animated animate__jello" style="background-color: #FF7F50;">Shop Now</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="assets/images/image1.svg" class="img-fluid animate__animated animate__bounceInDown" alt="Leather Products">
            </div>
        </div>
    </div>

    <!-- Featured Products Section -->
    <div class="container my-4 py-4">
        <h2 style="color: #FF7F50;" class="mt-5 mb-5">Featured Products</h2>
        
        <!-- First Row of Products -->
        <div class="row">
            <?php
            $stmt = $pdo->query("SELECT * FROM products LIMIT 3");
            while ($product = $stmt->fetch()) {
                echo "
                    <div class='col-md-4'>
                        <div class='card mb-4 p-4'>
                            <img src='uploads/{$product['image']}' class='card-img-top' alt='{$product['name']}'>
                            <div class='card-body'>
                                <h5 class='card-title' style='color:#A14B2E; font-weight: bold; font-size: 26px'>{$product['name']}</h5>
                                <p class='card-text'>\${$product['price']}</p>
                                <a href='pages/products.php' class='btn' style='background-color: #757A5A ; border:none; color: white'>View More</a>
                            </div>
                        </div>
                    </div>";
            }
            ?>
        </div>

        <!-- Second Row of Products -->
        <div class="row">
            <?php
            $stmt = $pdo->query("SELECT * FROM products LIMIT 3 OFFSET 3");
            while ($product = $stmt->fetch()) {
                echo "
                    <div class='col-md-4'>
                        <div class='card mb-4 p-4'>
                            <img src='uploads/{$product['image']}' class='card-img-top' alt='{$product['name']}'>
                            <div class='card-body'>
                                <h5 class='card-title' style='color:#A14B2E; font-weight: bold; font-size: 26px'>{$product['name']}</h5>
                                <p class='card-text'>\${$product['price']}</p>
                                <a href='pages/products.php' class='btn' style='background-color: #757A5A ; border:none; color: white'>View More</a>
                            </div>
                        </div>
                    </div>";
            }
            ?>
        </div>

        <!-- View More Products Link -->
        <div class="text-center my-4">
            <a href="pages/products.php" class="btn btn-lg text-light" style="background-color: #FF7F50;">View More Products</a>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript to animate the "Shop Now" button every 5 seconds
        function animateButton() {
            const button = document.getElementById('shopNowButton');

            button.classList.remove('animate__jello'); 
            void button.offsetWidth; 
            button.classList.add('animate__jello');

            setTimeout(() => {
                button.classList.remove('animate__jello');
            }, 1000);
        }

        setInterval(animateButton, 5000);

        animateButton();
    </script>
</body>

</html>
