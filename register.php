<?php
include 'koneksi.php';

$error = [];

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $level = $_POST['level'];

    $sql = "SELECT * FROM multiuser WHERE username = '$username'";
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($password != $cpassword) {
            $error[] = 'Passwords do not match!';
        } else {
            $sql1 = "INSERT INTO multiuser (username, email, password, level) VALUES ('$username','$email','$password', '$level')";
            mysqli_query($koneksi, $sql1);
            header('location: login.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post">
        <h3>SIGN UP</h3>

        <?php
        if (!empty($error)) {
            foreach ($error as $errorMsg) {
                echo '<span class="error-msg">' . $errorMsg . '</span>';
            }
        }
        ?>

        <input type="text" name="username" required placeholder="Username">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Password">
        <input type="password" name="cpassword" required placeholder="Re-Password">
        
        <label for="level">Select Level :</label>
        <select name="level" id="level">
            <option value="0">User</option>
            <option value="1">Admin</option>
        </select>
        
        <input type="submit" name="submit" value="Sign Up" class="form-btn">
        <p>already have an account? <a href="login.php">login now</a></p>
    </form>
</div>
</body>
</html>