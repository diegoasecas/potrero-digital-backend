<!-- update_delete_item.php -->

<?php
session_start();
require_once('db_connection.php');

// Verifica si el usuario está logueado y si no lo está redirecciona a la página dde login
if (!isset($_SESSION['user_id'])) {
    header("Location: login_register_form.php");
    exit();
}

// Verifica si el parám. 'id' está especificado en la url
if (isset($_GET['id'])) {
    $item_id = $_GET['id'];

    // Recupera detalles del item de la tabla 'products'
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

        // Lógica del formulario de edición
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {

            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $category = mysqli_real_escape_string($conn, $_POST['category']);
            $descr = mysqli_real_escape_string($conn, $_POST['descr']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);

            // Lógica de la carga de imagen
            if (!empty($_FILES["image"]["name"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $image_path = $target_file;
            } else {
                $image_path = $item['image_path'];
            }
            
            // Actualiza el item en la tabla 'products'
            $update_query = "UPDATE products SET name='$name', category='$category', descr='$descr', price='$price', image_path='$image_path' WHERE id='$item_id'";
            $update_result = $conn->query($update_query);

            if ($update_result) {
                $success_msg = "Item actualizado exitosamente";
                header("Location: success.php?success_msg=" . urlencode($success_msg));
                exit();
            } else {
                $error_msg = "Se produjo un error al intentar actualizar la publicación";
                header("Location: error.php?error_msg=" . urlencode($error_msg));
                exit();
            }
        }

        // Lógica del formulario de eliminación
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
            // Delete the item from the 'products' table
            $delete_query = "DELETE FROM products WHERE id='$item_id'";
            $delete_result = $conn->query($delete_query);

            if ($delete_result) {
                $success_msg = "Item eliminado exitosamente";
                header("Location: success.php?success_msg=" . urlencode($success_msg));
                exit();
            } else {
                $error_msg = "Se produjo un error al intentar eliminar la publicación";
                header("Location: error.php?error_msg=" . urlencode($error_msg));
                exit();
            }
        }

    } else {
        $error_msg = "Publicación no encontrada";
        header("Location: error.php?error_msg=" . urlencode($error_msg));
        exit();
    }
} else {
    $error_msg = "Petición inválida";
    header("Location: error.php?error_msg=" . urlencode($error_msg));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Publicar nuevo artículo / La Feria de Potrero</title>

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

            <a class="navbar-brand" href="index.php" title="Inicio">La Feria de Potrero &#x1F4B8;&#x1F91D;&#x1F381;</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="form-inline my-2 my-lg-0 ml-auto">

                    <ul class="navbar-nav mr-3">
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link" style="color:white;">|</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Cerrar sesión</a>
                        </li>
                    </ul>

                    <div class="input-group align-items-center">
                        <input class="form-control mr-3 mr-sm-2 rounded-right" type="search"
                            placeholder="Ej. Bicicleta playera" aria-label="Search">
                        <button class="btn btn-warning my-2 my-sm-0" type="submit">Buscar</button>
                    </div>

                </form>
            </div>
        </nav>

        <main>
            <div class="alert alert-info new-item">
                <div class="row">

                    <div class="col-lg-7 text-muted custom-text pb-4">
                        <h1 class="h3 mb-3">Editar publicación</h1>
                            <div class="form-group">
                                <!-- Formulario de edición -->
                                <?php
                                    echo '<form action="update_delete_item.php?id=' . $item['id'] . '" method="post" enctype="multipart/form-data">';
                                    echo '<label for="name">Nombre del artículo:</label>';
                                    echo '<input type="text" class="form-control" id="name" name="name" value="' . $item['name'] . '" required>';
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="category" style="display:none" >Categoría:</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="" disabled selected>Seleccionar categoría</option>                                    
                                    <?php
                                        foreach ($predefinedCategories as $categoryOption) {
                                        $selected = ($item['category'] == $categoryOption) ? 'selected' : '';
                                        echo '<option value="' . $categoryOption . '" ' . $selected . '>' . $categoryOption . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-2 pb-1">
                                    <label for="price">Precio:</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <?php
                                            echo '<input class="form-control" type="text" id="price" name="price" value="' . $item['price'] . '" required>';
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="descr">Descripción:</label>
                                <?php
                                    echo '<textarea class="form-control" id="descr" name="descr" required rows="3">' . $item['descr'] . '</textarea>';
                                ?>
                            </div>


                            <div class="form-group">
                                <label for="image" class="btn btn-primary">Cargar imagen</label>
                                <input type="file" name="image" id="image" class="visually-hidden">
                            </div>

                            <div class="alert alert-warning" id="successMessage" style="display: none;">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" name="update" class="btn btn-success btn-block"><strong>Actualizar publicación</strong></button>

                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4 d-flex align-items-center justify-content-center">
                    <div class="card alert-danger mb-3">
                        <div class="card-body">
                            <h2 class="h4 card-title">Eliminar</h2>
                            <!-- Formulario de eliminación -->
                            <?php
                                echo '<p>Desea eliminar la publicación <em>' . $item['name'] . '</em>?</p>';
                                echo '<form action="update_delete_item.php?id=' . $item['id'] . '" method="post" id="deleteForm">';
                            ?>

                                <div style="font-size: 6em; text-align: center; padding-bottom: 0.25em;">&#x1F5D1;</div>
                                <p class="card-text small">Advertencia: Esta acción no se puede deshacer</p>
                                <button type="submit" name="delete" class="btn btn-danger btn-block" onclick="return confirmDelete()"><strong>Borrar publicación</strong></button>
                            </form>
                        </div>
                    </div>
                </div>

                </div>
            </div>

            <a href="index.php" class="back">◄ Volver al Inicio</a>
        </main>

        <footer class="footer bg-primary text-white text-center p-2 mt-auto p-4">
            <div class="signature">
                <p>Diego Guaraz para <a href="https://www.potrerodigital.org/">Potrero Digital</a></p>
                <p>Desarrollo Web Back End (Prof. Luis Amarilla)</p>
                <p>Mar del Plata, Noviembre 2023</p>
            </div>
        </footer>

    <!-- JS Bootstrap + etc -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- JS para el mensaje de carga -->
        <script>
            function showSuccessMessage(message) {
                var successMessageDiv = document.getElementById('successMessage');
                successMessageDiv.innerHTML = '<small>' + message + '</small>';
                successMessageDiv.style.display = 'block';
            }
            document.getElementById('image').addEventListener('change', function () {
                showSuccessMessage('Imagen cargada exitosamente.');
            });
        </script>
        <!-- JS para la confirmación de la eliminación -->
        <script>
            function confirmDelete() {
                return confirm("¿Estás seguro de que deseas eliminar esta publicación?");
            }
        </script>
    </body>
</html>