<?php
    $user_id_input = $_POST ["user_id_input"];
    $user_pwd_input = $_POST ["user_pwd_input"];

    $user_id = "admin";
    $user_pwd = "1234";

    if ($user_id_input == $user_id && $user_pwd_input == $user_pwd) {
        header('Refresh: 3; URL=http://potrerodigital.org');;
        echo "Login correcto, en 3 segundos serás redirigido";
    } else {
        echo "Login incorrecto, <a href=\"javascript:history.go(-1)\">vuelva al formulario</a> e ingrese los datos nuevamente";
    }
?>