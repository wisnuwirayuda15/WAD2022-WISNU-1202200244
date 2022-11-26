<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: http://localhost:8080/praktikum/MODUL4_WISNU/index.php');
    exit();
}

require '../config/connector.php';

$home = '';
$mycar = '';

$req = "<span class='text-danger'>*</span>";

$email = $_SESSION["email"];
$nama = $_SESSION["nama"];
$no_hp = $_SESSION["no_hp"];
?>

<!doctype html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="../style/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        label {
            flex-basis: 30%;
        }
    </style>
</head>

<body>
    <header>
        <?php require_once '../config/navbar-login.php' ?>
    </header>
    <main>
        <br><br><br><br>
        <div class="container justify-content-center">
            <h1 class="text-center" style="font-size: 40px; font-weight: bold">Profile</h1>
            <br>
            <form action="../config/login.php" method="POST">
                <div class="mb-3 d-flex">
                    <label for="email" class="form-label" style="flex-basis: 23%">Email</label>
                    <p><?= $email ?></p>
                </div>
                <div class="mb-3 d-flex">
                    <label for="nama" class="form-label">Nama<?= $req ?></label>
                    <input value="<?= $nama ?>" type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="mb-3 d-flex">
                    <label for="no_hp" class="form-label">Phone Number<?= $req ?></label>
                    <div class="input-group"> <span class="input-group-text" id="basic-addon1">+62</span>
                        <input value="<?=$no_hp?>" type="telp" class="form-control" name="no_hp" id="no_hp" required>
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <label for="password" class="form-label">Password Baru<?= $req ?></label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3 d-flex">
                    <label for="conf_pass" class="form-label">Confirm Password<?= $req ?></label>
                    <input type="password" class="form-control" name="conf_pass" id="conf_pass" required>
                </div>
                <div class="mb-5 d-flex">
                    <label for="navcol" class="form-label">Warna Navbar</label>
                    <select class="form-select" name="navcol" id="navcol" aria-label="Default select example">
                        <option value="navbar-dark bg-primary">Blue</option>
                        <option value="navbar-dark bg-dark">Dark</option>
                        <option value="navbar-dark bg-danger">Red</option>
                        <option value="navbar-dark bg-success">Green</option>
                        <option value="navbar bg-warning">Yellow</option>
                    </select>
                </div>
                <div class="container d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                </div>

            </form>
        </div>
    </main>
    <footer class="fixed-bottom">
        <div class="container d-flex">
            <img class="img-fluid mt-3 mb-3" style="width: 10%; height: auto;" src="../assets/img/logo-ead.png" alt="Logo EAD">
            <p class="mt-4 px-3">Wisnu_1202200244</p>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>