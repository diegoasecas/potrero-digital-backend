<!-- register.php -->

<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

session_start();
require_once('db_connection.php');

// Asigna el input a la variable $_POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Inserta nuevo usuario en la tabla 'users' con los parám. especificados
    $query = "INSERT INTO users (username, name, password) VALUES ('$user_name', '$name', '$password')";
    $result = $conn->query($query);

    if ($result) {
        $success_msg = "Registro exitoso";
        header("Location: success.php?success_msg=" . urlencode($success_msg));
        exit();
    } else {
        $error_msg = "Error de registro";
        header("Location: error.php?success_msg=" . urlencode($error_msg));
        exit();
    }
}
?>