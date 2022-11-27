<nav class="navbar <?= $_SESSION['navcol'] ?> navbar-expand-lg fixed-top">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?= $home ?>" aria-current="page" href="http://localhost:8080/praktikum/MODUL4_WISNU/pages/Home-Wisnu.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $mycar ?>" href="http://localhost:8080/praktikum/MODUL4_WISNU/pages/ListCar-Wisnu.php">MyCar</a>
                </li>
            </ul>
            <form class="d-flex justify-content-end" action="#">
                <div class="container">
                    <div class="row">
                        <div class="col-md-auto">
                            <a href="Add-Wisnu.php" class="btn btn-light">Add Car</a>
                        </div>
                        <div class="col-md-auto">
                            <div class="dropdown">
                                <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION["nama"] ?></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="http://localhost:8080/praktikum/MODUL4_WISNU/pages/Profile-Wisnu.php">Profile</a></li>
                                    <li><a class="dropdown-item text-danger" href="http://localhost:8080/praktikum/MODUL4_WISNU/config/logout.php" onclick="return confirm('Apakah anda ingin Logout?')">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>