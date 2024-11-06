<!-- contact.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Koza</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body class="bg-[#F5EDE1]">
    <?php
    session_start();
    // Include the configuration file
    require_once '../config/config.php';
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <!-- Navbar -->
    <?php include '../components/navbar.php'; ?>

    <!-- Contact Us Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 my-5 animate__animated animate__slideInLeft">
                <h2 class="text-dark mt-5 mb-3">Contact Us</h2>

                <form action="../backend/process_contact.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" placeholder="Enter your name" class="form-control form-control-sm" id="name" name="name" required style="width: 75%;">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" placeholder="Enter your Email" class="form-control form-control-sm" id="email" name="email" required style="width: 75%;">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea placeholder="Enter your message" class="form-control form-control-sm" id="message" name="message" required style="width: 75%;"></textarea>
                    </div>
                    <button type="submit" class="btn text-light" style="background-color: #FF7F50;">Submit</button>
                </form>

                <!-- Display success or error message -->
                <?php if (isset($_SESSION['contact_success'])): ?>
                    <div class="alert alert-success mt-3">
                        <?php 
                        echo $_SESSION['contact_success'];
                        unset($_SESSION['contact_success']); // Clear the message after displaying
                        ?>
                    </div>
                <?php elseif (isset($_SESSION['contact_error'])): ?>
                    <div class="alert alert-danger mt-3">
                        <?php 
                        echo $_SESSION['contact_error'];
                        unset($_SESSION['contact_error']); // Clear the message after displaying
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-5">
                <img src="../assets/images/contact.svg" class="img-fluid animate__animated animate__slideInRight" alt="Contact Us">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../components/footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
