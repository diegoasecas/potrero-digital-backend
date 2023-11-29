<!-- login.php -->

<?php
session_start();
require_once('db_connection.php');

// Asigna los valores ingresados a variables para usuario y contraseña
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    
    // Verifica si usuario y contraseña ingresados coinciden
    $query = "SELECT * FROM users WHERE username = '$user_name' AND password = '$password'";
    $result = $conn->query($query);

    // Si usuario y contraseña coinciden se setean la variable $_SESSION de acuerdo al usuario en BBDD
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];

        // Verifica si el usuario tiene permisos de admin
        $_SESSION['is_admin'] = $user['admin'] == 1;

        // Redirige a la pag de mensaje
        $success_msg = "Login exitoso";
        header("Location: success.php?success_msg=" . urlencode($success_msg));
        exit();

    } else {
        // Si no coinciden muestra error y redirige a la pag de mensaje
        $error_msg = "Usuario o contraseña incorrecto/s";
        header("Location: error.php?error_msg=" . urlencode($error_msg));
        exit();        
    }
}?>