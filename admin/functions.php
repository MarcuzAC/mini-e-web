<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// functions.php
require_once '../includes/config.php';

// Function to add a new product to the database
function addProduct($category, $name, $size, $color, $price, $image)
{
    global $conn;

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO products (category, product_name, size, color, price, image_url) VALUES (?, ?, ?, ?, ?, ?)";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssds", $category, $name, $size, $color, $price, $image);

    // Execute the prepared statement and check if successful
    if ($stmt->execute()) {
        $stmt->close(); // Close the statement
        return true;
    } else {
        $error_message = $stmt->error; // Get the error message
        $stmt->close(); // Close the statement
        return false;
    }
}

// Function to delete a product from the database
function deleteProduct($product_id)
{
    global $conn;

    // Prepare the SQL statement with placeholders
    $sql = "DELETE FROM products WHERE id = ?";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    // Execute the prepared statement and check if successful
    if ($stmt->execute()) {
        $stmt->close(); // Close the statement
        return true;
    } else {
        $error_message = $stmt->error; // Get the error message
        $stmt->close(); // Close the statement
        return false;
    }
}

// Function to update a product in the database
function updateProduct($product_id, $category, $name, $size, $color, $price, $image)
{
    global $conn;

    // Prepare the SQL statement with placeholders
    $sql = "UPDATE products SET category = ?, product_name = ?, size = ?, color = ?, price = ?, image_url = ? WHERE id = ?";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdsi", $category, $name, $size, $color, $price, $image, $product_id);

    // Execute the prepared statement and check if successful
    if ($stmt->execute()) {
        return true;
    } else {
        // Add debug information to identify the issue
        echo "Debug: Update failed. Error message: " . $stmt->error;
        return false;
    }
}


// Function to get product details by ID
function getProductById($product_id)
{
    global $conn;

    // Prepare the SQL statement with placeholders
    $sql = "SELECT * FROM products WHERE id = ?";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Fetch the product details as an associative array
    $product = $result->fetch_assoc();

    // Close the statement
    $stmt->close();

    return $product;
}
?>
