<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="form-container">
        <form action="cek_login.php" method="post">
            <h3>SIGN IN</h3>

            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<span class='alert'>Username dan Password Salah !</span>";
                }
            }
            ?>

            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Sign In" class="form-btn">
            <p>don't have an account? <a href="register.php">register now</a></p>

        </form>
    </div>
</body>

</html>