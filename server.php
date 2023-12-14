<?php

    $conn = new mysqli("localhost", "root", "", "myhepeng");
 
    if(!$conn) die(mysqli_error($conn));

    function getSaldo($idUser){
        global $conn;

        // cek email sudah ada atau belum
        $totalPendapatan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total) FROM lapkeu WHERE `tipe` = 'pemasukan' AND `id_user` = $idUser "));
        $totalPengeluaran = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total) FROM lapkeu WHERE `tipe` = 'pengeluaran' AND `id_user` = $idUser "));

        $saldo = $totalPendapatan['SUM(total)'] - $totalPengeluaran['SUM(total)'];

        return $saldo;
    }

    function register($data){
        global $conn;

        $email = strtolower(stripslashes($data['email']));
        $fullName = htmlspecialchars(stripslashes($data['fullname']));
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

    function query($sql){
        global $conn;

        $hasil = mysqli_query($conn, $sql);

        $rows = [];
        while ($data = mysqli_fetch_assoc($hasil)) {
            $rows[] = $data;
        }

        return $rows;
    }

    function tambahEarning($data, $userData){
        global $conn;

        $name = htmlspecialchars($data['name']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $total = htmlspecialchars($data['total']);
        $idUser = $userData['id'];
        $type = 'pemasukan';

        $sql = "INSERT INTO 
                lapkeu 
                VALUES 
                (null, null, '$deskripsi', '$type', '$total', '$name', '$idUser')
        ";

        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
    }

    function tambahSpending($data, $userData){
        global $conn;

        $name = htmlspecialchars($data['name']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $total = htmlspecialchars($data['total']);
        $idUser = $userData['id'];
        $type = 'pengeluaran';

        $sql = "INSERT INTO 
                lapkeu 
                VALUES 
                (null, null, '$deskripsi', '$type', '$total', '$name', '$idUser')
        ";

        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
    }

    function deleteData($actId){

        global $conn;

        $sql = "DELETE FROM `lapkeu` WHERE `id` = '$actId'";
        mysqli_query($conn, $sql);
        return mysqli_affected_rows($conn);
    }

    function updateData($data){
        global $conn;

        $id = $data['id'];
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $name = htmlspecialchars($data['name']);
        $total = htmlspecialchars($data['total']);

        $sql = "UPDATE `lapkeu` SET `deskripsi`='$deskripsi',`total`='$total',`act_name`='$name' WHERE `id` = $id";

        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
    }
?>