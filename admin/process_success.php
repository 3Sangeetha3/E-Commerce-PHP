<?php
session_start();

// Clear the cart after successful payment
unset($_SESSION['cart']);

echo "<h2>Payment Successful! Thank you for your purchase.</h2>";
?>