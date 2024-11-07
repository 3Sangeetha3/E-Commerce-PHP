<?php
session_start();
require '../config/config.php';

// Check if the cart is empty
if (empty($_SESSION['cart'])) {
    $_SESSION['error'] = "Your cart is empty.";
    header("Location: ../pages/cart.php");
    exit();
}

// Calculate the total price of items in the cart
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'] * $item['quantity']; // Calculate total price
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Payment Method</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-[#F5EDE1]">

<!-- Navbar -->
<?php include '../components/navbar.php'; ?>

<!-- Payment Method Selection Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 my-5 animate__animated animate__slideInLeft">
            <h2 class="text-dark mt-5 mb-3" style="color: #FF7F50;">Choose Your Payment Method</h2>

            <!-- Payment Method Selection Form -->
            <form id="paymentForm" action="" method="POST">
                <div class="form-check m-4">
                    <input class="form-check-input" type="radio" name="payment_method" value="razorpay" id="razorpay" required>
                    <label class="form-check-label" for="razorpay">
                        Razorpay
                    </label>
                </div>
                <div class="form-check m-4">
                    <input class="form-check-input" type="radio" name="payment_method" value="cod" id="cod" required>
                    <label class="form-check-label" for="cod">
                        Cash on Delivery (COD)
                    </label>
                </div>

                <!-- Hidden Input for Total Price -->
                <input type="hidden" name="total_price" value="<?php echo $totalPrice; ?>">

                <!-- Proceed Button -->
                <button type="submit" class="btn text-light" style="background-color: #FF7F50;">Proceed</button>
            </form>

            <!-- Display error message -->
            <?php if (isset($_SESSION['error'])): ?>
                <div id="flash-error" class="alert alert-danger mt-3">
                    <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-6 p-0">
            <img src="../assets/images/payment-method.svg" class="img-fluid animate__animated animate__slideInRight" alt="Payment Method">
        </div>
    </div>
</div>

<!-- Modal for Order Success -->
<div class="modal fade" id="orderPlacedModal" tabindex="-1" aria-labelledby="orderPlacedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderPlacedModalLabel">Order Placed Successfully!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your order has been successfully placed. You will receive a confirmation shortly.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../components/footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // JavaScript to handle form submission
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();

       
        var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

    
        var myModal = new bootstrap.Modal(document.getElementById('orderPlacedModal'));
        myModal.show();

        setTimeout(function() {
            window.location.href = '../pages/my_orders.php';
        }, 10000);
    });
</script>

</body>
</html>
