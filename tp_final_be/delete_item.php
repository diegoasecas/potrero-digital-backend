<!-- delete_item.php -->

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

        // Display confirmation message and delete button
        echo '<h2>Confirm Deletion</h2>';
        echo '<p>Are you sure you want to delete the item: ' . $item['name'] . '?</p>';
        echo '<form action="delete_item.php?id=' . $item['id'] . '" method="post">';
        echo '<input type="submit" value="Delete Item">';
        echo '</form>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Delete the item from the 'products' table
            $delete_query = "DELETE FROM products WHERE id='$item_id'";
            $delete_result = $conn->query($delete_query);

            if ($delete_result) {
                echo "Item deleted successfully!";
            } else {
                echo "Error deleting item: " . $conn->error;
            }
        }

    } else {
        echo 'Item not found';
    }
} else {
    echo 'Invalid request';
}
?>

<!-- TODO: Add confirmation message and delete button -->
