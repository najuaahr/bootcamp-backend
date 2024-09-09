<!DOCTYPE html>
<html>

<head>
    <title>Halaman user</title>
    <link rel="stylesheet" type="text/css" href="css/styles2.css">
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['level'] == "") {
        header("location:login.php?pesan=gagal");
    } else if ($_SESSION['level'] == "1") {
        header("location:halaman_admin.php");
    }
    ?>

    <header class="header">
        <a href="#" class="logo">BackEnd Developer</a>

        <i class='bx bx-menu' id="menu-icon"></i>

        <nav class="navbar">
            <a href="halaman_user.php" class="active">Home</a>
            <a href="profile.php">Profile</a>
            <a href="crud2.php">CRUD Tasks</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="content">
        <h1>Selamat Datang di Halaman User</h1>
        <p>Silahkan menjelajahi berbagai fitur yang tersedia.</p>
    </div>
</body>

</html>