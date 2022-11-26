<?php 
session_start();

require 'config/connector.php';

if (isset($_COOKIE['id']) && ($_COOKIE['email'])) {
    $id = $_COOKIE['id'];
    $email = $_COOKIE['email'];
    // return header("Location: https://www.youtube.com/");
    $query = "SELECT * FROM user_wisnu WHERE id = '$id'";
    $check = mysqli_query($conn_modul4, $query);
    $row = mysqli_fetch_assoc($check);

    if ($email === $row['email']) {
        $_SESSION['login'] = true;
        $_SESSION["nama"] = $row["nama"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["no_hp"] = $row["no_hp"];
    }
}

header("Location: http://localhost:8080/praktikum/MODUL4_WISNU/pages/Home-Wisnu.php");