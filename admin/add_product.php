<?php
// add_product.php
require_once 'functions.php';

// Initialize variables to store form input
$category = $name = $size = $color = $price = $image = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add"])) {
    // Collect the form data
    $category = $_POST["category"];
    $name = $_POST["name"];
    $size = $_POST["size"];
    $color = $_POST["color"];
    $price = $_POST["price"];

    // Handle the uploaded image
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = 'images/'; // Set the directory to store uploaded images
        $target_file = $target_dir . basename($_FILES['product_image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the uploaded file is an image
        $check = getimagesize($_FILES['product_image']['tmp_name']);
        if ($check !== false) {
            // Move the uploaded image to the target directory
            if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
                $image = $target_file;
            } else {
                $error = "Failed to upload the image.";
            }
        } else {
            $error = "Invalid image file.";
        }
    }

    // If there are no errors, add the product to the database
    if (empty($error) && addProduct($category, $name, $size, $color, $price, $image)) {
        // Product added successfully
        header("Location: index.php");
        exit();
    } else {
        // Failed to add the product
        $error = "Failed to add the product.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Add Product</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS style -->
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Bootstrap Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <!-- ... Navigation Links ... -->
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Add Product</h1>
        <!-- Display error message, if any -->
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Product Add Form -->
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Category:</label>
                <input type="text" class="form-control" name="category" value="<?php echo htmlspecialchars($category); ?>" required>
            </div>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
            <div class="form-group">
                <label>Size:</label>
                <input type="text" class="form-control" name="size" value="<?php echo htmlspecialchars($size); ?>" required>
            </div>
            <div class="form-group">
                <label>Color:</label>
                <input type="text" class="form-control" name="color" value="<?php echo htmlspecialchars($color); ?>" required>
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="number" class="form-control" name="price" value="<?php echo htmlspecialchars($price); ?>" required>
            </div>
            <div class="form-group">
                <label>Image:</label>
                <input type="file" class="form-control-file" name="product_image" required>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Add Product</button>
        </form>
        <!-- End of Product Add Form -->
    </div>

    <!-- Add Bootstrap JS and jQuery scripts (at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
