<?php
session_start();
require '../config/config.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    
    if ($stmt->execute([$product_id])) {
        $_SESSION['message'] = "Product deleted successfully.";
        $_SESSION['msg_type'] = "success";  // For success alert styling
    } else {
        $_SESSION['message'] = "Failed to delete product.";
        $_SESSION['msg_type'] = "danger";   // For error alert styling
    }
    
    // Redirect back to delete_product.php
    header('Location: delete_product.php');
    exit();
} else {
    // If no ID is provided, redirect back to the product page with an error
    $_SESSION['message'] = "Invalid product ID.";
    $_SESSION['msg_type'] = "danger";
    header('Location: delete_product.php');
    exit();
}
?>
