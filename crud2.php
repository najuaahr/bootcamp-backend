<?php
session_start();
if ($_SESSION['level'] == "" || $_SESSION['level'] == "1") {
    header("location:login.php?pesan=gagal");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD Tasks</title>
    <link rel="stylesheet" type="text/css" href="css/styles3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <a href="#" class="logo">BackEnd Developer</a>

        <i class='bx bx-menu' id="menu-icon"></i>

        <nav class="navbar">
            <a href="halaman_user.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="crud2.php" class="active">CRUD Tasks</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="container mt-3">
        <a href="add.php" class="btn btn-primary btn-md mb-3">Tambah Data</a>

        <?php
        include "koneksi.php";

        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET["id"]);

            $sql = "delete from tasks where id='$id' ";
            $hasil = mysqli_query($koneksi, $sql);

            if ($hasil) {
                header("Location:crud2.php");

            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
        ?>

        <tr class="table-danger">
            <br>
            <thead>
                <tr>
                    <table class="my-3 table table-bordered">
                        <tr class="table-primary" align="center">
                            <th>No</th>
                            <th>Nama Tugas</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Deadline</th>
                            <th colspan='2'>Aksi</th>

                        </tr>
            </thead>

            <?php
            include "koneksi.php";
            $sql = "select * from tasks";

            $hasil = mysqli_query($koneksi, $sql);
            $id = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $id++;

                ?>
                <tbody>

                    <tr align="center">
                        <td>
                            <?php echo $id; ?>
                        </td>
                        <td>
                            <a href='detail.php?id=<?php echo $data['id']; ?>'><?php echo $data["title"]; ?></a>
                        </td>
                        <td>
                            <?php echo $data["description"]; ?>
                        </td>
                        <td>
                            <?php echo $data["status"]; ?>
                        </td>
                        <td>
                            <?php echo $data["deadline"]; ?>
                        </td>

                        <td>
                            <div class='row'>
                                <div class='col d-flex justify-content-center'>
                                    <a href='edit2.php?id=<?php echo htmlspecialchars($data['id']); ?>'
                                        class='btn btn-sn btn-warning'>Edit</a>
                                </div>
                                <div class='col d-flex justify-content-center'>
                                    <a href='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>'
                                        class='btn btn-sn btn-danger'>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <?php
            }
            ?>
            </table>
    </div>
</body>

</html>