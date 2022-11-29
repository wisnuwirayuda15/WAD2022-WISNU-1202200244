<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
    exit();
}

require '../config/connector.php';
require '../config/function.php';

$home = '';
$mycar = '';

$req = "<span class='text-danger'>*</span>";

$id = $_SESSION["id"];
$email = $_SESSION["email"];
$nama = $_SESSION["nama"];
$no_hp = $_SESSION["no_hp"];

if (!isset($_GET["alert"])) {
    $alert = '';
} elseif ($_GET["alert"] == 'unmatch') {
    $alert = '
    <div class="d-flex alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"> Konfimasi password tidak sesuai.</i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif ($_GET["alert"] == 'pass') {
    $alert = '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"> Password minimal 8 karakter.</i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif ($_GET["alert"] == 'noupdate') {
    $alert = '
    <div class="d-flex alert alert-primary alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle-fill"> Anda tidak mengupdate data apapun.</i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif ($_GET["alert"] == 'delfailed') {
    $alert = '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"> Akun anda tidak dapat dihapus, silahkan coba beberapa saat lagi.</i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

// update acc
if (isset($_POST['update'])) {
    $id = $_POST["id"];
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $no_hp = $_POST["no_hp"];
    $navcol = $_POST["navcol"];
    $_SESSION['navcol'] = $navcol;

    setcookie("navcol", $_SESSION['navcol'], time() + 3600);

    if ($_POST["password"] == null && $_POST["conf_pass"] == null) {
        $query = "UPDATE `user_wisnu` SET 
        `nama` = '$nama', 
        `email` = '$email',
        `no_hp` = '$no_hp' 
        WHERE `user_wisnu`.`id` = $id";
    } elseif (isset($_POST["password"]) || isset($_POST["conf_pass"])) {
        $password = $_POST["password"];
        $conf_pass = $_POST["conf_pass"];

        if (strlen($password) < 8) {
            return header("Location: ../pages/Profile-Wisnu.php?alert=pass");
        } elseif ($password != $conf_pass) {
            return header("Location: ../pages/Profile-Wisnu.php?alert=unmatch");
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE `user_wisnu` SET 
        `nama` = '$nama', 
        `email` = '$email', 
        `password` = '$password', 
        `no_hp` = '$no_hp' 
        WHERE `user_wisnu`.`id` = $id";
    }

    mysqli_query($conn_modul4, $query);

    if (mysqli_affected_rows($conn_modul4) > 0) {
        echo "
        <script>
            alert('Data berhasil diupdate!')
            document.location.href = '../config/logout.php'
        </script>";
        exit();
    } else {
        header("Location: ../Pages/Profile-Wisnu.php?alert=noupdate");
        exit();
    }

    // delete acc
} elseif ((isset($_POST['delete']))) {
    $id = $_POST["id"];

    $query = "DELETE FROM user_wisnu WHERE `user_wisnu`.`id` = $id";

    mysqli_query($conn_modul4, $query);

    if (mysqli_affected_rows($conn_modul4) > 0) {
        echo "
        <script>
            alert('Akun anda berhasil dihapus!')
            document.location.href = '../config/logout.php'
        </script>";
        exit();
    } else {
        header("Location: ../Pages/Profile-Wisnu.php?alert=delfailed");
        exit();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
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
            <form action="" method="POST">
                <input type="hidden" name="email" id="email" value="<?= $email ?>">
                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                <div class="mb-3 d-flex">
                    <label class="form-label" style="flex-basis: 23%">Email</label>
                    <p><?= $email ?></p>
                </div>
                <div class="mb-3 d-flex">
                    <label for="nama" class="form-label">Nama<?= $req ?></label>
                    <input value="<?= $nama ?>" type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="mb-3 d-flex">
                    <label for="no_hp" class="form-label">Phone Number<?= $req ?></label>
                    <div class="input-group"> <span class="input-group-text" id="basic-addon1">+62</span>
                        <input value="<?= $no_hp ?>" type="text" class="form-control" name="no_hp" id="no_hp" required>
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <label for="password" class="form-label">New Password<?= $req ?></label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3 d-flex">
                    <label for="conf_pass" class="form-label">Confirm Password<?= $req ?></label>
                    <input type="password" class="form-control" name="conf_pass" id="conf_pass">
                </div>
                <div class="mb-3 d-flex">
                    <label for="navcol" class="form-label">Warna Navbar</label>
                    <select class="form-select" name="navcol" id="navcol" aria-label="Default select example">
                        <option value="navbar-dark bg-primary bg-gradient">Blue</option>
                        <option value="navbar-dark bg-dark bg-gradient">Dark</option>
                        <option value="navbar-dark bg-danger bg-gradient">Red</option>
                        <option value="navbar-dark bg-success bg-gradient">Green</option>
                        <option value="bg-warning bg-gradient">Yellow</option>
                    </select>
                </div>
                <div class="mb-3">
                    <?= $alert ?>
                </div>
                <div class="container d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit" name="update" onclick="return confirm('Anda akan ter-logout jika meng-update data, apakah anda yakin?')">Update</button>
                    <button class="ms-4 btn btn-danger" type="submit" name="delete" onclick="return confirm('Apakah anda yakin ingin menghapus akun ini? Anda tidak dapat mengembalikan akun anda setelah anda memilih OK')">Delete Account</button>
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