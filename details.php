<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="a3.css">
    <title>Order Details</title>
</head>
<body>
    <header class="bg-dark text-white text-center p-4">
        <h1>Order Details</h1>
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
        <?php
        // Check if orderID is provided in the query string
        if (isset($_GET['orderID'])) {
            $orderID = $_GET['orderID'];
            
            // Fetch data for the specific order using the provided orderID
            $orderDetailsData = file_get_contents('https://titan.csit.rmit.edu.au/~e103884/wp/.services/.orders/?id=' . $orderID);
            $orderDetails = json_decode($orderDetailsData, true);
            
            // Display order details
            if (!empty($orderDetails)) {
                echo '<h2>Order #' . $orderID . ' Details</h2>';
                echo '<ul>';
                foreach ($orderDetails as $product) {
                    echo '<li>';
                    echo '<p>Product Name: ' . $product['name'] . '</p>';
                    
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>No details available for this order.</p>';
            }
        } else {
            echo '<p>Order ID not provided.</p>';
        }
        ?>
    </main>
</body>
</html>
