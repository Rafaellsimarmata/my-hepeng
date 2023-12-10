<?php

session_start();

if (!$_SESSION['login']) {
    header("Location: login.php");
    exit;
}

require_once "server.php";

$userData = $_SESSION['userData'];

$idUser = $userData['id'];
$userEarningsReport = query("SELECT * FROM lapkeu WHERE id_user = '$idUser' AND tipe = 'pengeluaran' ");

echo "user spendings data : "; 
var_dump($userEarningsReport);

?>