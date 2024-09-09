<!DOCTYPE html>
<html>

<head>
    <title>Edit Multiuser</title>
    <link rel="stylesheet" type="text/css" href="css/styles3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
    <?php
    session_start();
    if ($_SESSION['level'] == "") {
        header("location:login.php?pesan=gagal");
    }

    include "koneksi.php";

    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET["id"]);

        $sql = "SELECT * FROM multiuser WHERE id='$id'";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
        } else {
            echo "Data not found.";
            exit;
        }
    } else {
        echo "Only admin can access";
        exit;
    }
    ?>

    <header class="header">
        <a href="#" class="logo">BackEnd Developer</a>

        <i class='bx bx-menu' id="menu-icon"></i>

        <nav class="navbar">
            <a href="halaman_admin.php">Home</a>
            <a href="multi.php"class="active">Data Multiuser</a>
            <a href="crudmin.php">Tasks User</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="container">
        <div class="w-50 mx-auto border p-5 mt-5">
            <form action="proses_edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <label>Name :</label>
                <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>"><br>

                <label>Email :</label>
                <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>"><br>

                <label>Level :</label>
                <input type="text" name="level" class="form-control" value="<?php echo $data['level']; ?>">

                <button type="submit" name="submit" class="btn btn-primary mt-5">Update</button>
            </form>
        </div>
    </div>
</body>

</html>