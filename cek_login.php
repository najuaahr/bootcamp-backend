<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = mysqli_query($koneksi, "SELECT * FROM multiuser WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($sql);


if ($cek > 0) {
    $data = mysqli_fetch_assoc($sql);

    $_SESSION['username'] = $username;
    $_SESSION['level'] = $data['level'];

    if ($data['level'] == "1") {
        header("location: halaman_admin.php");
    } else if ($data['level'] == "0") {
        header("location: halaman_user.php");
    } else {
        header("location: login.php?pesan=gagal");
    }
} else {
    header("location: login.php?pesan=gagal");
}
?>
