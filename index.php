<?php
session_start();

if (!$_SESSION['login']) {
    header("Location: login.php");
    exit;
}

require_once "server.php";

$idUser = $_SESSION['userData']['id'];

$userData = query("SELECT * FROM users WHERE id = '$idUser'");
$userEarningsReport = query("SELECT * FROM lapkeu WHERE id_user = '$idUser' AND tipe = 'pemasukan'");
$userSpendsReport = query("SELECT * FROM lapkeu WHERE id_user = '$idUser' AND tipe = 'pengeluaran'");

$userSaldo = $userData[0]['saldo'];
$userEarnings = $userData[0]['pendapatan'];
$userSpendings = $userData[0]['pengeluaran'];

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
                        <hr>
                        <li id="logout" class="nav-item">
                            <a class="nav-link" href="logout.php">
                                Log Out
                            </a>
                        </li>
                    </ul>
                        
                    </ul>
                </div>
            </nav>
            <button id="sidebarCollapse">&#9776;</button>


            <main>
                <!-- Greeting -->
                <section class="greeting">
                    <div>
                        <?php
                        $userName = $_SESSION['userData']['name'];
                        // variabel sementara untuk name
                        echo "<h1>Halo, $userName!</h1>";
                        ?>
                    </div>
                </section>

                <!-- Utama -->
                <section class="utama">
                    <!-- saldo -->
                    <div class="option saldo">
                        <br>
                        <h3>Sisa Saldo</h3>       
                        <?php
                            echo "<h4>Halo, $userSaldo!</h4>";
                        ?>
                    </div>
                    <!-- Cards -->
                    <div class="option pemasukan"> 
                        <br>
                        <h3>Pemasukan</h3>       
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Detail</th>
                                    <th>Jumlah (Rp)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($userEarningsReport as $data) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $data['date']; ?></td>
                                        <td><?= $data['act_name']; ?></td>
                                        <td><?= $data['deskripsi']; ?></td>
                                        <td><?= $data['total']; ?></td>
                                        <td>
                                            <a href="update.php?id=<?= $data['id'] ?>">ubah</a> |
                                            <a href="hapus.php?id=<?= $data['id'] ?>" id="hapus">hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="option pengeluaran"> 
                        <br>
                        <h3>Pengeluaran</h3>       
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Detail</th>
                                    <th>Jumlah (Rp)</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                        
                            <tbody>
                            <?php
                                    $no = 1;
                                    foreach ($userSpendsReport as $data) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $data['date']; ?></td>
                                        <td><?= $data['act_name']; ?></td>
                                        <td><?= $data['deskripsi']; ?></td>
                                        <td><?= $data['total']; ?></td>
                                        <td>
                                            <a href="update.php?id=<?= $data['id'] ?>">ubah</a> |
                                            <a href="hapus.php?id=<?= $data['id'] ?>" id="hapus">hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>
    </div>


    <script src="script.js"></script>
</body>
</html>