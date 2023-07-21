<!-- includes/categories/homedecor.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Home Decor - Ecommerce Website</title>
    <!-- Your CSS and other code here -->
</head>
<body>
    <!-- Home Decor details section -->
    <div class="container">
        <h1>Home Decor</h1>
        <div class="row">

            <?php
            // Include the config.php file
            require_once '../config.php';

            // Fetch home decor items from the database
            $sql = "SELECT * FROM homedecor_items";
            $result = $conn->query($sql);

            // Loop through the data and display home decor items
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-4">
                        <div class="homedecor-item">
                            <img src="' . $row['image'] . '" alt="' . $row['name'] . '">
                            <div class="details">
                                <p class="name">' . $row['name'] . '</p>
                                <p class="price">$' . $row['price'] . '</p>
                                <!-- Add other details specific to home decor -->
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "No home decor items found.";
            }

            // Close the database connection (optional, as the connection will be closed automatically at the end of the script)
            $conn->close();
            ?>

        </div>
    </div>

    <!-- Your JavaScript and other code here -->
</body>
</html>
