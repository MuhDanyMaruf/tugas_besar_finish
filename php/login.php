<?php
include "config.php";
session_start();
error_reporting(0);
if (isset($_SESSION['username'])) {
    header("location:index.php");
}
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST["password"]);
    $sql = "SELECT * FROM users WHERE email='$email'AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("location:index.php");
    } else {
        echo "<script> alert('Ooopss ! Email Atau Password Salah')</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p style="font-size: 2rem; font-weight: 850;">Log in</p>
            <div class="input-group">
                <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['$password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Log in</button>
            </div>
            <div class="login-social">
                <a class="facebook" href="#!"><i class="fa-facebook-f">facebook</i></a>
                <a class="google-plus" href="#!"><i class="fa-google-plus">Google</i></a>
            </div>
            <p class="login-register-text">Don't Have Account?
                <a href="register.php">Register Now</a>
            </p>
        </form>
    </div>
</body>

</html>