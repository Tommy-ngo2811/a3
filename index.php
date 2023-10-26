<?php
session_start(); // Start a session

// Fetch data from the web service (Task C)
$ordersData = file_get_contents('https://titan.csit.rmit.edu.au/~e103884/wp/.services/.orders/');
$orders = json_decode($ordersData, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h2>Orders</h2>
        <ul>
            <?php
            // Display orders from the web service (Task C)
            if (!empty($orders)) {
                foreach ($orders as $order) {
                    echo '<li>';
                    echo '<h3>Order #' . $order['orderID'] . '</h3>';
                    echo '<p>Order Date: ' . $order['orderDate'] . '</p>';
                    echo '<a href="details.php?orderID=' . $order['orderID'] . '">View Products</a>';
                    echo '</li>';
                }
            } else {
                echo '<p>No orders available.</p>';
            }

            // Display newly created products from the session
            if (isset($_SESSION['products'])) {
                foreach ($_SESSION['products'] as $product) {
                    echo '<li>';
                    echo '<h3>Product ID: ' . $product['productID'] . '</h3>';
                    echo '<p>Name: ' . $product['name'] . '</p>';
                    echo '<p>Price: ' . $product['price'] . '</p>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
    </main>
    
    <?php require_once("footer.php"); ?>
</body>
</html>
