<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add your head content here -->
    <title>Shoppify</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .header-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            padding: 10px 0;
        }

        .header-container .navbar {
            margin-bottom: 0;
        }

        .header-container .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .header-container .nav-link {
            color: #fff;
        }

        .page-content {
            margin-top: 60px; /* Add margin to push the content down below the fixed header */
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <?php include 'templates/header.php'; ?>
    </div>

    <div class="page-content">
        <!-- Rest of the page content goes here -->
        <h1>Welcome to Shoppify</h1>
        <p>Register or Login to Enjoy your shopping.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
