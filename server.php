<?php

    $conn = new mysqli("localhost", "root", "", "myhepeng");
 
    if(!$conn) die(mysqli_error($conn));

    function register($data)
    {
        global $conn;

        $email = strtolower(stripslashes($data['email']));
        $fullName = strtolower(stripslashes($data['fullname']));
        $password = mysqli_real_escape_string($conn, $data['password']);
        $password2 = mysqli_real_escape_string($conn, $data['password2']);
        

        // cek email sudah ada atau belum
        $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

        if (mysqli_fetch_assoc($result)) {
            echo "
                <script> 
                    alert('email sudah terdaftar')
                </script>
            ";
            return false;
        }

        if ($password !== $password2) {
            echo "
                <script> 
                    alert('konfirmasi password tidak sesuai')
                </script>
            ";
            return false;
        }

        // encripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        // query
        mysqli_query(
            $conn,
            "INSERT INTO users (email, password, name) VALUES ('$email', '$password', '$fullName')"
        );

        return mysqli_affected_rows($conn);
    }


?>