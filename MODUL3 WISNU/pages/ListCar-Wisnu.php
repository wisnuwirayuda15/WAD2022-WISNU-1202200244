<?php
require "../config/connector.php";
require "../config/function.php";

$check = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM showroom_wisnu"));

if (!isset($check['id_mobil'])) {
    header("Location: Add-Wisnu.php");
    exit;
}

$list_car = query("SELECT * FROM showroom_wisnu");
?>

<!doctype html>
<html lang="en">

<head>
    <title>List Car</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="../style/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">MyCar</a>
                        </li>
                    </ul>
                    <form class="d-flex justify-content-end" action="#">
                        <a href="Add-Wisnu.php" class="btn btn-light">Add Car</a>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container justify-content-center">
            <h1 style="font-size: 40px; font-weight: bold; margin-top: 8%">Tambah Mobil</h1>
            <p>List Show Room Wisnu-1202200244</p>
            <br>
            <br><br><br>
            <div class="row row-cols-auto">
                <?php $x = 0; ?>
                <?php foreach ($list_car as $card) : ?>
                    <div class="col">
                        <div class="card shadow" style="width: 18rem; margin-bottom: 10%">
                            <img src="../assets/img/upload/<?= $card["foto_mobil"] ?>" class="card-img-top" alt="gambar mobil" style="display: block; width: 18rem; height: 18rem; object-fit: cover">
                            <div class="card-body">
                                <h4 class="card-title" style="font-weight: bold"><?= $card["nama_mobil"] ?></h4>
                                <p class="card-text"><?= $card['deskripsi'] ?></p>
                                <a href="../config/edit.php?id_mobil=<?= $card["id_mobil"] ?>" class="btn btn-primary rounded-pill">Detail</a>
                                <a href="../config/delete.php?id_mobil=<?= $card["id_mobil"] ?>&gambar=<?= $card["foto_mobil"] ?>" class="btn btn-danger rounded-pill" onclick="return confirm('Apakah anda yakin?')">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>Jumlah Mobil: <?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM showroom_wisnu"))?> </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>