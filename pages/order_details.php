<?php
session_start();
require '../config/config.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "Please log in to view your order details.";
    header("Location: signIn.php");
    exit();
}

// Validate and get the order ID from the query string
if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
    $_SESSION['error'] = "Invalid order ID.";
    header("Location: my_orders.php");
    exit();
}

$orderId = $_GET['order_id'];

// Retrieve the order details for the current user
$stmt = $pdo->prepare("
    SELECT o.id AS order_id, o.total_price, o.payment_method, o.order_date, o.status
    FROM orders o
    WHERE o.id = ? AND o.user_id = ?
");
$stmt->execute([$orderId, $_SESSION['user_id']]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    $_SESSION['error'] = "Order not found.";
    header("Location: my_orders.php");
    exit();
}

// Retrieve the items in the order
$stmtItems = $pdo->prepare("
    SELECT oi.product_id, oi.quantity, oi.price, p.name, p.image
    FROM order_items oi
    JOIN products p ON oi.product_id = p.id
    WHERE oi.order_id = ?
");
$stmtItems->execute([$orderId]);
$orderItems = $stmtItems->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            background-color: #332D2D;
            color: #F5EDE1;
        }
        .order-container {
            background-color: #332D2D;
            border-radius: 8px;
            padding: 20px;
            color: #F5EDE1;
        }
        .card {
            background-color: #F5EDE1;
            border: none;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title, .card-text {
            color: #332D2D;
        }
        .btn-secondary {
            background-color: #FF7F50;
            border: none;
            color: #F5EDE1;
        }
        .btn-secondary:hover {
            background-color: #A14B2E;
        }
    </style>
</head>
<body>
    <?php include '../components/navbar.php'; ?>

    <div class="container my-5">
        <div class="order-container">
            <h2>Order Details - #<?php echo $order['order_id']; ?></h2>
            <p>Order Date: <?php echo date('d M Y, H:i', strtotime($order['order_date'])); ?></p>
            <p>Total Price: $<?php echo number_format($order['total_price'], 2); ?></p>
            <p>Payment Method: <?php echo ucfirst($order['payment_method']); ?></p>
            <p>Status: <?php echo htmlspecialchars($order['status']); ?></p>

            <h4 class="mt-4">Order Items:</h4>

            <?php if (!empty($orderItems)): ?>
                <div class="row">
                    <?php foreach ($orderItems as $item): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <img src="../uploads/<?php echo $item['image']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                                    <p class="card-text">Price: $<?php echo number_format($item['price'], 2); ?></p>
                                    <p class="card-text">Quantity: <?php echo $item['quantity']; ?></p>
                                    <p class="card-text">Total: $<?php echo number_format($item['price'] * $item['quantity'], 2); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="alert alert-warning">No items found for this order.</p>
            <?php endif; ?>

            <a href="my_orders.php" class="btn btn-secondary mt-3">Back to My Orders</a>
        </div>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>
