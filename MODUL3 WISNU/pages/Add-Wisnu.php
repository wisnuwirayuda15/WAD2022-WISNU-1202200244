<!doctype html>
<html lang="en">

<head>
    <title>Tambah Mobil</title>
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
        </nav><nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
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
                </div>
            </div>
        </nav>
    </header>
    <main>
        <br><br><br><br>
        <div class="container justify-content-center">
            <h1 style="font-size: 40px; font-weight: bold">Tambah Mobil</h1>
            <p>Tambah mobil baru anda ke list showroom</p>
            <br>
            <form action="../config/insert.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_mobil" class="form-label">Nama Mobil</label>
                    <input type="text" class="form-control" name="nama_mobil" id="nama_mobil" required>
                </div>
                <div class="mb-3">
                    <label for="pemilik_mobil" class="form-label">Nama Pemilik</label>
                    <input type="text" class="form-control" name="pemilik_mobil" id="pemilik_mobil" required>
                </div>
                <div class="mb-3">
                    <label for="merk_mobil" class="form-label">Merk</label>
                    <input type="text" class="form-control" name="merk_mobil" id="merk_mobil" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_beli" class="form-label">Tanggal Beli</label>
                    <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" value="" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="foto_mobil" class="form-label">Pilih file</label>
                    <input type="file" class="form-control" name="foto_mobil" id="foto_mobil" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Pembayaran</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_pembayaran" id="lunas" value="Lunas" checked>
                        <label class="form-check-label" for="lunas">Lunas</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_pembayaran" id="belum_lunas" value="Belum Lunas">
                        <label class="form-check-label" for="belum_lunas">Belum Lunas</label>
                    </div>
                </div>
                <br><br><br>
                <button class="btn btn-primary" type="submit" name="submit">Selesai</button>
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