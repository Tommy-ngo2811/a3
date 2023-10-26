<?php
session_start(); // Start a session

require_once('functions.php'); // Include the validation functions

// Initialize variables for form data and error messages
$productID = $name = $price = '';
$productIDErr = $nameErr = $priceErr = '';
$showProduct = false;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Product ID
    if (empty($_POST["productID"])) {
        $productIDErr = "Product ID is required";
    } else {
        if (!isPositiveInteger($_POST["productID"])) {
            $productIDErr = "Product ID must be a positive whole number";
        } else {
            $productID = $_POST["productID"];
        }
    }

    // Validate Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        if (!isValidName($_POST["name"])) {
            $nameErr = "Name must start with an upper-case letter and contain only letters, numbers, and spaces";
        } else {
            $name = $_POST["name"];
        }
    }

    // Validate Price
    if (empty($_POST["price"])) {
        $priceErr = "Price is required";
    } else {
        if (!isPositiveDecimalInRange($_POST["price"], 1, 1000)) {
            $priceErr = "Price must be a positive number between 1 and 1000";
        } else {
            $price = $_POST["price"];
        }
    }

    // If all fields pass validation, store the product data in the session and show the product
    if (empty($productIDErr) && empty($nameErr) && empty($priceErr)) {
        $newProduct = [
            'productID' => $productID,
            'name' => $name,
            'price' => $price,
        ];

        // Check if a product array exists in the session
        if (isset($_SESSION['products'])) {
            $_SESSION['products'][] = $newProduct;
        } else {
            // If it doesn't exist, create a new array with the product
            $_SESSION['products'] = [$newProduct];
        }

        $showProduct = true; // Set to true to display the newly created product
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="a3.css">
    <title>Create Product</title>
</head>
<body>
    <header class="bg-dark text-white text-center p-4">
        <h1>Create Product</h1>
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
        if ($showProduct) {
            // Display the newly created product
            echo '<h2>New Product Created</h2>';
            echo '<p><strong>Product ID:</strong> ' . $productID . '</p>';
            echo '<p><strong>Name:</strong> ' . $name . '</p>';
            echo '<p><strong>Price:</strong> ' . $price . '</p>';
        } else {
            // Display the form for creating a product
            echo '<h2>Create Product</h2>';
            echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
            echo '<label for="productID">Product ID:</label>';
            echo '<input type="number" name="productID" id="productID" value="' . $productID . '" required>';
            echo '<span class="error-message">' . $productIDErr . '</span>';
            echo '<label for="name">Name:</label>';
            echo '<input type="text" name="name" id="name" value="' . $name . '" required>';
            echo '<span class="error-message">' . $nameErr . '</span>';
            echo '<label for="price">Price:</label>';
            echo '<input type="number" step="0.01" name="price" id="price" value="' . $price . '" required>';
            echo '<span class="error-message">' . $priceErr . '</span>';
            echo '<input type="submit" value="Create Product">';
            echo '</form>';
        }
        ?>
    </main>
</body>
</html>
