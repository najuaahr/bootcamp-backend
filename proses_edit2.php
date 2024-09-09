<?php
session_start();
include "koneksi.php";

if ($_SESSION['level'] == "" || $_SESSION['level'] == "0") {
    header("location:login.php?pesan=gagal");
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $deadline = $_POST['deadline'];

    $update_query = "UPDATE tasks SET title='$title', description='$description', status='$status', deadline='$deadline' WHERE id='$id'";

    if (mysqli_query($koneksi, $update_query)) {
        header("location: crud2.php");
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}
?>
