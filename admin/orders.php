<?php
// orders.php
require_once 'functions.php';

// Function to get orders by customer
function getOrdersByCustomer($customer_id)
{
    global $conn;

    // Use proper aliases for table names to avoid ambiguity
    $sql = "SELECT customers.order_id, customers.product_name, customers.quantity, customers.total_price, orders.order_date 
            FROM customers
            JOIN orders ON customers.order_id = orders.order_id
            WHERE customers.customer_id = $customer_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $orders = array();
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        return $orders;
    } else {
        return array();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Orders</title>
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
        <h1>Orders</h1>
        <?php
        // Assuming you have the customer ID available as $customer_id
        $customer_id = 1; // Replace this with the actual customer ID
        $orders = getOrdersByCustomer($customer_id);

        if (!empty($orders)) {
            foreach ($orders as $order) {
                echo '<p>Order ID: ' . $order['order_id'] . '</p>';
                echo '<p>Product Name: ' . $order['product_name'] . '</p>';
                echo '<p>Quantity: ' . $order['quantity'] . '</p>';
                echo '<p>Total Price: ' . $order['total_price'] . '</p>';
                echo '<p>Order Date: ' . $order['order_date'] . '</p>';
                echo '<hr>';
            }
        } else {
            echo '<p>No orders found for this customer.</p>';
        }
        ?>
    </div>

    <!-- Add Bootstrap JS and jQuery scripts (at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
