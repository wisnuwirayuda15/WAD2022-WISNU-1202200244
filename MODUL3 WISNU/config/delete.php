<?php 
if (!isset($_GET["id_mobil"])) {
    header("Location: ../pages/ListCar-Wisnu.php");
    exit;
}

require "connector.php";

$id = $_GET['id_mobil'];
$foto_mobil = $_GET['gambar'];

$query = "DELETE FROM `showroom_wisnu` WHERE `showroom_wisnu`.`id_mobil` = $id";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    unlink('../assets/img/upload/'.$foto_mobil);
    echo "
    <script>
        alert('Data berhasil dihapus!')
        document.location.href = '../pages/ListCar-Wisnu.php'
    </script>";
    exit;
} else {
    echo "
    <script>
        alert('Data tidak dapat dihapus!')
        document.location.href = '../pages/ListCar-Wisnu.php'
    </script>";
    exit;
}
?>