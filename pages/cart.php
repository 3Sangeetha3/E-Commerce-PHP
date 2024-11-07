<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container my-5">
        <h2 class="mb-4" style="color: #FF7F50;">Your Cart</h2>

        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalPrice = 0;
                        foreach ($_SESSION['cart'] as $id => $item): 
                            $itemTotal = $item['price'] * $item['quantity'];
                            $totalPrice += $itemTotal;
                        ?>
                            <tr>
                                <td><img src="../uploads/<?php echo htmlspecialchars($item['image']); ?>" width="50" alt="<?php echo htmlspecialchars($item['name']); ?>"></td>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td>$<?php echo number_format($item['price'], 2); ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td>$<?php echo number_format($itemTotal, 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <h4>Total Price: $<?php echo number_format($totalPrice, 2); ?></h4>
            </div>
            <a href="choose_payment.php" class="btn btn-success mt-3">Choose Payment Method</a>
        <?php else: ?>
            <p class="alert alert-warning">Your cart is empty.</p>
            <a href="/E-commerce/pages/products.php" class="btn mt-3" style="background-color: #FF7F50; border:none; color: white; padding: 10px">Go to Shop</a>
        <?php endif; ?>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>
