<!DOCTYPE html>
<html>
<head>
    <title>Shipping Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Shopify</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php
                    // Function to check if the user is logged in (you can place this in a separate PHP file for reusability)
                    function isLoggedIn()
                    {
                        // Replace this with your actual authentication logic
                        // For example, you might check if a user session is active or if a user is logged in with a cookie
                        return true; // Return true if the user is logged in; otherwise, return false
                    }

                    $isLoggedIn = isLoggedIn();

                    if ($isLoggedIn) {
                        echo '<li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                              <li class="nav-item"><a class="nav-link" href="shipping.php">Shipping</a></li>
                              <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                              <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                              <li class="nav-item"><a class="nav-link" href="shipping.php">Shipping</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Shipping Information</h1>
        <p>Welcome to our shipping page. Here, you can find information about our shipping policies and delivery options.</p>

        <h3>Domestic Shipping</h3>
        <p>We offer free standard shipping for all domestic orders over $50. For orders under $50, a flat shipping fee of $5 applies.</p>
        <p>Estimated delivery time for standard shipping is 3-5 business days.</p>

        <h3>Express Shipping</h3>
        <p>If you need your order quickly, we also offer express shipping at an additional cost. The express shipping fee is $10 for all orders.</p>
        <p>Estimated delivery time for express shipping is 1-2 business days.</p>

        <h3>International Shipping</h3>
        <p>We offer international shipping to select countries. Shipping rates and delivery times may vary depending on the destination.</p>
        <p>Please note that customs duties and taxes may apply for international orders, and customers are responsible for any applicable fees.</p>

        <h3>Order Tracking</h3>
        <p>Once your order is shipped, you will receive a shipping confirmation email with a tracking number. You can use this tracking number to monitor the status of your order.</p>

        <h3>Returns and Refunds</h3>
        <p>If you are not satisfied with your purchase, we accept returns within 30 days of delivery. Please review our <a href="returns.php">Returns Policy</a> for more information.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
