<?php
session_start();
require '../config/config.php';

// Ensure the cart exists
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $_SESSION['error'] = "Your cart is empty. Please add items to your cart first.";
    header("Location: ../pages/index.php");
    exit();
}

// Ensure the payment method is selected
if (!isset($_POST['payment_method']) || empty($_POST['payment_method'])) {
    $_SESSION['error'] = "Please select a payment method.";
    header("Location: choose_payment.php");
    exit();
}

$paymentMethod = $_POST['payment_method'];
$totalPrice = 0;
$orderDetails = [];

foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
    $orderDetails[] = [
        'product_id' => $item['id'],
        'product_name' => $item['name'],
        'quantity' => $item['quantity'],
        'price' => $item['price'],
        'total' => $item['price'] * $item['quantity'],
    ];
}

// Debugging: Check the POST data and the payment method
error_log("Payment Method: " . $paymentMethod);
error_log("Total Price: " . $totalPrice);

// Try to insert the order into the database
try {
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, payment_method, order_date, status) VALUES (?, ?, ?, NOW(), ?)");
    $orderStatus = ($paymentMethod == 'cod') ? 'Pending' : 'Payment Pending'; // If COD, mark as Pending
    $stmt->execute([$_SESSION['user_id'], $totalPrice, $paymentMethod, $orderStatus]);

    // Get the inserted order ID
    $orderId = $pdo->lastInsertId();

    // Insert the order items into the order_items table
    foreach ($orderDetails as $item) {
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price, total) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$orderId, $item['product_id'], $item['quantity'], $item['price'], $item['total']]);
    }

    // Clear the cart after successful order placement
    unset($_SESSION['cart']);

    // Redirect based on payment method
    if ($paymentMethod == 'razorpay') {
        header("Location: razorpay_payment.php?order_id=" . $orderId);
    } else if ($paymentMethod == 'cod') {
        // Debugging: Check if redirection is happening
        error_log("Redirecting to COD Success Page");
        header("Location: cod_success.php?order_id=" . $orderId);
    }
} catch (Exception $e) {
    // Log error if any exception occurs
    error_log("Error processing payment: " . $e->getMessage());
    $_SESSION['error'] = "There was an error processing your order: " . $e->getMessage();
    header("Location: choose_payment.php");
    exit();
}