<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
    exit();
}

$home = '';
$mycar = 'active';
?>

<!doctype html>
<html lang="en">

<head>
    <title>Detail Mobil</title>
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
        <!-- image modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="../assets/img/upload/<?= $detail[0]['foto_mobil'] ?>" class="card-img-top sticky-top rounded" alt="gambar mobil">
                    </div>
                </div>
            </div>
        </div>
        <div class="container justify-content-center">
            <h1 style="font-size: 40px; font-weight: bold"><?= $detail[0]['nama_mobil'] ?></h1>
            <p>Detail mobil <?= $detail[0]['nama_mobil'] ?></p>
            <div class="row">
                <div class="col-5">
                    <img
                    src="../assets/img/upload/<?= $detail[0]['foto_mobil'] ?>"
                    class="card-img-top sticky-top rounded"
                    alt="gambar mobil"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                    style=" aspect-ratio: 4 / 3; object-fit: cover">
                </div>
                <div class="col-7">
                    <form action="../pages/Edit-Wisnu.php" method="POST">
                        <input type="hidden" name="id_mobil" id="id_mobil" value="<?= $detail[0]['id_mobil'] ?>">
                        <input type="hidden" name="foto_mobil" id="foto_mobil" value="<?= $detail[0]['foto_mobil'] ?>">
                        <input type="hidden" name="status_pembayaran" id="status_pembayaran" value="<?= $detail[0]['status_pembayaran'] ?>" />
                        <div class="mb-3">
                            <label for="nama_mobil" class="form-label">Nama Mobil</label>
                            <input value="<?= $detail[0]['nama_mobil'] ?>" type="text" class="form-control" name="nama_mobil" id="nama_mobil" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="pemilik_mobil" class="form-label">Nama Pemilik</label>
                            <input value="<?= $detail[0]['pemilik_mobil'] ?>" type="text" class="form-control" name="pemilik_mobil" id="pemilik_mobil" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="merk_mobil" class="form-label">Merk</label>
                            <input value="<?= $detail[0]['merk_mobil'] ?>" type="text" class="form-control" name="merk_mobil" id="merk_mobil" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_beli" class="form-label">Tanggal Beli</label>
                            <input value="<?= $detail[0]['tanggal_beli'] ?>" type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" value="" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" readonly><?= $detail[0]['deskripsi'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Pembayaran</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_pembayaran" id="lunas" value="Lunas" <?= $lunas ?> disabled>
                                <label class="form-check-label" for="lunas">Lunas</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_pembayaran" id="belum_lunas" value="Belum Lunas" <?= $belum_lunas ?> disabled>
                                <label class="form-check-label" for="belum_lunas">Belum Lunas</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Edit</button>
                        <a class="btn btn-danger" href="../pages/ListCar-Wisnu.php" role="button">Back</a>
                    </form>
                </div>
            </div>
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