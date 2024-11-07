<?php
require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $pdo->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
    if ($stmt->execute([$name, $price, $product_id])) {
        header('Location: admin_panel.php?success=Product updated');
    } else {
        header('Location: admin_panel.php?error=Failed to update product');
    }
}
?>
