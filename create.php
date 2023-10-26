<?php
require_once('functions.php'); // Include the validation functions

// Initialize variables for form data and error messages
$productID = $name = $price = '';
$productIDErr = $nameErr = $priceErr = '';

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

    // If all fields pass validation, redirect to the index page
    if (empty($productIDErr) && empty($nameErr) && empty($priceErr)) {
        header("Location: index.php");
        exit();
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="productID">Product ID:</label>
            <input type="number" name="productID" id="productID" value="<?php echo $productID; ?>" required>
            <span class="error-message"><?php echo $productIDErr; ?></span>
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>" required>
            <span class="error-message"><?php echo $nameErr; ?></span>
            
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" value="<?php echo $price; ?>" required>
            <span class "error-message"><?php echo $priceErr; ?></span>
            
            <input type="submit" value="Create Product">
        </form>
    </main>
</body>
</html>
