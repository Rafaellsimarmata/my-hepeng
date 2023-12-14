<?php 
    session_start();

    if (isset($_SESSION['login'])) {
        header("Location: index.php");
        exit;
    }

    require_once "server.php";

    if (isset($_POST['register'])) {
        $email = $_POST['email'];

        if (register($_POST) > 0) {
            
                $queryUserData = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                $userData = mysqli_fetch_assoc($queryUserData);

                $_SESSION['login'] = true;
                $_SESSION['userData'] = $userData;

                echo "
                    <script>
                        alert('Registrasi Berhasil')
                    </script>
                ";
                header('Location: index.php');
                exit;
        } else {
            echo mysqli_error($koneksi);
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-favicon.png" type="image/x-icon" sizes="32x32">
    <title>Sign Up</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <main>
        <section class="login">
            <!-- TODO: form action -->
            <form action="" method="post">
                <img src="img/logo-sekunder-light.png" alt="MyHepeng">
                <div class="form-group">
                    <label for="fullname">fullname</label>
                    <input type="text" class="form-control"  name="fullname" id="fullname" aria-describedby="emailHelp" placeholder="Your FullName" required>
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" class="form-control"  name="email" id="email" aria-describedby="emailHelp" placeholder="contoh@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" required>
                </div>
                <p>Sudah memiliki akun ?  <span><a href="login.php">Login Disini</a></span> </p>
                <button type="submit" class="btn btn-primary submit" name="register">Sign Up</button>
            </form>
        </section>
    </main>
</body>