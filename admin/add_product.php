<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Koza</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <?php session_start(); ?>
    <?php include '../components/navbar.php'; ?>

    <!-- Display success or error message -->
    <?php if (isset($_SESSION['product_success'])): ?>
        <div class="alert alert-success mt-3 animate__animated animate__fadeIn">
            <?php
            echo $_SESSION['product_success'];
            unset($_SESSION['product_success']);
            ?>
        </div>
    <?php elseif (isset($_SESSION['product_error'])): ?>
        <div class="alert alert-danger mt-3 animate__animated animate__fadeIn">
            <?php
            echo $_SESSION['product_error'];
            unset($_SESSION['product_error']);
            ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <!-- Form Section with animation -->
            <div class="col-md-6 my-5 animate__animated animate__slideInLeft">
                <h2 style="color: #FF7F50;" class="mt-5 mb-3">Add New Product</h2>
                <form action="process_add_product.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" required style="width: 75%;">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control form-control-sm" id="description" name="description" required style="width: 75%;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control form-control-sm" id="price" name="price" required style="width: 75%;">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control form-control-sm" id="image" name="image" required style="width: 75%;">
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:#FF7F50 ; border:none">Add Product</button>
                </form>
            </div>
            <!-- Image Section with animation -->
            <div class="col-md-6 p-0">
                <img src="../assets/images/image2.svg" id="flippingImage" class="img-fluid animate__animated" alt="Add Product">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../components/footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript to flip images smoothly every 5 seconds
        const images = [
            "../assets/images/image2.svg",
            "../assets/images/image3.svg"
        ];
        
        let currentIndex = 0;
        const flippingImage = document.getElementById('flippingImage');

        setInterval(() => {
            // Add flip-out animation
            flippingImage.classList.remove('animate__flipInY');
            flippingImage.classList.add('animate__flipOutY');

            setTimeout(() => {
                // Change image source when the flip-out animation completes
                currentIndex = (currentIndex + 1) % images.length;
                flippingImage.src = images[currentIndex];

                // Add flip-in animation
                flippingImage.classList.remove('animate__flipOutY');
                flippingImage.classList.add('animate__flipInY');
            }, 500); // Sync with flipOutY animation duration
        }, 5000); // Flip every 5 seconds
    </script>
</body>

</html>
