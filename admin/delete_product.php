<?php
// delete_product.php
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $product_id = $_GET["id"];
    if (deleteProduct($product_id)) {
        // Product deleted successfully
        header("Location: index.php");
        exit();
    } else {
        // Failed to delete the product
        die("Failed to delete the product.");
    }
} else {
    // Invalid request
    die("Invalid request.");
}
?>
