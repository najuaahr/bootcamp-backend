<!DOCTYPE html>
<html>

<head>
    <title>Halaman admin</title>
    <link rel="stylesheet" type="text/css" href="css/styles2.css">
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['level'] == "") {
        header("location:login.php?pesan=gagal");
    } else if ($_SESSION['level'] == "0") {
        header("location:halaman_user.php");
    }
    ?>

    <header class="header">
        <a href="#" class="logo">BackEnd Developer</a>

        <i class='bx bx-menu' id="menu-icon"></i>

        <nav class="navbar">
            <a href="halaman_admin.php" class="active">Home</a>
            <a href="multi.php">Data Multiuser</a>
            <a href="crudmin.php">Tasks User</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="content">
        <h1>Selamat Datang di Halaman Admin</h1>
        <p>Silahkan menjelajahi berbagai fitur yang tersedia.</p>
    </div>
</body>

</html>