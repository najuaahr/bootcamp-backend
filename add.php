<?php
session_start();
if ($_SESSION['level'] == "" || $_SESSION['level'] == "1") {
    header("location:login.php?pesan=gagal");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Tasks</title>
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

    <div class="container">
        <?php
        include "koneksi.php";

        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = input($_POST["title"]);
            $description = input($_POST["description"]);
            $status = input($_POST["status"]);
            $deadline = input($_POST["deadline"]);

            $sql = "INSERT INTO tasks (title, description, status, deadline) VALUES ('$title', '$description', '$status', '$deadline')";

            $hasil = mysqli_query($koneksi, $sql);
            if ($hasil) {
                header("Location: crud2.php");
                exit; // Hentikan eksekusi kode setelah mengalihkan halaman
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>

        <div class="w-50 mx-auto border p-5 mt-5">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"> <!-- Gunakan PHP_SELF untuk aksi form -->
                <label>Nama Tugas</label>
                <input type="text" name="title" class="form-control" required><br>

                <label>Description</label>
                <input type="text" name="description" class="form-control" required><br>

                <label>Status</label>
                <select name="status" id="status" class="form-select form-control">
                    <option selected>Pilih Status</option>
                    <option value="done">done</option>
                    <option value="undone">undone</option>
                </select><br>

                <label>Deadline</label>
                <input type="date" name="deadline" class="form-control" required><br>

                <button type="submit" name="submit" class="btn btn-primary mt-5">Add</button>
            </form>
        </div>
    </div>
</body>

</html>