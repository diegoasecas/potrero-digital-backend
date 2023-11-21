<?php
session_start();
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    
    // Check if user exists
    $query = "SELECT * FROM users WHERE username = '$user_name' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];

        // Check if the user is an admin
        $_SESSION['is_admin'] = $user['admin'] == 1;

        header("Location: index.php"); // Redirect to landing page
        exit();
    } else {
        header("refresh:5; url=index.php");
        echo "Usuario o contraseña incorrecto/s. En 5 segundos será redirigido a la página principal.";
    }
}?>
