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
    
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="img/logo-sekunder-light.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
                        <a class="nav-link" href="pemasukan.php">Pemasukan</a>
                        <a class="nav-link" href="pengeluaran.php">Pengeluaran</a>
                    </div>
                    <div class="navbar-nav">
                        <a class="nav-link" href="pemasukan.php">Log In</a>
                        <a class="nav-link" href="pengeluaran.php">Sign Up</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main -->
    <main>
        <!-- Greeting -->
        <section class="greeting">
            <div>
                <?php
                // variabel sementara untuk name
                $name = "Harry";
                echo "<h1>Halo, $name!</h1>";
                ?>
            </div>
        </section>
        
        <!-- Utama -->
        <section class="utama">
            <div>
                <table>
                    <?php
                    // variabel sementara
                    $pemasukan = 1500000;
                    $pengeluaran = 5000000;
                    $saldo = $pengeluaran - $pemasukan;
                    echo "<tbody>
                    <tr>
                        <th scope=row>Saldo</th>
                        <td class=colon>:</td>
                        <td>Rp. $saldo</td>
                    </tr>
                    <tr>
                        <th scope=row>Total Pemasukan</th>
                        <td class=colon>:</td>
                        <td>Rp. $pemasukan</td>
                    </tr>
                    <tr>
                        <th scope=row>Total Pengeluaran</th>
                        <td class=colon>:</td>
                        <td>Rp. $pengeluaran</td>
                    </tr>
                </tbody>";
                    ?>
                </table>
            </div>
        </section>
        
    </main>
    

    <!-- Footer -->
</body>
</html>