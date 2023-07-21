<!-- includes/categories/groceries.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Groceries - Ecommerce Website</title>
    <!-- Your CSS and other code here -->
</head>
<body>
    <!-- Groceries details section -->
    <div class="container">
        <h1>Groceries</h1>
        <div class="row">

            <?php
            // Include the config.php file
            require_once '../config.php';

            // Fetch groceries items from the database
            $sql = "SELECT * FROM groceries_items";
            $result = $conn->query($sql);

            // Loop through the data and display groceries items
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-4">
                        <div class="groceries-item">
                            <img src="' . $row['image'] . '" alt="' . $row['name'] . '">
                            <div class="details">
                                <p class="name">' . $row['name'] . '</p>
                                <p class="price">$' . $row['price'] . '</p>
                                <!-- Add other details specific to groceries -->
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "No groceries items found.";
            }

            // Close the database connection (optional, as the connection will be closed automatically at the end of the script)
            $conn->close();
            ?>

        </div>
    </div>

    <!-- Your JavaScript and other code here -->
</body>
</html>
