<?php
// update_product.php
require_once 'functions.php';

$product = array(
    'id' => '',
    'category_name' => '',
    'name' => '',
    'size' => '',
    'color' => '',
    'price' => '',
    'image' => '',
);

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $product_id = $_GET["id"];

    // Get the product details from the database using getProductById function
    $product_data = getProductById($product_id);

    if (!$product_data) {
        die("Product not found.");
    }

    // Update the $product array with retrieved data
    $product['id'] = $product_data['id'];
    $product['category_name'] = $product_data['category'];
    $product['name'] = $product_data['product_name'];
    $product['size'] = $product_data['size'];
    $product['color'] = $product_data['color'];
    $product['price'] = $product_data['price'];
    $product['image'] = $product_data['image_url'];
    
    // Debug information
    var_dump($product_data);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    // Handle the form submission to update the product
    $product_id = $_POST["product_id"];
    $category = $_POST["category"];
    $name = $_POST["name"];
    $size = $_POST["size"];
    $color = $_POST["color"];
    $price = $_POST["price"];
    $image = $_POST["image"];
    
    // Debug information
    echo "Debug: price received - ".$price;

    if (updateProduct($product_id, $category, $name, $size, $color, $price, $image)) {
        // Product updated successfully
        header("Location: index.php");
        exit();
    } else {
        // Failed to update the product
        die("Failed to update the product.");
    }
} else {
    // Invalid request
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Update Product</title>
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
            <a class="navbar-brand" href="index.php">Admin Dashboard</a>
            <!-- ... Navigation Links ... -->
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Update Product</h1>
        <form method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <div class="form-group">
                <label>Category:</label>
                <input type="text" class="form-control" name="category" value="<?php echo $product['category_name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $product['name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Size:</label>
                <input type="text" class="form-control" name="size" value="<?php echo $product['size']; ?>" required>
            </div>
            <div class="form-group">
                <label>Color:</label>
                <input type="text" class="form-control" name="color" value="<?php echo $product['color']; ?>" required>
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="number" class="form-control" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="form-group">
                <label>Image:</label>
                <input type="text" class="form-control" name="image" value="<?php echo $product['image']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <!-- Add Bootstrap JS and jQuery scripts (at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
