<?php
include "koneksi.php";
session_start();

$query = "SELECT * FROM multiuser WHERE username='" . $_SESSION['username'] . "'";
$result = mysqli_query($koneksi, $query);

if ($_SESSION['level'] == "" || $_SESSION['level'] == "1") {
    header("location:login.php?pesan=gagal");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/styles5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>

    <header class="header">
        <a href="#" class="logo">BackEnd Developer</a>

        <i class='bx bx-menu' id="menu-icon"></i>

        <nav class="navbar">
            <a href="halaman_user.php">Home</a>
            <a href="profile.php" class="active">Profile</a>
            <a href="crud2.php">CRUD Tasks</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="profile">
            <div class="prof">
                <?php
                while ($ts = mysqli_fetch_assoc($result)) {
                    ?>
                    <form action="logout.php" method="post">
                        <table>
                            <tr>
                                <td><img src="img/user.png" /></td>
                                <td class="us">
                                    <?php echo $ts['username'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="mp">My Profile</td>
                            </tr>

                            <tr>
                                <td class="name">Name</td>
                                <td>:
                                    <input type="text" class="input" name="username" value="<?= $ts['username'] ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td class="em">Email</td>
                                <td>:
                                    <input type="textarea" class="input" name="email" value="<?= $ts['email'] ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td class="pas">Password</td>
                                <td>:
                                    <input type="password" class="input2" name="password" value="<?= $ts['password'] ?>" />
                                </td>
                            </tr>

                                <td class="lev">Level</td>
                                <td>:
                                    <input type="text" class="input" name="level" value="<?= $ts['level'] ?>" />
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php
                }
                ?>
            </div>
        </div>

    
</body>

</html>