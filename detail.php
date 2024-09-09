<!DOCTYPE html>
<html>

<head>
    <title>Detail Task</title>
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
        <?php
        session_start();
        if ($_SESSION['level'] == "1") {
            header("location:login.php?pesan=gagal");
            exit;
        }

        include "koneksi.php";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM tasks WHERE id='$id'";
            $result = mysqli_query($koneksi, $sql);
            $data = mysqli_fetch_assoc($result);
            ?>
            <h3>Detail Tugas</h3><br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>
                            <?php echo $data['id']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>
                            <?php echo $data['title']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>
                            <?php echo $data['description']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <?php echo $data['status']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Deadline</th>
                        <td>
                            <?php echo $data['deadline']; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <a href="crud2.php" class="btn btn-primary">Back</a>
            <?php
        }
        ?>
    </div>
</body>

</html>