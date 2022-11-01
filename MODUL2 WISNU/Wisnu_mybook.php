<?php
if (!isset($_POST["name"])) {
    header("Location: Wisnu_home.php");
    exit;
}


$name = $_POST["name"];
$book_date = $_POST["book_date"];
$time = $_POST["time"];
$duration = $_POST["duration"];
$car_type = $_POST["car_type"];
$phone_number = $_POST["phone_number"];
$date = date("Y-m-d", strtotime($book_date . "+" . $duration . "days"));
$total_price = 0;



if ($_POST["car_type"] == "Mini Cooper") {
    $car_price = 690000;
} else if ($_POST["car_type"] == "Lotus Emira") {
    $car_price = 1199000;
} else if ($_POST["car_type"] == "Mercedes-AMG GT") {
    $car_price = 1599000;
}



if (!isset($_POST["service_health"])) {
    $_POST["service_health"] = Null;
} else {
    $total_price += 25000;
}
if (!isset($_POST["service_driver"])) {
    $_POST["service_driver"] = Null;
} else {
    $total_price += 100000;
}
if (!isset($_POST["service_fuel"])) {
    $_POST["service_fuel"] = Null;
} else {
    $total_price += 250000;
}


$total_price += $car_price * $duration;


$services_unfiltered = [
    $_POST["service_health"],
    $_POST["service_driver"],
    $_POST["service_fuel"]
];

$services = array_filter($services_unfiltered);

$row = [
    "Booking Number",
    "Name",
    "Check In",
    "Check Out",
    "Car Type",
    "Phone Number",
    "Service(s)",
    "Total Price"
];

?>

<!doctype html>
<html lang="en">

<head>
    <title>My Booking</title>
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
                        <a class="nav-link" href="Wisnu_booking.php">Booking</a>
                    </div>
                </div>
            </div>
        </nav><br><br><br>
    </header>
    <main>
        <h1 class="text-center font-weight-bold" style="font-size: 25px">Thank You <?= $name ?> for Reserving</h1>
        <p class="text-center">Please double check your resevation details</p><br>

        <div class="container-fluid">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php
                        foreach ($row as $rw) {
                            echo "<th scope='col'>$rw</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td><?= rand(1111111111, 9999999999) ?></td>
                        <td><?= $name  ?></td>
                        <td><?= $book_date . " | " . $time  ?></td>
                        <td><?= $date . " | " . $time ?></td>
                        <td><?= $car_type  ?></td>
                        <td><?= $phone_number  ?></td>
                        <td>
                            <?php if ($services == Null) {
                                echo "no services";
                            } else {
                                foreach ($services as $svc) {
                                    echo "<li>$svc</li>";
                                }
                            }
                            ?>
                        </td>
                        <td>Rp <?= number_format($total_price)  ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <?php for ($i = 0; $i <= 20; $i += 1) {
        echo "<br>";
    }
    ?>
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