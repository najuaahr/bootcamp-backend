<!DOCTYPE html>
<html>

<head>
    <title>Form Tasks</title>
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

        $sql = "SELECT * FROM tasks WHERE id='$id'";
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
            <a href="halaman_user.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="crud2.php" class="active">CRUD Tasks</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="container">
        <div class="w-50 mx-auto border p-5 mt-5">
            <form action="proses_edit2.php" method="post">
                <label>Nama Tugas</label>
                <input type="text" name="title" class="form-control" value="<?php echo $data['title']; ?>"><br>

                <label>Description</label>
                <input type="text" name="description" class="form-control"
                    value="<?php echo $data['description']; ?>"><br>

                <label>Status</label>
                <select name="status" id="status" class="form-select form-control">
                    <option value="done" <?php if ($data['status'] == 'done')
                        echo 'selected'; ?>>done</option>
                    <option value="undone" <?php if ($data['status'] == 'undone')
                        echo 'selected'; ?>>undone</option>
                </select><br>

                <label>Deadline</label>
                <input type="date" name="deadline" class="form-control" value="<?php echo $data['deadline']; ?>"><br>

                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

                <button type="submit" name="submit" class="btn btn-primary mt-5">Update</button>

        </div>
        </form>
    </div>
</body>

</html>