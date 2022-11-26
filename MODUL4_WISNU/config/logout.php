<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', '', time() - 3600);
setcookie('email', '', time() - 3600);

header('Location: http://localhost:8080/praktikum/MODUL4_WISNU/index.php');
?>