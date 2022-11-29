<?php
if (!isset($_GET["id_mobil"])) {
    header("Location: ../pages/ListCar-Wisnu.php");
    exit;
}

require "connector.php";
require "function.php";

$id = $_GET['id_mobil'];

// edit
if (isset($_POST['edit'])) {
    $nama_mobil = $_POST['nama_mobil'];
    $pemilik_mobil = $_POST['pemilik_mobil'];
    $merk_mobil = $_POST['merk_mobil'];
    $tanggal_beli = $_POST['tanggal_beli'];
    $deskripsi = mysqli_real_escape_string($conn_modul3, $_POST['deskripsi']);
    $status_pembayaran = $_POST['status_pembayaran'];
    $foto_mobil_lama = $_POST['foto_mobil_lama'];

    $foto_mobil_baru = upload_gambar();

    if ($_FILES['foto_mobil']['error'] == 4) {
        $foto_mobil_baru = $foto_mobil_lama;
    } else {
        unlink('../assets/img/upload/' . $foto_mobil_lama);
    }

    $query = "UPDATE `showroom_wisnu_table` SET 
    `id_mobil` = $id, 
    `nama_mobil` = '$nama_mobil', 
    `pemilik_mobil` = '$pemilik_mobil', 
    `merk_mobil` = '$merk_mobil', 
    `tanggal_beli` = '$tanggal_beli', 
    `deskripsi` = '$deskripsi', 
    `foto_mobil` = '$foto_mobil_baru', 
    `status_pembayaran` = '$status_pembayaran' 
    WHERE `showroom_wisnu_table`.`id_mobil` = $id";

    mysqli_query($conn_modul3, $query);

    if (mysqli_affected_rows($conn_modul3) > 0) {
        echo "
        <script>
            alert('Data berhasil diupdate!')
            document.location.href = '../pages/ListCar-Wisnu.php'
        </script>";
        exit;
    } else {
        echo "
        <script>
            alert('Anda tidak merubah data apapun!')
            document.location.href = '../pages/ListCar-Wisnu.php'
        </script>";
        exit;
    }
}
// detail
else {
    $query = "SELECT * FROM `showroom_wisnu_table` WHERE `showroom_wisnu_table`.`id_mobil` = $id";

    $detail = query($query);

    if ($detail[0]['status_pembayaran'] == 'Lunas') {
        $lunas = 'checked';
        $belum_lunas = NULL;
    } elseif ($detail[0]['status_pembayaran'] == 'Belum Lunas') {
        $lunas = NULL;
        $belum_lunas = 'checked';
    }

    require "../pages/Detail-Wisnu.php";
}
