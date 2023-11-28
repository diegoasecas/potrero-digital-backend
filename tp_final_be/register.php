<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);


session_start();
require_once('db_connection.php');

// asigna el input a la variable $_POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // inserta nuevo usuario en la tabla 'users' con los param especificados
    $query = "INSERT INTO users (username, name, password) VALUES ('$user_name', '$name', '$password')";
    $result = $conn->query($query);

    if ($result) {
        header("refresh:4; url=index.php");
        echo "Registro éxitoso! En unos segundos será dirigido a la <a href='index.php'>página principal</a>";
    } else {
        header("refresh:4; url=index.php");
        echo "Error de registro. En unos segundos será redirigido a la <a href='index.php'>página principal</a>. Código del error: " . $conn->error;
    }
}
?>