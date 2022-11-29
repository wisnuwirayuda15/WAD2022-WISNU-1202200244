<nav class="navbar <?php if (isset($_COOKIE['navcol'])) {
                        echo $_COOKIE['navcol'];
                    } else {
                        echo "navbar-dark bg-primary bg-gradient";
                    } ?> navbar-expand-lg fixed-top">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../pages/Home-Wisnu.php">Home</a>
                </li>
            </ul>
            <form class="d-flex justify-content-end" action="#">
                <div class="container">
                    <div class="row">
                        <div class="col-md-auto">
                            <a class="nav-link text-white" href="../pages/Login-Wisnu.php">Login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>