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
        <form method="post" action="process_create.php">
            <label for="productID">Product ID:</label>
            <input type="number" name="productID" id="productID" required>
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" required>
            
            <input type="submit" value="Create Product">
        </form>
    </main>
</body>
</html>
