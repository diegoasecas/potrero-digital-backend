<!-- item_detail.php -->

<?php
session_start();
require_once('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Detalle del artículo / La Feria de Potrero</title>

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php" title="Inicio">La Feria de Potrero &#x1F4B8;&#x1F91D;&#x1F381;</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="form-inline my-2 my-lg-0 ml-auto">
                    <ul class="navbar-nav mr-3">
                        <li class="nav-item">
                            <a class="nav-link" href="./about.php">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link" style="color:white;">|</span>
                        </li>
                        <li class="nav-item">
                            <?php
                                if (isset($_SESSION['user_id'])) {
                                    echo '<a class="nav-link" href="logout.php">Cerrar sesión</a>';
                                } else {
                                    echo '<a class="nav-link" href="login_register_form.php">Acceder / Registrarse</a>';
                                }
                            ?>
                        </li>
                    </ul>
                    <div class="input-group align-items-center">
                        <input class="form-control mr-3 mr-sm-2 rounded-right" type="search" placeholder="Ej. Bicicleta playera" aria-label="Search">
                        <button class="btn btn-warning my-2 my-sm-0" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </nav>

    <?php
    // Verifica si el parámetro 'id' se encuentra en la url
    if (isset($_GET['id'])) {
        $item_id = $_GET['id'];

        // Recupera detalles del item de la tabla 'products'
        $item_query = "SELECT * FROM products WHERE id = '$item_id'";
        $item_result = $conn->query($item_query);

        if ($item_result->num_rows > 0) {
            $item = $item_result->fetch_assoc();

        echo '<main>';
        echo '<h1 class="mb-3 text-primary">' . $item['name'] . '</h1>';
        echo '<div class="alert itemcard new-item border p-2 pl-3 text-muted">';
        echo '<div class="row">';
        echo '<div class="col-lg-7 muted-text p-3 pl-4">';
        echo '<div class="small">Categoría:</div>';
        echo '<div class="pb-2"><strong>' . $item['category'] . '</strong></div>';
        echo '<div class="small">Precio:</div>';
        echo '<div class="h3 pb-2">$ ' . $item['price'] . '</div>';
        echo '<div class="small">Descripción:</div>';
        echo '<div>' . $item['descr'] . '</div>';

        // Verifica si el usuario es el creador de la publicación o tiene permisos de administrador y si es correcto muestra el botón de edición/eliminación
        if ((isset($_SESSION['user_id']) && $_SESSION['user_id'] == $item['uploader']) || (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1)) {
            echo '<a href="update_delete_item.php?id=' . $item['id'] . '" class="mt-4 btn btn-warning common-button float-right">Actualizar o eliminar publicación</a>';
        } else { 
        // Si el usuario no es el creador de la publicación ni tiene permisos de administrador y si es correcto muestra el botón de contactar al vendedor
        echo '<a href="" class="mt-4 btn btn-success common-button float-right">Contactar al vendedor</a>';
        }

        echo '</div>';
        echo '<div class="col-lg-5 d-flex align-items-center justify-content-center">';
        echo '<div class="card expand-card square-aspect-ratio m-3  border-muted">';
        echo '<img src="' . $item['image_path'] . '" class="card-img-top" data-toggle="modal" data-target="#imageModal" alt="Image">';
        echo '</div>';
        echo '</div>';        
        echo '</div>';
        echo '<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">';
        echo '<div class="modal-dialog modal-dialog-centered modal-lg" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-body">';
        echo '<img src="' . $item['image_path'] . '" class="img-fluid" alt="Image" style="width: 200%;">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        } else {
            $error_msg = "Item no encontrado";
            header("Location: error.php?error_msg=" . urlencode($error_msg));
            exit();  
        }

    } else {
        $error_msg = "Petición inválida";
        header("Location: error.php?error_msg=" . urlencode($error_msg));
        exit();  
    }
    ?>
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

        <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>