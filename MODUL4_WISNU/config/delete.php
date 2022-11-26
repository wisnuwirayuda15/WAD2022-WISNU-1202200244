<?php 
if (!isset($_GET["id_mobil"])) {
    header("Location: http://localhost:8080/praktikum/MODUL4_WISNU/pages/ListCar-Wisnu.php");
    exit;
}

require "connector.php";

$id = $_GET['id_mobil'];
$foto_mobil = $_GET['gambar'];

$query = "DELETE FROM `showroom_wisnu_table` WHERE `showroom_wisnu_table`.`id_mobil` = $id";

mysqli_query($conn_modul3, $query);

if (mysqli_affected_rows($conn_modul3) > 0) {
    unlink('../assets/img/upload/'.$foto_mobil);
    echo "
    <script>
        alert('Data berhasil dihapus!')
        document.location.href = 'http://localhost:8080/praktikum/MODUL4_WISNU/pages/ListCar-Wisnu.php'
    </script>";
    exit;
} else {
    echo "
    <script>
        alert('Data tidak dapat dihapus!')
        document.location.href = 'http://localhost:8080/praktikum/MODUL4_WISNU/pages/ListCar-Wisnu.php'
    </script>";
    exit;
}
?>