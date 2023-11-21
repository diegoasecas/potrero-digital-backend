<?php
session_start();

// intercambia credenciales con la bbdd
$servername = "127.0.0.1";
$username = "root";
$password = "databased69";
$database = "tp_final_be";

// crea connexion con la bbdd
$conn = new mysqli($servername, $username, $password, $database);
?>