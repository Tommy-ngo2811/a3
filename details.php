<?php
// Check if orderID is provided as a query parameter
if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];

    // Construct the URL to the web service using the orderID
    $serviceURL = "https://titan.csit.rmit.edu.au/~e103884/wp/.services/.orders/?id=" . $orderID;

    // Fetch data from the web service
    $orderData = file_get_contents($serviceURL);
    $order = json_decode($orderData, true);

    if ($order) {
        // Extract order details
        $orderID = $order['orderID'];
        $orderDate = $order['orderDate'];
        $products = $order['products'];
    }
} else {
    // Handle the case where orderID is not provided
    header("Location: index.php");
    exit();
}
?>

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
        <h1>Order #<?php echo $orderID; ?></h1>
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
        <h2>Order Details</h2>
        <p><strong>Order Date:</strong> <?php echo $orderDate; ?></p>
        
        <h3>Products in this Order</h3>
        <ul>
            <?php
            if (!empty($products)) {
                foreach ($products as $product) {
                    echo '<li>';
                    if (isset($product['productID'])) {
                        echo '<p><strong>Product ID:</strong> ' . $product['productID'] . '</p>';
                    }
                    if (isset($product['name'])) {
                        echo '<p><strong>Name:</strong> ' . $product['name'] . '</p>';
                    }
                    if (isset($product['price'])) {
                        echo '<p><strong>Price:</strong> ' . $product['price'] . '</p>';
                    }
                    echo '</li>';
                }
            } else {
                echo '<p>No products in this order.</p>';
            }
            ?>
        </ul>
    </main>

    
</body>
</html>
