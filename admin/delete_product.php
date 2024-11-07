<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
<?php 
    session_start(); 
    include '../components/navbar.php'; 
?>

<div class="container my-5">
    <h2 style="color: #FF7F50;" class="mt-5 mb-3">Delete Product</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']; ?> alert-dismissible fade show" role="alert">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']); 
                unset($_SESSION['msg_type']); 
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <ul class="list-group">
        <?php
        require '../config/config.php';
        $stmt = $pdo->query("SELECT id, name FROM products");
        while ($product = $stmt->fetch()) {
            echo "
                <li class='list-group-item d-flex justify-content-between align-items-center'>
                    {$product['name']}
                    <a href='process_delete_product.php?id={$product['id']}' class='btn btn-danger btn-sm delete-btn'>Delete</a>
                </li>";
        }
        ?>
    </ul>
</div>

<?php include '../components/footer.php'; ?>

<!-- Bootstrap JS and Custom Script for Confirmation -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript to confirm deletion before proceeding
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevents the default action of the link
                
                const confirmation = confirm("Are you sure you want to delete this product?");
                
                if (confirmation) {
                    // Redirect to the href if the user confirms
                    window.location.href = this.href;
                }
            });
        });
    });
</script>
</body>
</html>
