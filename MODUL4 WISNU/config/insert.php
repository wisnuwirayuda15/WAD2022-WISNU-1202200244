<?php 
if (!isset($_POST['nama_mobil'])) {
    header("Location: http://localhost:8080/praktikum/MODUL4_WISNU/index.php");
    exit();
}

require "connector.php";
require "function.php";

$nama_mobil = $_POST['nama_mobil'];
$pemilik_mobil = $_POST['pemilik_mobil'];
$merk_mobil = $_POST['merk_mobil'];
$tanggal_beli = $_POST['tanggal_beli'];
$deskripsi = $_POST['deskripsi'];
$status_pembayaran = $_POST['status_pembayaran'];
$foto_mobil = upload_gambar();

$query = "INSERT INTO `showroom_wisnu_table` (`id_mobil`, `nama_mobil`, `pemilik_mobil`, `merk_mobil`, `tanggal_beli`, `deskripsi`, `foto_mobil`, `status_pembayaran`) 
VALUES (NULL, '$nama_mobil', '$pemilik_mobil', '$merk_mobil', '$tanggal_beli', '$deskripsi', '$foto_mobil', '$status_pembayaran')";

mysqli_query($conn_modul3, $query);

if (mysqli_affected_rows($conn_modul3) > 0) {
    echo "
    <script>
        alert('Data berhasil ditambahkan!')
        document.location.href = 'http://localhost:8080/praktikum/MODUL4_WISNU/pages/ListCar-Wisnu.php'
    </script>";
    exit;
} else {
    echo "
    <script>
        alert('Data gagal ditambahkan!')
        document.location.href = 'http://localhost:8080/praktikum/MODUL4_WISNU/pages/ListCar-Wisnu.php'
    </script>";
    exit;
}

?>

