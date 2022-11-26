<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: http://localhost:8080/praktikum/MODUL4_WISNU/index.php');
    exit();
}

$home = '';
$mycar = 'active';

require "../config/connector.php";
require "../config/function.php";

$check = mysqli_fetch_assoc(mysqli_query($conn_modul3, "SELECT * FROM showroom_wisnu_table"));

if (!isset($check['id_mobil'])) {
    header("Location: Add-Wisnu.php");
    exit;
}

$list_car = query("SELECT * FROM showroom_wisnu_table");
?>

<!doctype html>
<html lang="en">

<head>
    <title>List Car</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="../style/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <header>
        <?php require_once '../config/navbar-login.php' ?>
    </header>
    <main>
        <div class="container justify-content-center">
            <h1 style="font-size: 40px; font-weight: bold; margin-top: 8%">Tambah Mobil</h1>
            <p>List Show Room Wisnu-1202200244</p>
            <br>
            <div class="row row-cols-auto">
                <?php foreach ($list_car as $card) : ?>
                    <div class="col">
                        <div class="card shadow" style="width: 18rem; margin-bottom: 10%">
                            <img src="../assets/img/upload/<?= $card["foto_mobil"] ?>" class="card-img-top" alt="gambar mobil" style="display: block; width: 18rem; height: 18rem; object-fit: cover">
                            <div class="card-body">
                                <h4 class="card-title" style="font-weight: bold"><?= $card["nama_mobil"] ?></h4>
                                <p class="card-text"><?= mb_strimwidth($card['deskripsi'], 0, 70, "..."); ?></p>
                                <a href="../config/edit.php?id_mobil=<?= $card["id_mobil"] ?>" class="btn btn-primary rounded-pill">Detail</a>
                                <a href="../config/delete.php?id_mobil=<?= $card["id_mobil"] ?>&gambar=<?= $card["foto_mobil"] ?>" class="btn btn-danger rounded-pill" onclick="return confirm('Apakah anda yakin?')">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>Jumlah Mobil: <?= mysqli_num_rows(mysqli_query($conn_modul3, "SELECT * FROM showroom_wisnu_table")) ?> </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>