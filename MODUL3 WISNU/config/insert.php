<?php 
if (!isset($_POST['nama_mobil'])) {
    header("Location: ../index.php");
    exit;
}

require "connector.php";
require "function.php";

$nama_mobil = $_POST['nama_mobil'];
$pemilik_mobil = $_POST['pemilik_mobil'];
$merk_mobil = $_POST['merkmobil'];
$tanggal_beli = $_POST['tanggal_beli'];
$deskripsi = $_POST['deskripsi'];
$status_pembayaran = $_POST['status_pembayaran'];
$foto_mobil = upload_gambar();

$query = "INSERT INTO `showroom_wisnu` (`id_mobil`, `nama_mobil`, `pemilik_mobil`, `merkmobil`, `tanggal_beli`, `deskripsi`, `foto_mobil`, `status_pembayaran`) 
VALUES (NULL, '$nama_mobil', '$pemilik_mobil', '$merk_mobil', '$tanggal_beli', '$deskripsi', '$foto_mobil', '$status_pembayaran')";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
    <script>
        alert('Data berhasil ditambahkan!')
        document.location.href = '../pages/ListCar-Wisnu.php'
    </script>";
    exit;
} else {
    echo "
    <script>
        alert('Data gagal ditambahkan!')
        document.location.href = '../pages/ListCar-Wisnu.php'
    </script>";
    exit;
}

?>

