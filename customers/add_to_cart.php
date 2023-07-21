<!-- includes/categories/cart.php -->
<?php
// Start the session to access the cart
session_start();

// Check if the "Add to Cart" button was clicked
if (isset($_POST['add_to_cart'])) {
    // ... (same code as before)
}

// Handle removing an item from the cart
if (isset($_POST['remove_item'])) {
    // ... (same code as before)
}

// Handle updating the quantity of an item in the cart
if (isset($_POST['update_quantity'])) {
    // ... (same code as before)
}

// Calculate the total amount due
$total_amount = 0;
if (isset($_SESSION['cart'])) {
    // ... (same code as before)
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart - Ecommerce Website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Your CSS and other code here -->
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Shopify</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="includes/categories" id="categoriesDropdown" data-toggle="dropdown">Shop</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="clothing.php">Clothing</a>
                        <a class="dropdown-item" href="electronics.php">Electronics</a>
                        <a class="dropdown-item" href="homedecor.php">Home Decor</a>
                        <a class="dropdown-item" href="groceries.php">Groceries</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Cart</a></li>
                <!-- Add other navigation links here -->
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Shopping Cart</h1>
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
            <!-- Cart items table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $key => $item) { ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td>$<?php echo $item['price']; ?></td>
                            <td>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="item_key" value="<?php echo $key; ?>">
                                    <input type="number" name="new_quantity" value="<?php echo $item['quantity']; ?>" min="1">
                                    <button type="submit" name="update_quantity" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                            <td>$<?php echo $item['price'] * $item['quantity']; ?></td>
                            <td>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="item_key" value="<?php echo $key; ?>">
                                    <button type="submit" name="remove_item" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p>Total Amount Due: $<?php echo $total_amount; ?></p>
        <?php } else { ?>
            <p>Your cart is empty.</p>
        <?php } ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your JavaScript and other code here -->
</body>
</html>
