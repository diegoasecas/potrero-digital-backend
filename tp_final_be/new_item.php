<?php
session_start();
require_once('db_connection.php');

// si el usuario no está logueado redirige a la página de login
if (!isset($_SESSION['user_id'])) {
    header("Location: login_register_form.php");
    exit();
}

// asigna los valores ingresados a variables
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $descr = $_POST['descr'];
    $price = $_POST['price'];
    $uploader = $_SESSION['user_id'];

    // asigna variables para el manejo de las imagenes cargadas
    $target_dir = './uploads/';
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // mueve el la imagen cargada a su directorio final
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "El archivo ". htmlspecialchars(basename($_FILES["image"]["name"])). " ha sido cargado correctamente. ";

    // inserta el nuevo item en la tabla 'products'
    $image_path = $target_file;
    $query = "INSERT INTO products (name, category, descr, price, uploader, image_path) VALUES ('$name', '$category', '$descr', '$price', '$uploader', '$image_path')";

    if ($conn->query($query) === TRUE) {
        echo "Item creado con éxito! En 5 segundos será redirigido a la página principal";
        header('Refresh:5; url=index.php');
    } else {
        echo "Error al intentar crear nuevo item: " . $conn->error;
    }
} else {
    echo "Ha habido un error en la carga de su archivo.";
    echo "Detalles del error: " . error_get_last()['message'];
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

<form action="new_item.php" method="post" enctype="multipart/form-data">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="category">Categoría:</label>
    <input type="text" id="category" name="category" required>

    <label for="descr">Descripción:</label>
    <textarea id="descr" name="descr" required></textarea>

    <label for="price">Precio:</label>
    <input type="text" id="price" name="price" required>

    <!-- Hidden file input -->
    <input type="file" name="image" id="image" style="display:none" required>

    <!-- Custom styled button -->
    <label for="image" style="cursor: pointer; display: inline-block; padding: 10px 20px;">Cargar imagen</label>

    <!-- <input type="submit" value="Crear nuevo item"> -->
    <button type="submit" style="cursor: pointer; display: inline-block; padding: 10px 20px;">Crear nuevo item</button>
</form>
</body>
</html>
