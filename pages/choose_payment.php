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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container my-5">
        <h2>Choose Your Payment Method</h2>
        <!-- Payment Method Selection Form -->
        <form action="process_payment_selection.php" method="POST">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" value="razorpay" id="razorpay" required>
                <label class="form-check-label" for="razorpay">
                    Razorpay
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" value="cod" id="cod" required>
                <label class="form-check-label" for="cod">
                    Cash on Delivery (COD)
                </label>
            </div>
            <!-- Hidden Input for Total Price -->
            <input type="hidden" name="total_price" value="<?php echo $totalPrice; ?>">
            <button type="submit" class="btn btn-primary mt-3">Proceed</button>
        </form>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>