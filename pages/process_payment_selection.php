<?php
session_start();
require '../config/config.php';

// Check if the cart is empty
if (empty($_SESSION['cart'])) {
    $_SESSION['error'] = "Your cart is empty.";
    header("Location: ../pages/cart.php");
    exit();
}

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "Please log in to place an order.";
    header("Location: login.php");
    exit();
}

$totalPrice = 0;
$orderDetails = [];

// Calculate the total price and prepare order details
foreach ($_SESSION['cart'] as $item) {
    if (isset($item['id'])) {  // Ensure 'id' exists
        $totalPrice += $item['price'] * $item['quantity']; // Calculate total price
        $orderDetails[] = [
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'total' => $item['price'] * $item['quantity'],
        ];
    }
}

// Insert the order into the orders table
$stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, payment_method, order_date, status) 
                       VALUES (?, ?, ?, NOW(), ?)");
$stmt->execute([$_SESSION['user_id'], $totalPrice, $_POST['payment_method'], 'Pending']);

// Get the order ID (the last inserted ID)
$orderId = $pdo->lastInsertId();

// Insert order details into the order_details table
foreach ($orderDetails as $detail) {
    $stmtDetail = $pdo->prepare("INSERT INTO order_details (order_id, product_id, quantity, status, created_at) 
                                 VALUES (?, ?, ?, ?, NOW())");
    $stmtDetail->execute([
        $orderId,
        $detail['product_id'],
        $detail['quantity'],
        'Pending', // Status can be 'Pending' initially
    ]);
}

// Clear the cart after the order is placed
unset($_SESSION['cart']);

// Redirect based on payment method
if ($_POST['payment_method'] == 'cod') {
    // For COD, redirect to success page
    header("Location: cod_success.php?orderId=" . $orderId);
} else {
    // For Razorpay, redirect to the payment page
    header("Location: razorpay_payment.php?orderId=" . $orderId . "&totalPrice=" . $totalPrice);
}

exit();
?>