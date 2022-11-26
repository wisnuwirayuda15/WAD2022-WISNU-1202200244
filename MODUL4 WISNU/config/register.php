<?php 
session_start();

require "connector.php";

if (isset($_POST["register"])){
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $no_hp = $_POST["no_hp"];
    $password = mysqli_real_escape_string($conn_modul4, $_POST["password"]);
    $conf_pass = mysqli_real_escape_string($conn_modul4, $_POST["conf_pass"]);

    $query = "SELECT email FROM user_wisnu WHERE email = '$email'";
    $check = mysqli_query($conn_modul4, $query);

    if (strlen($password) < 8){ 
        return header("Location: http://localhost:8080/praktikum/MODUL4_WISNU/pages/Register-Wisnu.php?alert=pass");

    } elseif ($password != $conf_pass){ 
        return header("Location: http://localhost:8080/praktikum/MODUL4_WISNU/pages/Register-Wisnu.php?alert=unmatch");

    } elseif (mysqli_fetch_assoc($check)) {
        return header("Location: http://localhost:8080/praktikum/MODUL4_WISNU/pages/Register-Wisnu.php?alert=email");
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO `user_wisnu` (`id`, `nama`, `email`, `password`, `no_hp`) VALUES (NULL, '$nama', '$email', '$password', '$no_hp')";
    
    mysqli_query($conn_modul4, $query);

    return header("Location: http://localhost:8080/praktikum/MODUL4_WISNU/pages/Login-Wisnu.php?alert=success");
}

header('Location: http://localhost:8080/praktikum/MODUL4_WISNU/index.php');