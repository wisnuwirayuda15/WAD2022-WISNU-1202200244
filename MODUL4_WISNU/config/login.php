<?php
session_start();

require "connector.php";

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user_wisnu WHERE email = '$email'";
    $check = mysqli_query($conn_modul4, $query);

    if (mysqli_num_rows($check) == 1) {
        $row = mysqli_fetch_assoc($check);

        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["nama"] = $row["nama"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["no_hp"] = $row["no_hp"];
            $_SESSION["remember"] = $_POST['remember'];

            if (isset($_POST['remember'])) {
                require "cookie.php";
                // return header("Location: https://www.youtube.com/");
            }

            return header("Location: http://localhost:8080/praktikum/MODUL4_WISNU/pages/Home-Wisnu.php");
        } else {
            return header("Location: http://localhost:8080/praktikum/MODUL4_WISNU/pages/Login-Wisnu.php?alert=unverified");
        }
    } else {
        return header("Location: http://localhost:8080/praktikum/MODUL4_WISNU/pages/Login-Wisnu.php?alert=unverified");
    }
}

header('Location: http://localhost:8080/praktikum/MODUL4_WISNU/index.php');
