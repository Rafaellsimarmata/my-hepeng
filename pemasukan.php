<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-favicon.png" type="image/x-icon" sizes="32x32">
    <title>My Hepeng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="pemasukan.css">
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
                        <li id="login" class="nav-item">
                            <a class="nav-link" href="login.php">
                                Log In
                            </a>
                        </li>
                        <li id="sign-up" class="nav-item">
                            <a class="nav-link" href="register.php">
                                Sign Up
                            </a>
                        </li>
                        <li id="logout" class="nav-item">
                            <a class="nav-link" href="logout.php">
                                Log Out
                            </a>
                        </li>
                    </ul>
                        
                    </ul>
                </div>
                <button id="sidebarCollapse">&#9776;</button>
            </nav>


            <main>
                <!-- Greeting -->
                <section class="greeting">
                    <div>
                        <?php
                        // variabel sementara untuk name
                        
                        echo "<h1>Halo!</h1>";
                        ?>
                    </div>
                </section>

                <!-- Utama -->
                <section class="utama">
                    <h2>Input Pemasukan</h2>
                    <br>
                    <!-- Forms -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="input_pemasukan">Nama Pemasukan</label>
                            <input type="text" class="form-control" name="pemasukan" id="input_pemasukan" aria-describedby="emailHelp" placeholder="Contoh: Gaji Bulanan" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Contoh : Gaji Februari" required>
                        </div>

                        <div class="form-group">
                            <label for="input_jumlah">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" id="input_jumlah" placeholder="contoh : 500000000" required>
                        </div>

                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary submit" name="login">Masukkan Pemasukan</button>
                    </form>
                </section>
            </main>
        </div>
    </div>

    <!-- Footer -->


    <script src="script.js"></script>
</body>
</html>