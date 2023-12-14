<?php 
session_start();

if (!$_SESSION['login']) {
    header("Location: login.php");
    exit;
}

require_once "server.php";

$id = $_GET['id'];

if (deleteData($id) > 0) {
    echo " 
        <script>
            alert('data berhasil dihapus')
            document.location.href = 'index.php'
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus')
        </script>
    ";
}

?>