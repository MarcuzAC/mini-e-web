<!DOCTYPE html>
<html>
<head>
    <title>navigation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add custom styling to the navigation bar */
        .navbar {
            background-color: #2c3e50; /* Set your desired color here */
            min-height: 50px; /* Set the desired minimum height of the navbar */
        }

        .navbar .nav-link {
            color: #fff;
        }

        .navbar .nav-link:hover {
            background-color: #333;
        }

        /* Add styling for the background image */
        .container {
            background-image: url('background.jpg'); /* Replace 'background.jpg' with the actual image filename and extension */
            background-repeat: no-repeat;
            background-size: cover;
            padding: 2px;
        }
    </style>
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    // Check if the user is logged in
    $isLoggedIn = true; // Replace with your login check logic
    ?>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Shopify</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" data-toggle="dropdown">Shop</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="includes/categories/clothing.php">Clothing</a>
                        <a class="dropdown-item" href="includes/categories/electronics.php">Electronics</a>
                        <a class="dropdown-item" href="includes/categories/homedecor.php">Home Decor</a>
                        <a class="dropdown-item" href="includes/categories/groceries.php">Groceries</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <?php if ($isLoggedIn) { ?>
                    <li class="nav-item"><a class="nav-link" href="my_account.php">My Account</a></li>
                <?php } ?>
                <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="includes/shipping.php">Shipping</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <!-- Add your page content here -->
        <h1>Welcome to Shopify</h1>
        <p>You will find a wide range of products at affordable prices.</p>
        <p>Visit Us On Fridays for 10% Discounts.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to redirect to the pages in the categories folder
        function redirectToClothing() {
            window.location.href = "categories/clothing.php";
        }

        function redirectToElectronics() {
            window.location.href = "categories/electronics.php";
        }

        function redirectToHomeDecor() {
            window.location.href = "categories/homedecor.php";
        }

        function redirectToGroceries() {
            window.location.href = "categories/groceries.php";
        }
    </script>
</body>
</html>
