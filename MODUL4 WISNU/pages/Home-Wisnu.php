<?php
session_start();

if (!isset($_SESSION['login'])) {
  $navbar = '../config/navbar-default.php';
} else {
  $navbar = '../config/navbar-login.php';
}

$home = 'active';
$mycar = '';

?>

<!doctype html>
<html lang="en">

<head>
  <title>Showroom Mobil</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="../style/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <header>
    <?php require_once $navbar ?>
  </header>
  <main>
    <div class="container align-items-center d-flex" style="height: 100vh">
      <div class="row">
        <div class="col d-flex align-items-center">
          <div class="container">
            <div class="row row-cols-1">
              <div class="col">
                <h1 style="font-size: 60px; font-weight: bold">Selamat Datang Di Show Room Wisnu</h1>
              </div>
              <div class="col">
                <p>Showroom mobil termewah</p>
              </div>
              <div class="col">
                <div class="container">
                  <div class="row row-cols-auto align-items-center" style="margin-top: 70px">
                    <img class="img-fluid" style="max-width: 25%" src="../assets/img/logo-ead.png" alt="Logo EAD">
                    <p style="margin-top: 15px">Wisnu_1202200244</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="2000">
                <img src="../assets/img/cooper.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="../assets/img/lotus.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="../assets/img/mercedes.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>