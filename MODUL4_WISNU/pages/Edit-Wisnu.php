<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: http://localhost:8080/praktikum/MODUL4_WISNU/index.php');
    exit();
}

$home = '';
$mycar = 'active';

$id_mobil = $_POST['id_mobil'];
$nama_mobil = $_POST['nama_mobil'];
$pemilik_mobil = $_POST['pemilik_mobil'];
$merk_mobil = $_POST['merk_mobil'];
$tanggal_beli = $_POST['tanggal_beli'];
$deskripsi = $_POST['deskripsi'];
$foto_mobil_lama = $_POST['foto_mobil'];
$status_pembayaran = $_POST['status_pembayaran'];

if ($_POST['status_pembayaran'] == 'Lunas') {
    $lunas = 'checked';
    $belum_lunas = NULL;
} elseif ($_POST['status_pembayaran'] == 'Belum Lunas') {
    $lunas = NULL;
    $belum_lunas = 'checked';
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Edit Mobil</title>
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
        <br><br><br><br>
        <div class="container justify-content-center">
            <h1 style="font-size: 40px; font-weight: bold">Edit</h1>
            <p>Edit mobil <?= $nama_mobil ?></p>
            <br>
            <form action="../config/edit.php?id_mobil=<?= $id_mobil ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="foto_mobil_lama" id="foto_mobil_lama" value="<?= $foto_mobil_lama ?>">
                <div class="mb-3">
                    <label for="nama_mobil" class="form-label">Nama Mobil</label>
                    <input value="<?= $nama_mobil ?>" type="text" class="form-control" name="nama_mobil" id="nama_mobil" required>
                </div>
                <div class="mb-3">
                    <label for="pemilik_mobil" class="form-label">Nama Pemilik</label>
                    <input value="<?= $pemilik_mobil ?>" type="text" class="form-control" name="pemilik_mobil" id="pemilik_mobil" required>
                </div>
                <div class="mb-3">
                    <label for="merk_mobil" class="form-label">Merk</label>
                    <input value="<?= $merk_mobil ?>" type="text" class="form-control" name="merk_mobil" id="merk_mobil" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_beli" class="form-label">Tanggal Beli</label>
                    <input value="<?= $tanggal_beli ?>" type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" value="" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required><?= $deskripsi ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="foto_mobil" class="form-label">Pilih file</label>
                    <input type="file" class="form-control" name="foto_mobil" id="foto_mobil" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Pembayaran</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_pembayaran" id="lunas" value="Lunas" <?= $lunas ?>>
                        <label class="form-check-label" for="lunas">Lunas</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_pembayaran" id="belum_lunas" value="Belum Lunas" <?= $belum_lunas ?>>
                        <label class="form-check-label" for="belum_lunas">Belum Lunas</label>
                    </div>
                </div>
                <br><br><br>
                <button class="btn btn-primary" type="submit" name="edit" onclick="return confirm('Simpan perubahan?')">Simpan</button>
                <a class="btn btn-danger" href="../config/edit.php?id_mobil=<?= $id_mobil ?>" role="button">Cancel</a>
            </form>
        </div>
    </main>
    <footer>
        <div class="container" style="margin-top: 100px"></div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>