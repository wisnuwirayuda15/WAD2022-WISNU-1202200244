<?php
session_start();

if (isset($_POST['remember'])) {
    setcookie("id", $row["id"], time() + 3600);
    setcookie("email", $row["email"], time() + 3600);
    
    return header("Location: https://www.youtube.com/");

} elseif (isset($_COOKIE['id']) && ($_COOKIE['email'])) {
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
