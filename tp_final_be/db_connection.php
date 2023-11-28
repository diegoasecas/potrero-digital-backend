<?php
session_start();

// intercambia credenciales con la BBDD
$servername = "127.0.0.1";
$username = "root";
$password = "databased69";
$database = "tp_final_be";

// crea connexion con la BBDD
$conn = new mysqli($servername, $username, $password, $database);
?>