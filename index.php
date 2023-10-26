<?php
// Fetch data from the web service (Task C)
$ordersData = file_get_contents('https://titan.csit.rmit.edu.au/~e103884/wp/.services/.orders/');
$orders = json_decode($ordersData, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="a3.css">
    <title>Assignment 3</title>
</head>
<body>
    <header class="bg-dark text-white text-center p-4">
        <h1>Assignment 3</h1>
    </header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">View All Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create.php">Create Product</a>
            </li>
        </ul>
    </nav>
    <main class="container mt-4">
        <div class="container">
            <h2 class="mb-4">Orders</h2>
            <ul class="list-group">
                <?php
                // Display orders from the web service (Task C)
                if (!empty($orders)) {
                    foreach ($orders as $order) {
                        echo '<li class="list-group-item">';
                        echo '<h3 class="mb-2">Order #' . $order['orderID'] . '</h3>';
                        echo '<p class="mb-2">Order Date: ' . $order['orderDate'] . '</p>';
                        echo '<a href="details.php?orderID=' . $order['orderID'] . '" class="btn btn-primary">View Products</a>';
                        echo '</li>';
                    }
                } else {
                    echo '<li class="list-group-item">No orders available.</li>';
                }
                ?>
            </ul>
        </div>
    </main>
    <footer>
        <!-- Add your footer content here -->
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
