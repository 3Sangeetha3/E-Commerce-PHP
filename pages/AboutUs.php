<!-- signIn.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In - Koza</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- animate css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body class="bg-[#F5EDE1]">
  <?php
  // Include the configuration file
  require_once '../config/config.php';
  session_start();
  $current_page = basename($_SERVER['PHP_SELF']);
  ?>

  <!-- Navbar -->
  <?php include '../components/navbar.php'; ?>


  <!-- About Us Page -->
  <div class="container my-5">
    <div class="row d-flex align-items-center">
      <!-- Text Section (Left) -->
      <div class="col-md-6 ext-center text-md-start text-dark animate__animated animate__slideInLeft">
        <h1 class="text-4xl font-extrabold" style="color: #FF7F50;">About Us</h1>
        <p class="mt-4 text-lg text-gray-600">
          Welcome to our website! We are passionate about bringing the best products and services to you.
          Learn more about our mission, values, and team.
        </p>
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Section: Mission -->
          <div class="bg-white p-6 shadow-lg rounded-3">
            <h2 class="text-2xl font-semibold text-gray-900"></h2>
            <p class="mt-4 text-gray-700 p-4">
              The Koza isn't a shop, it's a dream. 
              It's a collaboration of creative minds. 
              We are still on a journey of discovery, fuelled by a love for Leather, travel and nature. 
              We are a small team of artisans, designers and dreamers who are passionate about creating beautiful, 
              timeless leather goods that tell a story.
              We believe in the power of craftsmanship and quality and we are committed to creating products that are made to last. We are inspired by the world around us and we are constantly seeking new ways to push the boundaries of design and innovation. We are proud to be a part of the leather community and we are excited to share our journey with you.
            </p>
          </div>
        </div>
      </div>

      <!-- Image Section (Right) -->
      <div class="col-md-6 text-center">
        <img src="../assets/images/aboutUs.svg" class="img-fluid animate__animated animate__bounceInRight" alt="Our Team">
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include '../components/footer.php'; ?>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>