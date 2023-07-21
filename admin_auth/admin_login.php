<?php
// admin_login.php

// Include the database configuration file
require_once 'includes/config.php';

// Check if the user is already logged in
// You can modify this logic based on your authentication implementation
$isLoggedIn = false; // Assuming the user is not logged in

// If the user is already logged in, redirect to the admin dashboard or any other desired page
// if ($isLoggedIn) {
//     header("Location: admin_dashboard.php");
//     exit;
// }

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate and sanitize form data
    // Add your validation and sanitization logic here

    // Prepare and execute the SQL query to check admin credentials
    $sql = "SELECT * FROM admin_users WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $adminUser = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify the password
    if ($adminUser && password_verify($password, $adminUser['password'])) {
        // Authentication successful
        // Set session or cookie variables and redirect to the admin dashboard
        // Add your session/cookie handling and redirect logic here
        $isLoggedIn = true; // For demonstration purposes only
        echo "Logged in as admin!";
    } else {
        // Authentication failed
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Admin Login</h1>
        <?php if (isset($error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
        <?php } ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
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
