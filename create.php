<?php
// Your PHP code for server-side validation and data processing here

// Initialize error array
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission and validation here
    $productID = $_POST["productID"];
    $name = $_POST["name"];
    $price = $_POST["price"];

    // Perform server-side validation

    // Validate Product ID: Must be a positive whole number (greater than 0)
    if (!is_numeric($productID) || intval($productID) <= 0) {
        $errors["productID"] = "Product ID must be a positive whole number.";
    }

    // Validate Name: Must start with an uppercase letter and only contain letters, numbers, and spaces
    if (!preg_match('/^[A-Z][A-Za-z0-9 ]*$/', $name)) {
        $errors["name"] = "Name is not valid. It must start with an uppercase letter and only contain letters, numbers, and spaces.";
    }

    // Validate Price: Must be a positive number between 1 and 1000 inclusive
    if (!is_numeric($price) || $price < 1 || $price > 1000) {
        $errors["price"] = "Price must be a positive number between 1 and 1000.";
    }

    // If there are validation errors, they will be displayed in the HTML
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="a3.css">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="create.php" method="post">
                    <div class="mb-3">
                        <label for="productID" class="form-label">Product ID</label>
                        <input type="text" class="form-control" id="productID" name="productID" required>
                        <!-- Display error message under the input field -->
                        <?php if (isset($errors["productID"])): ?>
                            <p class="text-danger"><?php echo $errors["productID"]; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <!-- Display error message under the input field -->
                        <?php if (isset($errors["name"])): ?>
                            <p class="text-danger"><?php echo $errors["name"]; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                        <!-- Display error message under the input field -->
                        <?php if (isset($errors["price"])): ?>
                            <p class="text-danger"><?php echo $errors["price"]; ?></p>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-white text-center p-4">
        <!-- Add your sitemap content here, or use JavaScript to populate it -->
    </footer>
    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
