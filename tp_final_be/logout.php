<?php
session_start();

// desasigna las variables de sesion
$_SESSION = array();

// elimina la sesion
session_destroy();

// redirige a la pag ppal
header("Location: index.php");
exit();
?>
