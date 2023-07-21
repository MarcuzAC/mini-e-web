<!-- includes/categories/electronics.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Electronics</title>
    <!-- Your CSS and other code here -->
</head>
<body>
    <!-- Electronics details section -->
    <div class="container">
        <h1>Electronics</h1>
        <div class="row">

            <?php
            // Include the config.php file
            require_once '../config.php';

            // Fetch electronics items from the database
            $categoryName = 'Electronics'; // The category name for electronics
            $sql = "SELECT * FROM categories WHERE category_name = '$categoryName'";
            $result = $conn->query($sql);

            // Loop through the data and display electronics items
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $categoryId = $row['id'];

                // Now fetch products for the Electronics category
                $sqlProducts = "SELECT * FROM products WHERE category_id = '$categoryId'";
                $resultProducts = $conn->query($sqlProducts);

                if ($resultProducts->num_rows > 0) {
                    while ($rowProduct = $resultProducts->fetch_assoc()) {
                        echo '
                        <div class="col-md-4">
                            <div class="electronics-item">
                                <img src="' . $rowProduct['image_url'] . '" alt="' . $rowProduct['product_name'] . '">
                                <div class="details">
                                    <p class="name">' . $rowProduct['product_name'] . '</p>
                                    <p class="price">$' . $rowProduct['price'] . '</p>
                                    <!-- Add other details specific to electronics -->
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "No electronics items found.";
                }
            } else {
                echo "Category 'Electronics' not found.";
            }

            // Close the database connection (optional, as the connection will be closed automatically at the end of the script)
            $conn->close();
            ?>

        </div>
    </div>

    <!-- Your JavaScript and other code here -->
</body>
</html>
