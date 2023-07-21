<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the database connection
require_once 'config.php';

// Function to fetch user's name and order history from the database
function getUserInfo($userId, $conn) {
    $userInfo = array();

    // Fetch user's name
    $nameSql = "SELECT name FROM users WHERE user_id = $userId";
    $nameResult = $conn->query($nameSql);

    if ($nameResult && $nameResult->num_rows > 0) {
        $userInfo['name'] = $nameResult->fetch_assoc()['name'];
    } else {
        $userInfo['name'] = "Guest"; // Set a default name if user not found
    }

    // Fetch user's order history with product details
    $orderSql = "SELECT order_id, order_date, quantity, product_name, price, image_url
                 FROM orders
                 JOIN products  ON product_id = product_id
                 WHERE user_id = $userId";

    $orderResult = $conn->query($orderSql);

    $orderHistory = array();
    if ($orderResult && $orderResult->num_rows > 0) {
        while ($row = $orderResult->fetch_assoc()) {
            $orderHistory[] = $row;
        }
    }

    $userInfo['orderHistory'] = $orderHistory;

    return $userInfo;
}


// Simulating user authentication. Replace this with actual authentication code.
$isLoggedIn = true;
$userInfo = array();

if ($isLoggedIn) {
    // Assuming you have a user ID for the currently logged-in user, replace '1' with the actual user ID
    $userId = 1;
    $userInfo = getUserInfo($userId, $conn);
}

// Navigation bar
function renderNavigationBar($isLoggedIn)
{
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Shopify</a>
                <ul class="navbar-nav ml-auto">';

    if ($isLoggedIn) {
        echo '<li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
              <li class="nav-item"><a class="nav-link" href="includes/shipping.php">Shipping</a></li>
              <li class="nav-item"><a class="nav-link" href="includes/logout.php">Logout</a></li>';
    } else {
        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
              <li class="nav-item"><a class="nav-link" href="shipping.php">Shipping</a></li>';
    }

    echo '  </ul>
          </div>
        </nav>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    // Render the navigation bar
    renderNavigationBar($isLoggedIn);
    ?>

    <div class="container mt-4">
        <?php if ($isLoggedIn) { ?>
            <h1>Welcome, <?php echo $userInfo['name']; ?>!</h1>
            <div>
                <h3>Order History</h3>
                <ul>
                    <?php foreach ($userInfo['orderHistory'] as $order) { ?>
                        <li>Order #<?php echo $order['order_id']; ?> - Status: <?php echo $order['status']; ?></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- Rest of your account-related HTML content -->
        <?php } else { ?>
            <h1>Please Log in to Access Your Account</h1>
            <!-- Add login form or link to the login page -->
        <?php } ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
