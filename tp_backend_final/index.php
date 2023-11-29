<!-- index.php -->

<?php
session_start();
require_once('db_connection.php');

// Filtro para las categorías
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$sort_order = isset($_GET['sort']) ? $_GET['sort'] : '';

// Consulta SQL según filtros de categoría y orden asc/desc de precio
$sql = "SELECT * FROM products";
if (!empty($category_filter)) {
    $sql .= " WHERE category = '$category_filter'";
}
if (!empty($sort_order)) {
    $sql .= " ORDER BY price $sort_order";
}

// Ejecuta la consulta
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Inicio / La Feria de Potrero</title>

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
                            <a class="nav-link" href="about.php">Acerca de</a>
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
        <main>
            <?php
            // Verifica si el usuario está logueado
            if (isset($_SESSION['user_id'])) {
                // Si el usuario está logueado muestra un saludo
                echo '<h1 class="mb-1 text-right text-primary">Hola de nuevo, ' . $_SESSION['name'] . '!</h1>';
                echo '<p class="text-right small"><a href="logout.php">Cerrar sesión</a></p>';
            ?>
                <article class="card mb-4 ownarts border-0 text-muted">
                    <div class="card-body">
                        <?php
                        echo '<h2 class="h4 mb-1">Tus Artículos publicados en la Feria</h2>';
                        echo '<div class="container  p-0 pt-3">';
                        
                        // Lista los artículos publicados por el usuario
                        $uploader = $_SESSION['user_id'];
                        $user_items_query = "SELECT * FROM products WHERE uploader = '$uploader'";
                        $user_items_result = $conn->query($user_items_query);

                        if ($user_items_result->num_rows > 0) {
                            while ($row = $user_items_result->fetch_assoc()) {
                                
                                echo '    <div class="card itemcard border-0 p-2"><a style="text-decoration: none;" href="item_detail.php?id=' . $row['id'] . '">';
                                echo '        <div class="card expand-card square-aspect-ratio">';
                                echo '            <img src="' . $row['image_path'] . '" class="card-img-top" alt="Image">';
                                echo '        </div>';
                                echo '        <div class="card-body mt-2 p-1">';
                                echo '            <p class="card-text strong mb-0"><strong>' . $row['name'] . '</strong></p></a>';
                                echo '            <p class="card-text">$ ' . $row['price'] . '</p>';
                                echo '        </div>';
                                echo '    </div>';
                            }

                        } else {
                            // Muestra un aviso si no hay items publicados por el usuario
                            echo '</div>';
                            echo '<div class="text-center mb-0 mt-3 mx-auto">';
                            echo '<span style="font-size: 1.5em;">&#x1F613;</span> No hay nada por acá . . .';
                        }
                        
                        // Enlace a form nuevo item
                        echo '</div>';
                        echo '<a class="mt-4 btn btn-success common-button float-right" href="new_item.php">Publicá un nuevo Artículo!</a>';
                        echo '</div>';
                        echo '</article>';
                    } else {
                        // Si el usuario no está logueado muestra una bienvenida genérica
                        echo '<h1 class="mb-1 text-right text-primary">Bienvenido/a a la Feria de Potrero Digital!</h1>';
                        echo '<p class="text-right small"><a href="login_register_form.php">Iniciar sesión o registrarse</a></p>';
                    }
                    ?>
                
                <article class="card mb-3 text-muted">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Explorá las publicaciones en la Feria</h2>
                        <div class="sort alert alert-warning pl-3">
                            <div class="divA">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group m-0">
                                            <form action="index.php" method="get">
                                                <select class="form-control form-control-sm" id="categorySelect" name="category">
                                                    <option value="" selected>Todas las categorías</option>
                                                    <?php
                                                    // Recupera las categorías de la BBDD
                                                    $category_query = "SELECT DISTINCT category FROM products";
                                                    $category_result = $conn->query($category_query);

                                                    if ($category_result->num_rows > 0) {
                                                        while ($category = $category_result->fetch_assoc()) {
                                                            $selected = ($category_filter == $category['category']) ? 'selected' : '';
                                                            echo '<option value="' . $category['category'] . '" ' . $selected . '>' . $category['category'] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col p-0">
                                        <button type="submit" class="btn btn-sm btn-warning">Filtrar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="divB">
                                <small>Ordenar por precio: <a href="index.php?sort=asc">Ascendente</a> | <a href="index.php?sort=desc">Descendente</a></small>
                            </div>
                        </div>
                        </form>
                        <div class="container p-0 pt-3">
                            <?php
                            // Lista la totalidad de los artículos publicados
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '    <div class="card itemcard border-0 p-2"><a style="text-decoration: none;" href="item_detail.php?id=' . $row['id'] . '">';
                                        echo '        <div class="card expand-card square-aspect-ratio">';
                                        echo '            <img src="' . $row['image_path'] . '" class="card-img-top" alt="Image">';
                                        echo '        </div>';
                                        echo '        <div class="card-body mt-2 p-1">';
                                        echo '            <p class="card-text"><strong>' . $row['name'] . '</strong></p></a>';
                                        echo '            <p class="card-text">$ ' . $row['price'] . '</p>';
                                        echo '        </div>';
                                        echo '    </div>';
                                    }
                                } else {
                                    // Muestra un aviso si no hay items
                                    echo '<div class="text-center mb-0 mt-3 mx-auto">';
                                    echo '<span style="font-size: 1.5em;">&#x1F613;</span> No hay nada por acá . . .';
                                    echo '</div>';
                                }
                                echo '</div>';
                            ?>
                            <a class="mt-4 btn btn-success common-button float-right" href="new_item.php">Publicá un nuevo Artículo!</a>
                        </div>
                    </div>
                </article>

                <div><a href="index.php#top" class="back">▲ Volver al Inicio</a></div>
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

    </body>
</html>
