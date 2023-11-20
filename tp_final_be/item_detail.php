<!-- item_detail.php -->

<?php
session_start();
require_once('db_connection.php');

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $item_id = $_GET['id'];

    // Retrieve item details from the 'products' table
    $item_query = "SELECT * FROM products WHERE id = '$item_id'";
    $item_result = $conn->query($item_query);

    if ($item_result->num_rows > 0) {
        $item = $item_result->fetch_assoc();

        echo '<h2>' . $item['name'] . '</h2>';
        echo '<p>Category: ' . $item['category'] . '</p>';
        echo '<p>Description: ' . $item['descr'] . '</p>';
        echo '<p>Price: $' . $item['price'] . '</p>';
        echo '<img src="' . $item['image_path'] . '" alt="' . $item['name'] . '" style="max-width: 400px; max-height: 400px;">'; // Display image

        // Check if the logged-in user is the uploader
        if ((isset($_SESSION['user_id']) && $_SESSION['user_id'] == $item['uploader']) || (isset($_SESSION['is_admin']) && $_SESSION['is_admin'])) {
            echo '<a href="update_item.php?id=' . $item['id'] . '">Update Item</a>';
            echo '<a href="delete_item.php?id=' . $item['id'] . '">Delete Item</a>';
        }

    } else {
        echo 'Item not found';
    }
} else {
    echo 'Invalid request';
}
?>

<!-- TODO: Add any additional HTML content or links -->
