<!DOCTYPE html>
<html>
<head>
    <title>Clothing Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add custom styling for the clothing details */
        .clothing-item {
            margin: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            max-width: 300px;
        }

        .clothing-item img {
            width: 100%;
            height: auto;
        }

        .clothing-item .details {
            margin-top: 10px;
        }

        .clothing-item .price {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
        }

        .clothing-item .size,
        .clothing-item .color {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <!-- Clothing details section -->
    <div class="container">
        <h1>Clothing</h1>
        <div class="row">

            <?php
            // Require the config.php file
            require_once 'includes/config.php';

            // Fetch clothing items from the database
            $sql = "SELECT * FROM clothing";
            $result = $conn->query($sql);

            // Loop through the data and display clothing items
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-4">
                        <div class="clothing-item">
                            <img src="' . $row['image'] . '" alt="' . $row['name'] . '">
                            <div class="details">
                                <p class="name">' . $row['name'] . '</p>
                                <p class="price">$' . $row['price'] . '</p>
                                <p class="size">Size: ' . $row['size'] . '</p>
                                <p class="color">Color: ' . $row['color'] . '</p>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "No clothing items found.";
            }

            // Close the database connection (optional, as the connection will be closed automatically at the end of the script)
            $conn->close();
            ?>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
