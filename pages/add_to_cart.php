<?php
session_start();
require '../config/config.php';

// Check if the product ID is set in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Get the product details from the database
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Initialize the cart if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the product is already in the cart
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += 1;
        } else {
            // Add product to cart with quantity 1
            $_SESSION['cart'][$productId] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1
            ];
        }

        // Redirect to the cart page
        header("Location: cart.php");
        exit();
    } else {
        $_SESSION['error'] = "Product not found.";
        header("Location: ../pages/products.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid product ID.";
    header("Location: ../pages/products.php");
    exit();
}
?>