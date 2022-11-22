<?php
function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function upload_gambar()
{
    $nama_foto = $_FILES['foto_mobil']['name'];
    $lokasi_foto = $_FILES['foto_mobil']['tmp_name'];
    $error_foto = $_FILES['foto_mobil']['error'];

    if ($error_foto == 4){
        return false;
    }

    $extensi_foto_valid = ['jpg', 'jpeg', 'png', 'gif'];
    $extensi_foto = explode('.', $nama_foto);
    $extensi_foto = strtolower(end($extensi_foto));

    if (!in_array($extensi_foto, $extensi_foto_valid)) {
        echo "
        <script>
            alert('File yang diupload tidak didukung!')
        </script>";
        header("Location: ../index.php");
        exit;
    }

    $nama_foto_baru = uniqid();
    $nama_foto_baru .= '.';
    $nama_foto_baru .= $extensi_foto;

    move_uploaded_file($lokasi_foto, 'assets/img/upload/'.$nama_foto_baru);

    return $nama_foto_baru;
}
?>