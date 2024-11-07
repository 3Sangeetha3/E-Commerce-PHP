<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container my-5">
        <h2>Manage Orders</h2>
        <ul class="list-group">
            <?php
            require '../config/config.php';
            $stmt = $pdo->query("SELECT orders.id, products.name, orders.quantity, orders.status 
                                 FROM orders 
                                 JOIN products ON orders.product_id = products.id 
                                 WHERE orders.status = 'pending'");
            while ($order = $stmt->fetch()) {
                echo "
                    <li class='list-group-item d-flex justify-content-between align-items-center'>
                        {$order['name']} - Quantity: {$order['quantity']} 
                        <form action='process_confirm_order.php' method='POST' class='d-inline'>
                            <input type='hidden' name='order_id' value='{$order['id']}'>
                            <button type='submit' class='btn btn-success btn-sm'>Confirm</button>
                        </form>
                    </li>";
            }
            ?>
        </ul>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>
