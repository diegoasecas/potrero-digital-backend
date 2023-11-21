<?php
session_start();

// intercambia credenciales con la bbdd
$servername = "127.0.0.1";
$username = "root";
$password = "databased69";
$database = "tp_final_be";

// crea connexion con la bbdd
$conn = new mysqli($servername, $username, $password, $database);

// verifica conexion por errores
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// crea consulta en la bbdd para el usuario ingresado
$query = "SELECT * FROM users WHERE username = '$user_name'";

// verifica las credenciales
$result = $conn->query($query);

// verifica si la consulta devuelve resultado
if ($result !== false) {
    // verifica si las credenciales son correctas
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // verifica la contraseña
        if (password_verify($password, $user['password'])) {
            header("Location: index.php");
            exit();

        } else {
            // contraseña invalida 
            $login_error = "Usuario o contraseña incorrecto/s";
        }
    } else {
        // usuario invalido
        $login_error = "Usuario o contraseña incorrecto/s";
    }
} else {
    // la consulta no devuelve resultados
    $login_error = "Error en la consulta";
}
?>