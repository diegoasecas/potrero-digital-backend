<!-- logout.php -->

<?php
session_start();

// Desasigna la variable $_SESSION
$_SESSION = array();

// Elimina la sesión
session_destroy();

// Redirige a la pág. ppal.
$success_msg = "Has cerrado sesión exitosamente";
        header("Location: success.php?success_msg=" . urlencode($success_msg));
        exit();
?>