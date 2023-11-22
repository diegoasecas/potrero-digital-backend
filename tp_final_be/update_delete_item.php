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

        // Fetch existing categories from the database
        $category_query = "SELECT DISTINCT category FROM products";
        $category_result = $conn->query($category_query);

        // Initialize an array to store the categories
        $categories = [];

        if ($category_result->num_rows > 0) {
            while ($category = $category_result->fetch_assoc()) {
                $categories[] = $category['category'];
            }
        }

        // Display update form
        echo '<h2>Update Item</h2>';
        echo '<form action="update_delete_item.php?id=' . $item['id'] . '" method="post" enctype="multipart/form-data">';
        echo '<label for="name">Name:</label>';
        echo '<input type="text" id="name" name="name" value="' . $item['name'] . '" required>';
        
        echo '<label for="category">Category:</label>';
        echo '<select id="category" name="category" required>';
        echo '<option value="" disabled>Select Category</option>';

        // Dynamically generate dropdown options
        foreach ($categories as $categoryOption) {
            $selected = ($item['category'] == $categoryOption) ? 'selected' : '';
            echo '<option value="' . $categoryOption . '" ' . $selected . '>' . $categoryOption . '</option>';
        }

        echo '<option value="other">Other</option>';
        echo '</select>';

        // Additional input for a new category
        echo '<div id="newCategoryInput" style="display: none;">';
        echo '<label for="newCategory">New Category:</label>';
        echo '<input type="text" id="newCategory" name="newCategory">';
        echo '</div>';

        echo '<label for="descr">Description:</label>';
        echo '<textarea id="descr" name="descr" required>' . $item['descr'] . '</textarea>';
    
        echo '<label for="price">Price:</label>';
        echo '<input type="text" id="price" name="price" value="' . $item['price'] . '" required>';
    
        echo '<label for="image">Upload Image:</label>';
        echo '<input type="file" name="image" id="image">';
    
        echo '<input type="submit" name="update" value="Update Item">';
        echo '</form>';

        // Handle update logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            $name = $_POST['name'];
            $category = $_POST['category'];

            // If the selected category is "Other," use the new category input
            if ($category === 'other') {
                $newCategory = $_POST['newCategory'];
                $category = $newCategory;

                // Add the new category to the database for future use
                $conn->query("INSERT INTO products (category) VALUES ('$newCategory')");
                $categories[] = $newCategory; // Add it to the array for immediate use in the dropdown
            }

            $descr = $_POST['descr'];
            $price = $_POST['price'];

            // File upload handling
            if (!empty($_FILES["image"]["name"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $image_path = $target_file;
            } else {
                $image_path = $item['image_path'];
            }

            // TODO: Validate and sanitize inputs (for a real-world scenario)

            // Update the item in the 'products' table
            $update_query = "UPDATE products SET name='$name', category='$category', descr='$descr', price='$price', image_path='$image_path' WHERE id='$item_id'";
            $update_result = $conn->query($update_query);

            if ($update_result) {
                echo "Item updated successfully!";
                header('Refresh:5; url=item_detail.php?id=' . $item_id);
            } else {
                echo "Error updating item: " . $conn->error;
            }
        }

        // Display delete confirmation and button
        echo '<h2>Delete Item</h2>';
        echo '<p>Are you sure you want to delete the item: ' . $item['name'] . '?</p>';
        echo '<form action="update_delete_item.php?id=' . $item['id'] . '" method="post" id="deleteForm">';
        echo '<input type="submit" name="delete" value="Delete Item" onclick="confirmDelete()">';
        echo '</form>';

        // JavaScript to toggle the display of the new category input based on user selection
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo '   var categorySelect = document.getElementById("category");';
        echo '   var newCategoryInput = document.getElementById("newCategoryInput");';
        echo '   categorySelect.addEventListener("change", function() {';
        echo '       newCategoryInput.style.display = (categorySelect.value === "other") ? "block" : "none";';
        echo '   });';
        echo '});';
        echo '</script>';

        // Handle delete logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
            // Delete the item from the 'products' table
            $delete_query = "DELETE FROM products WHERE id='$item_id'";
            $delete_result = $conn->query($delete_query);

            if ($delete_result) {
                echo "Item eliminado con éxito! En unos segundos será redirigido a la <a href='index.php'>página principal</a>";
                header('Refresh:4; url=index.php');
            } else {
                echo "Error eliminando item: " . $conn->error;
            }
        }

    } else {
        echo 'Item not found';
    }
} else {
    echo 'Invalid request';
}
?>
