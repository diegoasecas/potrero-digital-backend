<?php
session_start();
require_once('db_connection.php');

// asigna los valores ingresados a variables para usuario y contraseña
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    
    // verifica si usuario y contraseña ingresados coinciden
    $query = "SELECT * FROM users WHERE username = '$user_name' AND password = '$password'";
    $result = $conn->query($query);

    // si usuario y contraseña coinciden se setean la variable $_SESSION de acuerdo al usuario en BBDD
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];

        // verifica si el usuario tiene permisos de admin
        $_SESSION['is_admin'] = $user['admin'] == 1;

        // redirige a la pág. ppal.
        header("Refresh:4; url=index.php");
        echo "<h2>Login exitoso!</h2>";
        echo "<p class=''>Bienvenido, " . $_SESSION['name'] . "! En unos segundos será redirigido a la <a href='index.php'>página principal</a>.</p>";
        exit();
    } else {
        // si no coinciden muestra error y redirige a la pág. ppal.
        header("refresh:4; url=index.php");
        echo "<h2>Error de login</h2>";
        echo "<p class=''>Usuario o contraseña incorrecto/s. En unos segundos será redirigido a la <a href='index.php'>página principal</a>.</p>";
    }
}?>