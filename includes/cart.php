<?php
// cart.php
session_start();

// Sample products added to the cart (you can get this from your database)
$productsInCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Function to calculate the total price of products in the cart
function calculateTotalPrice($products)
{
    $totalPrice = 0;
    foreach ($products as $product) {
        $totalPrice += $product['price'] * $product['quantity'];
    }
    return $totalPrice;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Your Cart</h1>
        <?php if (count($productsInCart) > 0) { ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productsInCart as $product) { ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td>$<?php echo number_format($product['price'] * $product['quantity'], 2); ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total:</strong></td>
                        <td>$<?php echo number_format(calculateTotalPrice($productsInCart), 2); ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
            <a href="clear_cart.php" class="btn btn-danger">Clear Cart</a>
        <?php } else { ?>
            <p>Your cart is empty.</p>
        <?php } ?>
        <a href="navigation.php" class="btn btn-secondary">Continue Shopping</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
