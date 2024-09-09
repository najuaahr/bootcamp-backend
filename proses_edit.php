<?php
session_start();
include "koneksi.php";

if ($_SESSION['level'] == "" || $_SESSION['level'] == "0") {
    header("location:login.php?pesan=gagal");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $level = $_POST['level'];

    $sql = "UPDATE multiuser SET username='$username', email='$email', level='$level' WHERE id='$id'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        header("Location: multi.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
