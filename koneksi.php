<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "bootcamp";

$koneksi = mysqli_connect($host, $user, $password, $db);
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
