<?php
session_start();

// desasigna la variable $_SESSION
$_SESSION = array();

// elimina la sesion
session_destroy();

// redirige a la pag ppal
header("Location: index.php");
exit();
?>