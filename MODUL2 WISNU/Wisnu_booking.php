<?php
if (!isset($_GET["car_img"])) {
    $_GET["car_img"] = "cooper";
}

if (!isset($_GET["s_cooper"])) {
    $_GET["s_cooper"] = Null;
}
if (!isset($_GET["s_lotus"])) {
    $_GET["s_lotus"] = Null;
}
if (!isset($_GET["s_mercedes"])) {
    $_GET["s_mercedes"] = Null;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Booking</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="Wisnu_home.php">Home</a>
                        <a class="nav-link active" aria-current="page" href="#">Booking</a>
                    </div>
                </div>
            </div>
        </nav><br><br><br>
    </header>
    <main>
        <h1 class="text-center font-weight-bold" style="font-size: 25px">Rent your can now!</h1><br>
        <div class="container justify-content-center">
            <div class="row">
                <div class="col">
                    <img src="img/<?= $_GET["car_img"]; ?>.png" class="img-fluid sticky-top" alt="<?= $_GET["car_img"]; ?>">
                </div>
                <div class="col-sm">
                    <div class="container" style="max-width: 600px">
                        <form action="Wisnu_mybook.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" id="name" type="text" name="name" value="PUTU WISNU WIRAYUDA PUTRA_1202200244" readonly>
                                <br>
                                <div class="mb-3">
                                    <label class="form-label">Book Date</label>
                                    <input type="date" class="form-control" id="book_date" name="book_date" value="" required>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label class="form-label">Start Time</label>
                                    <input type="time" class="form-control" id="time" name="time" value="" required>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label class="form-label">Duration (Days)</label>
                                    <input type="number" class="form-control" id="duration" name="duration" value="" required>
                                </div>
                                <br>
                                <label class="form-label">Car Type</label>
                                <select id="car_type" name="car_type" class="form-select">
                                    <option value="Mini Cooper" <?= $_GET["s_cooper"] ?>>Mini Cooper</option>
                                    <option value="Lotus Emira" <?= $_GET["s_lotus"] ?>>Lotus Emira</option>
                                    <option value="Mercedes-AMG GT" <?= $_GET["s_mercedes"] ?>>Mercedes-AMG GT</option>
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number" value="" required>
                                </div>
                                <br>
                                <label class="form-label">Add Service(s)</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Health Protocol" id="service_health" name="service_health">
                                    <label class="form-check-label">Health Protocol / Rp 25,000</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Driver" id="service_driver" name="service_driver">
                                    <label class="form-check-label">Driver / Rp 100,000</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Fuel Filled" id="service_fuel" name="service_fuel">
                                    <label class="form-check-label">Fuel Filled / Rp 250,000</label>
                                </div><br>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Book</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br><br><br>
    <footer>
        <section id="ftr" style="background-color: rgb(248, 249, 250);">
            <br>
            <div class="text-center">
                <p>Created by PUTU WISNU WIRAYUDA PUTRA_1202200244</p>
            </div>
        </section>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>