<!-- login_register_form.php -->

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Iniciar sesión o registrarse / La Feria de Potrero</title>

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php" title="Inicio">La Feria de Potrero &#x1F4B8;&#x1F91D;&#x1F381;<!-- &#x1F4B8;&#x1FAF0;&#x1F911;&#x1F4B0 --></a>
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
                            <a class="nav-link" href="login_register_form.php">Acceder / Registrarse</a>
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
            <div class="alert alert-info">
                <div class="row">

                    <div class="col-lg-6 custom-text">
                        <h2 class=" mb-3">Acceder</h1>

                        <!-- Formulario login -->    
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                <input class="form-control" type="text" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input class="form-control" type="password" id="password" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Acceder</button>
                        </form>
                    </div>


                    <div class="col-lg-6 custom-text">
                        <h2 class="h3 mb-3">Registrarse</h1>
                        
                        <!-- Formulario registro -->    
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input class="form-control" type="text" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                <input class="form-control"  type="text" id="username" name="username" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control"  id="password" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear usuario</button>
                        </form>
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

        <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>