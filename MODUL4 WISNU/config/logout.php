<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header('Location: http://localhost:8080/praktikum/MODUL4_WISNU/index.php');
?>