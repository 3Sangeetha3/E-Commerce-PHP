<?php
session_start();
require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $pdo->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
    if ($stmt->execute([$name, $price, $product_id])) {
        $_SESSION['message'] = "Product updated successfully.";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to update product.";
        $_SESSION['msg_type'] = "danger";
    }
    
    // Correct redirect path
    header('Location: update_product.php');
    exit();
}
?>
