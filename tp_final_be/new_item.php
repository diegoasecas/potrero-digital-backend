<?php
session_start();
require_once('db_connection.php');

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login_register_form.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $descr = $_POST['descr'];
    $price = $_POST['price'];
    $uploader = $_SESSION['user_id'];

    // File upload handling
    $target_dir = './uploads/';
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Move the uploaded file to the target directory
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])). " has been uploaded.";

    // Insert new item into the 'products' table
    $image_path = $target_file;
    $query = "INSERT INTO products (name, category, descr, price, uploader, image_path) VALUES ('$name', '$category', '$descr', '$price', '$uploader', '$image_path')";

    if ($conn->query($query) === TRUE) {
        echo "Item created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
    echo "Debugging info: " . print_r($_FILES, true);
    echo "Error details: " . error_get_last()['message'];
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Item</title>
    <!-- TODO: Add any additional head elements (stylesheets, scripts, etc.) -->
</head>
<body>

<!-- New item form with file upload -->
<form action="new_item.php" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="category">Category:</label>
    <input type="text" id="category" name="category" required>

    <label for="descr">Description:</label>
    <textarea id="descr" name="descr" required></textarea>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required>

    <label for="image">Upload Image:</label>
    <input type="file" name="image" id="image" required>

    <input type="submit" value="Create Item">
</form>

<!-- TODO: Add any additional HTML content or links -->

</body>
</html>
