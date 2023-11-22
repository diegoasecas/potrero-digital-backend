<?php
session_start();
require_once('db_connection.php');

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Item</title>
</head>
<body>

<?php
// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    $uploader = $_SESSION['user_id'];

    // Assign variables for handling uploaded images
    $target_dir = './uploads/';
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Move the uploaded image to its final directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "El archivo " . htmlspecialchars(basename($_FILES["image"]["name"])) . " ha sido cargado correctamente. ";

        // Insert the new item into the 'products' table
        $image_path = $target_file;
        $query = "INSERT INTO products (name, category, descr, price, uploader, image_path) VALUES ('$name', '$category', '$descr', '$price', '$uploader', '$image_path')";

        if ($conn->query($query) === TRUE) {
            echo "Item creado con éxito! En unos segundos será redirigido a la <a href='index.php'>página principal</a>";
            header('Refresh:4; url=index.php');
        } else {
            echo "Error al intentar crear nuevo item: " . $conn->error;
        }
    } else {
        echo "Ha habido un error en la carga de su archivo.";
        echo "Detalles del error: " . error_get_last()['message'];
    }
}
?>

<form action="new_item.php" method="post" enctype="multipart/form-data">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="category">Categoría:</label>
    <select id="category" name="category" required>
        <option value="" disabled selected>Select Category</option>
        <?php
        // Dynamically generate dropdown options
        foreach ($categories as $categoryOption) {
            echo '<option value="' . $categoryOption . '">' . $categoryOption . '</option>';
        }
        ?>
        <option value="other">Other</option>
    </select>

    <!-- Additional input for a new category -->
    <div id="newCategoryInput" style="display: none;">
        <label for="newCategory">New Category:</label>
        <input type="text" id="newCategory" name="newCategory">
    </div>

    <label for="descr">Descripción:</label>
    <textarea id="descr" name="descr" required></textarea>

    <label for="price">Precio:</label>
    <input type="text" id="price" name="price" required>

    <!-- File input for image upload -->
    <input type="file" name="image" id="image" style="display:none" required>

    <!-- Custom styled button for image upload -->
    <label for="image" style="cursor: pointer; display: inline-block; padding: 10px 20px;">Cargar imagen</label>

    <!-- Submit button -->
    <button type="submit" style="cursor: pointer; display: inline-block; padding: 10px 20px;">Crear nuevo item</button>
</form>

<script>
    // JavaScript to toggle the display of the new category input based on user selection
    document.getElementById('category').addEventListener('change', function() {
        var newCategoryInput = document.getElementById('newCategoryInput');
        newCategoryInput.style.display = this.value === 'other' ? 'block' : 'none';
    });
</script>

</body>
</html>