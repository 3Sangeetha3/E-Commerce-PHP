<?php
session_start();
require '../config/config.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);

    // Check if file was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $target_dir = "../uploads/";
        $target_file = $target_dir . $image_name;

        // Validate file type and size
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 2 * 1024 * 1024; // 2MB

        if (!in_array($_FILES['image']['type'], $allowed_types)) {
            $_SESSION['product_error'] = "Invalid file type. Only JPG, PNG, and GIF files are allowed.";
        } elseif ($_FILES['image']['size'] > $max_size) {
            $_SESSION['product_error'] = "File size exceeds the 2MB limit.";
        } else {
            // Ensure uploads directory exists
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true); // Create directory if it doesn't exist
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($image_tmp_name, $target_file)) {
                // Prepare and execute the database insert
                $stmt = $pdo->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
                if ($stmt->execute([$name, $description, $price, $image_name])) {
                    $_SESSION['product_success'] = "Product added successfully.";
                } else {
                    $_SESSION['product_error'] = "Failed to add product to the database.";
                }
            } else {
                $_SESSION['product_error'] = "Failed to move uploaded file. Please check permissions.";
            }
        }
    } else {
        // Get specific upload error message
        $upload_errors = [
            UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
            UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
            UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
            UPLOAD_ERR_NO_FILE => "No file was uploaded.",
            UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
            UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
            UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
        ];
        $error_code = $_FILES['image']['error'];
        $_SESSION['product_error'] = $upload_errors[$error_code] ?? "Unknown error during file upload.";
    }

    // Redirect back to the add product page with the message
    header("Location: ../admin/add_product.php");
    exit();
}
?>
