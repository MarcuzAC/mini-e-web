<!-- index.php (Admin Dashboard) -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Home</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS style -->
    <style>
        /* Custom CSS for the navigation bar */
        .navbar {
            min-height: 50px; /* Adjust the height as needed */
        }
    </style>
</head>
<body>
    <!-- Bootstrap Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="functionsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Functions
                        </a>
                        <div class="dropdown-menu" aria-labelledby="functionsDropdown">
                            <a class="dropdown-item" href="add_product.php">Add Product</a>
                            <a class="dropdown-item" href="update_product.php">Update Product</a>
                            <a class="dropdown-item" href="delete_product.php">Delete Product</a>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">Orders</a>
                    </li>
                    <!-- Add more links to other sections as needed -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Admin Dashboard</h1>
        <p>Perform all the admin duties here</p>

        <!-- Product Listing Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                
                // Include the config.php file
                require_once '../includes/config.php';

                // Fetch all products from the database
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                // Loop through the data and display products in rows
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                            <td>' . $row['id'] . '</td>
                            <td>' . $row['product_name'] . '</td>
                            <td>MKW' . $row['price'] . '</td>
                            <td>
                                <a href="delete_product.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Delete</a>
                                <a href="update_product.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm">Update</a>
                                <!-- Add more action buttons or links as needed -->
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No products found.</td></tr>';
                }

                // Close the database connection (optional, as the connection will be closed automatically at the end of the script)
                $conn->close();
                ?>
            </tbody>
        </table>
        <!-- End of Product Listing Table -->

    </div>

    <!-- Add Bootstrap JS and jQuery scripts (at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
