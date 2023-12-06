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
            
            if($password == $row['password']){
                $queryUserData = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                $userData = mysqli_fetch_assoc($queryUserData);

                $_SESSION['login'] = true;
                $_SESSION['userData'] = $userData;
                header('Location: index.php');
                exit;
            }
            // if (password_verify($password, $row['password'])) {

            //     header('Location: index.php');
            //     exit;
            // }
        }

        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/registrasi.css">
    <style>
        .pesan {
            color: red;
            font-style: italic;
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>Halaman Login</h2>

    <?php if (isset($error)) : ?>
        <p class="pesan">username / password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="email">email</label>
        <input type="text" name="email" id="email">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button type="submit" name="login">Login</button>
    </form>

</body>

</html>

