<?php
session_start(); // Start the session

// Check if the customer is logged in
$isLoggedIn = isset($_SESSION['customer_id']);

// Logout logic
if (isset($_POST['logout'])) {
    // Perform any necessary logout actions, such as destroying the session
    session_destroy();
    header("Location: index.php"); // Redirect to the homepage or any other desired page after logout
    exit;
}
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Shopify</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php if ($isLoggedIn) { ?>
                        <li class="nav-item">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <button class="btn btn-link nav-link" type="submit" name="logout">Logout</button>
                            </form>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
