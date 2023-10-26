<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="a3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Assignment 3</title>
</head>
<body>
    <header class="bg-dark text-white text-center p-4">
        <h1>Welcome to Assignment 3</h1>
    </header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">View All Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create.php">Create Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/rmit-wp-s2-2023/s3900254-a3">GitHub</a>
            </li>
        </ul>
    </nav>

    <main class="container mt-4">
        <?php
        // Fetch data from the web service
        $ordersData = file_get_contents('https://titan.csit.rmit.edu.au/~e103884/wp/.services/.orders/');
        $orders = json_decode($ordersData, true);

        // Display orders
        if (!empty($orders)) {
            echo '<h2>Orders</h2>';
            echo '<ul>';
            foreach ($orders as $order) {
                echo '<li>';
                echo '<h3>Order #' . $order['orderID'] . '</h3>';
                echo '<p>Order Date: ' . $order['orderDate'] . '</p>';
                // Add more fields here as needed
                echo '</li>';
            }
            echo '</ul>';
        }
        ?>
    </main>
    <?php require_once("footer.php"); ?>
</body>
</html>
