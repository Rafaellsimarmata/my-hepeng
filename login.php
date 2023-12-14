<?php
    session_start();

    if (isset($_SESSION['login'])) {
        header("Location: index.php");
        exit;
    }

    require_once "server.php";

    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

        // cek username
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                $queryUserData = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                $userData = mysqli_fetch_assoc($queryUserData);

                $_SESSION['login'] = true;
                $_SESSION['userData'] = $userData;
                header('Location: index.php');
                exit;
            }
        }

        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-favicon.png" type="image/x-icon" sizes="32x32">
    <title>Log In</title>

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
                <img src="img/logo-sekunder-light.png" alt="MyHepeng" >
                <div class="form-group">
                    <label for="input_email">Alamat Email</label>
                    <input type="email" class="form-control" name="email" id="input_email" aria-describedby="emailHelp" placeholder="contoh@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="input_password">Password</label>
                    <input type="password" class="form-control" name="password" id="input_password" placeholder="Password" required>
                </div>
                <br>
                <p>Belum punya akun ?  <span><a href="register.php">Daftar Disini</a></span> </p>
                
                <?php if (isset($error)) : ?>
                    <p class="pesan">username / password salah</p>
                <?php endif; ?>
                
                <button type="submit" class="btn btn-primary submit" name="login">Log In</button>
            </form>
        </section>
    </main>
</body>