<?php
require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];

    $stmt = $pdo->prepare("UPDATE orders SET status = 'confirmed' WHERE id = ?");
    if ($stmt->execute([$order_id])) {
        header('Location: manage_orders.php?success=Order confirmed');
    } else {
        header('Location: manage_orders.php?error=Failed to confirm order');
    }
}
?>
