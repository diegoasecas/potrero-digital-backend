<?php
    $user_id_input = $_POST ["user_id_input"];
    $user_pwd_input = $_POST ["user_pwd_input"];

    $user_id = "admin";
    $user_pwd = "1234";

    if ($user_id_input == $user_id && $user_pwd_input == $user_pwd) {
        header('Location: http://potrerodigital.org');
    } else {
        header('Location: error.html');
    }
?>