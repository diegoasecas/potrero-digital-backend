<?php
session_start();

// Desasigna la variable $_SESSION
$_SESSION = array();

// Elimina la sesión
session_destroy();

// Redirige a la pág. ppal.
header("Location: index.php");
exit();
?>