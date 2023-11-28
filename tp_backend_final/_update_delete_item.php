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

        // Define las categorías disponibles
        $predefinedCategories = [
            'Aire libre y jardinería',
            'Deportes',
            'Hobbies',
            'Moda e indumentaria',
            'Hogar y electrodomésticos',
            'Celulares y electrónica',
            'Instrumentos musicales',
            'Productos para mascotas',
            'Otros'
        ];


        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
        echo '<title>Publicar nuevo artículo / La Feria de Potrero</title>';
        echo '<!-- CSS Bootstrap -->';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
        echo '<link rel="stylesheet" href="./css/style.css">';
        echo '</head>';
        echo '<body>';
        echo '<!-- Navbar -->';
        echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary">';
        echo '<a class="navbar-brand" href="index.html" title="Inicio">La Feria de Potrero &#x1F4B8;&#x1F91D;&#x1F381;</a>';
        echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">';
        echo '<span class="navbar-toggler-icon"></span>';
        echo '</button>';
        echo '<div class="collapse navbar-collapse" id="navbarNav">';
        echo '<form class="form-inline my-2 my-lg-0 ml-auto">';
        echo '<ul class="navbar-nav mr-3">';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="./about.html">Acerca de</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="login_register_form.html">Acceder / Registrarse</a>';
        echo '</li>';
        echo '</ul>';
        echo '<div class="input-group align-items-center">';
        echo '<input class="form-control mr-3 mr-sm-2 rounded-right" type="search" placeholder="Ej. Bicicleta playera" aria-label="Search">';
        echo '<button class="btn btn-warning my-2 my-sm-0" type="submit">Buscar</button>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '</nav>';
        echo '<main>';
        echo '<div class="alert alert-info new-item">';
        echo '<div class="row">';
        echo '<div class="col-lg-7 text-muted custom-text pb-4">';
        echo '<h1 class="h3 mb-3">Publicar nuevo artículo</h1>';
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
