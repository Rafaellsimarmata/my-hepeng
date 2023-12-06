<?php
session_start();

if (!$_SESSION['login']) {
    header("Location: login.php");
    exit;
}

require_once "server.php";

$userData = $_SESSION['userData'];

// echo $_SESSION['userData']['name'];

// $mahasiswa = query("SELECT * FROM mahasiswa");

// if (isset($_POST['cari'])) {
//     $mahasiswa = cari($_POST['keyword']);
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-favicon.png" type="image/x-icon" sizes="32x32">
    <title>My Hepeng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <button id="sidebarCollapse">&#9776;</button>
            <nav id="sidebar" class="sidebar">
                <a class="navbar-brand" href="index.php"><img src="img/logo-sekunder-dark.png" alt="MyHepeng" class="main-logo"></a>
                <hr>
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                Dashboard
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="pemasukan.php">
                                Pemasukan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pengeluaran.php">
                                Pengeluaran
                            </a>
                        </li>
                    </ul>
                </div>
                
            </nav>
            <main>
                <!-- Greeting -->
                <section class="greeting">
                    <div>
                        <?php
                        // variabel sementara untuk name
                        $name = $userData['name'];
                        echo "<h1>Halo, $name !</h1>";
                        ?>
                    </div>
                </section>

                <!-- Utama -->
                <section class="utama">
                    <h2>Dashboard</h2>
                    <br>
                    <!-- Cards -->
                    <div class="card-container">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Pendapatan</h5>
                                <?php
                                    // variabel sementara untuk name
                                    $earn = number_format(($userData['pendapatan']), 0);
                                    echo "<h3> Rp$earn </h3>";
                                ?>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Pengeluaran</h5>
                                <?php
                                    // variabel sementara untuk name
                                    $earn = number_format(($userData['pengeluaran']), 0);
                                    echo "<h3> Rp$pengeluaran </h3>";
                                ?>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Sisa Saldo</h5>
                                <?php
                                    // variabel sementara untuk name
                                    $saldo = number_format(($userData['saldo']), 0);
                                    echo "<h3> Rp$saldo </h3>";
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Footer -->


    <script src="script.js"></script>
</body>
</html>