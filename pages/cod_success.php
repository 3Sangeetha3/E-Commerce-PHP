<?php
session_start();
if (isset($_SESSION['order_success'])) {
    $orderSuccessMessage = $_SESSION['order_success'];
    unset($_SESSION['order_success']); // Clear message after showing
} else {
    $orderSuccessMessage = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container my-5">
        <h2>Order Successful</h2>
        <?php if ($orderSuccessMessage): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($orderSuccessMessage); ?>
            </div>
        <?php endif; ?>
        <p>Thank you for your order. You can view your order details in <a href="my_orders.php">My Orders</a>.</p>
    </div>
</body>
</html>
