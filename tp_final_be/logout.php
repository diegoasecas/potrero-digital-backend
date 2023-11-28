<?php
session_start();

// desasigna la variable $_SESSION
$_SESSION = array();

// elimina la sesión
session_destroy();

// redirige a la pág. ppal.
header("Location: index.php");
exit();
?>