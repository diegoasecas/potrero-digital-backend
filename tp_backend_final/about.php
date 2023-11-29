<?php
include("login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>La Feria de Potrero</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php" title="Inicio">La Feria de Potrero
            &#x1F4B8;&#x1F91D;&#x1F381;<!-- &#x1F4B8;&#x1FAF0;&#x1F911;&#x1F4B0 --></a>
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
                    <input class="form-control mr-3 mr-sm-2 rounded-right" type="search"
                        placeholder="Ej. Bicicleta playera" aria-label="Search">
                    <button class="btn btn-warning my-2 my-sm-0" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </nav>

    <main>        
        <div class="alert alert-info text-muted">
            <div class="card-body pt-3">
                <h1 class="h3 mb-3">Qué es esto?</h2>
                
                <p><strong>La Feria de Potrero</strong> es el proyecto de Trabajo Práctico Final de Diego Guaraz para el tramo de Backend del Curso de Desarrollo Web Full Stack de <a href="https://www.potrerodigital.org">Potrero Digital</a> dictado por el Prof. Luis Amarilla.</p>

                <h2 class="h5 mb-3">Objetivo del Proyecto</h2>
                <p>El objetivo principal de este proyecto fue diseñar, desarrollar e implementar un sitio web que permitiera realizar operaciones <strong>CRUD</strong> (Crear, Leer, Actualizar y Eliminar) sobre una base de datos. Además, se implementó un sistema de autenticación simple para garantizar la seguridad y se proporcionó funcionalidad para listar el contenido de la base de datos según diversas condiciones.</p>

                <h2 class="h5 mb-3">Características Principales</h2>
                <h3 class="h6 mb-2"><strong>Operaciones CRUD</strong></h3>
<ul>
<li>Crear: Se implementaron formularios para agregar nuevos registros a la base de datos.</li>
<li>Leer: Los datos almacenados en la base de datos fueron visualizados a través de una interfaz intuitiva y fácil de usar.</li>
<li>Actualizar: Se ofreció funcionalidad para editar la información existente en la base de datos mediante formularios interactivos.</li>
<li>Eliminar: Se dotó al sistema con capacidades para eliminar registros de la base de datos de manera segura.</li>
</ul>
                <h3 class="h6 mb-2"><strong>Autenticación de usuarios</strong></h3>
<ul>
<li>Se implementó un sistema de autenticación simple para gestionar el acceso al sistema.</li>
<li>Solo los usuarios autorizados podían realizar operaciones CRUD y acceder a determinadas áreas del sitio.</li>
</ul>

<h3 class="h6 mb-2"><strong>Listado de contenido con condiciones</strong></h3>
<ul>
<li>Se proporcionó una funcionalidad de filtrado para listar el contenido de la base de datos según diferentes condiciones.</li>
<li>Los usuarios tienen la capacidad de personalizar la visualización de los datos de acuerdo con sus necesidades.</li>
</ul>

<h3 class="h6 mb-2"><strong>Tecnologías utilizadas</strong></h3>
<p class="mb-2">El desarrollo del sitio se llevó a cabo utilizando las siguientes tecnologías:</p>
<ul>
<li>Lenguajes de Programación: HTML, CSS, PHP.</li>
<li>Base de Datos: MySQL se empleó para el almacenamiento y recuperación eficiente de datos.</li>
<li>Frameworks y Librerías: Bootstrap se utilizó para el diseño responsivo y una mejor experiencia de usuario.</li>
</ul>
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

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>