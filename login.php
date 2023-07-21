<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
        }

        .login-container {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .alert {
            margin-top: 20px;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php
    // Include the database configuration file
    require_once 'includes/config.php';

    // Function to render the navigation bar
    function renderNavigationBar($isLoggedIn)
    {
        echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Shopify</a>
                <ul class="navbar-nav ml-auto">';

        if ($isLoggedIn) {
            echo '<li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="shipping.php">Shipping</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
        } else {
            echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="shipping.php">Shipping</a></li>';
        }

        echo '  </ul>
            </div>
        </nav>';
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data and perform basic validation
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format. Please try again.";
        } else {
            // Retrieve the user from the database based on the email
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                // User found, verify the password
                $user = $result->fetch_assoc();
                $hashedPassword = $user['password'];

                if (password_verify($password, $hashedPassword)) {
                    // Password is correct, log in the user
                    session_start();
                    $_SESSION['customer_id'] = $user['id'];

                    // Redirect the user to the navigation page after login
                    header("Location: includes/navigation.php");
                    exit;
                } else {
                    // Invalid password
                    $error = "Invalid email or password. Please try again.";
                }
            } else {
                // User not found
                $error = "Invalid email or password. Please try again.";
            }
        }
    }
    ?>

    <?php
    // Render the navigation bar
    renderNavigationBar(false); // Pass 'true' if the user is logged in
    ?>

    <div class="login-container">
        <h1>Login</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php } ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
