<?php 

require_once "server.php";

if (isset($_POST['register'])) {

    if (register($_POST) > 0) {
        echo "
            <script>
                alert('user baru berhasil ditambahkan')
            </script>
        ";
    } else {
        echo mysqli_error($koneksi);
    }
}

?>