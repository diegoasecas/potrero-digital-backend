<!-- db_connection.php -->

<?php
session_start();

// Intercambia credenciales con la BBDD
$servername = "127.0.0.1";
$username = "root";
$password = "databased69";
$database = "tp_final_be";

// Establece connexión con la BBDD
$conn = new mysqli($servername, $username, $password, $database);
?>