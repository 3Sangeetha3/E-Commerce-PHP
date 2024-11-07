<?php
require '../config/config.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    if ($stmt->execute([$product_id])) {
        header('Location: admin_panel.php?success=Product deleted');
    } else {
        header('Location: admin_panel.php?error=Failed to delete product');
    }
}
?>
