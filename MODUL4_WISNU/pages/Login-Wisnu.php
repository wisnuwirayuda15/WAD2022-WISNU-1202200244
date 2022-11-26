<?php 
session_start();

if (isset($_SESSION['login'])) {
    header('Location: http://localhost:8080/praktikum/MODUL4_WISNU/index.php');
    exit();
}

if (!isset($_GET["alert"])) {
    $alert = '';
} elseif ($_GET["alert"] == 'unverified') {
    $alert = '
    <div class="d-flex alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"> Email atau password salah.</i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif ($_GET["alert"] == 'success') {
    $alert = '
    <div class="d-flex alert alert-primary alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle-fill"> Registrasi berhasil, sekarang anda bisa login.</i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} 
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="../style/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="d-flex" style="height: 100vh">
            <!-- login-left  -->
            <div class="w-50 h-100">
                <img src="../assets/img/car-cover.jpg" class="img-fluid h-100" alt="Car Cover" style="display: block; object-fit: cover">
            </div>
            <!-- login-right  -->
            <div class="container w-50 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-8">
                        <h1 style="font-size: 40px; font-weight: bold">Login</h1>
                        <br>
                        <form action="../config/login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <div class="mb-3">
                                <?=$alert?>
                            </div>
                            <button class="mb-3 btn btn-primary" type="submit" name="login">Login</button>
                            <p>Anda belum punya akun? <a href="http://localhost:8080/praktikum/MODUL4_WISNU/pages/Register-Wisnu.php">Daftar</a></p>
                            <p>Kembali ke <a href="http://localhost:8080/praktikum/MODUL4_WISNU/pages/Home-Wisnu.php">Beranda</a></p>
                        </form>
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