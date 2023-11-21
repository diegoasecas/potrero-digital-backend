<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);


session_start();
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // inserta nuevo usuario en la tabla 'users'
    $query = "INSERT INTO users (username, name, password) VALUES ('$user_name', '$name', '$password')";
    $result = $conn->query($query);

    if ($result) {
        header("refresh:5; url=index.php");
        echo "Registro exitoso! En 5 segundos será dirigido a la página principal";
    } else {
        header("refresh:5; url=index.php");
        echo "Error de registro. En 5 segundos será redirigido a la página principal. Código del error: " . $conn->error;
    }
}
?>