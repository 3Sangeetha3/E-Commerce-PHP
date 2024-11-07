<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- animate css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top animate__animated animate__slideInDown">
  <div class="container p-3">
    <a class="navbar-brand" href="#">Koza</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto d-flex gap-3">
        <!-- Common Links -->
        <li class="nav-item">
          <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="/E-commerce/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($current_page == 'AboutUs.php') ? 'active' : ''; ?>" href="/E-commerce/pages/AboutUs.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>" href="/E-commerce/pages/contact.php">Contact Us</a>
        </li>

        <!-- Admin-Specific Links -->
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'add_product.php') ? 'active' : ''; ?>" href="/E-commerce/admin/add_product.php">Add Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'manage_users.php') ? 'active' : ''; ?>" href="/E-commerce/admin/manage_orders.php">Manage orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'admin_panel.php') ? 'active' : ''; ?>" href="/E-commerce/pages/admin_panel.php">Admin Panel</a>
          </li>
        <?php endif; ?>

        <!-- User-Specific Links -->
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user'): ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'orders.php') ? 'active' : ''; ?>" href="/E-commerce/pages/orders.php">My Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>" href="/E-commerce/pages/profile.php">Profile</a>
          </li>
        <?php endif; ?>

        <!-- Welcome and Logout Links -->
        <?php if (isset($_SESSION['user_name'])): ?>
          <li class="nav-item">
            <a class="nav-link text-warning" href="#">👋🏻 Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/E-commerce/pages/logout.php">
              <img src="/E-commerce/assets/images/logout.svg" alt="Logout" class="logout-icon" style="width: 32px; height: 32px;">
            </a>
          </li>
        <?php else: ?>
          <!-- Sign In and Sign Up Links -->
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'signIn.php') ? 'active' : ''; ?>" href="/E-commerce/pages/signIn.php">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'signUp.php') ? 'active' : ''; ?>" href="/E-commerce/pages/signUp.php">Sign Up</a>
          </li>
        <?php endif; ?>

        <!-- Cart Link -->
        <li class="nav-item">
          <a class="nav-link animate__animated animate__flip<?php echo ($current_page == 'cart.php') ? 'active' : ''; ?>" href="/E-commerce/pages/cart.php" id="cartLink">
            <img src="/E-commerce/assets/images/cart.svg" alt="Cart" class="cart-icon" style="width: 32px; height: 32px;">
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- JavaScript for animation -->
<script>
  function animateCartIcon() {
    const cartLink = document.getElementById('cartLink');
    cartLink.classList.remove('animate__flip');
    void cartLink.offsetWidth;
    cartLink.classList.add('animate__flip');
    setTimeout(() => {
      cartLink.classList.remove('animate__flip');
    }, 1000);
  }
  setInterval(animateCartIcon, 10000);
  animateCartIcon();
</script>
