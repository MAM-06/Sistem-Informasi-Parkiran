<?php
include_once("function/helper.php");
session_start();
if (isset($_SESSION["login"])) {
    header("location: " . BASE_URL . "masuk.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body style="background-color: aliceblue;">

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <h1 style="margin: 50px 20px;">Kelompok 4 <br> Sistem Parkir</h1>
            </div>
            <form action="proseslogin.php" method="post">
                <?php $notif = isset($_GET["notif"]) ? $_GET["notif"] : false ?>
                <?php if ($notif == true) : ?>
                <p id="pesan">Username dan Password salah
                <p>
                    <?php endif; ?>
                    <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username"
                        autocomplete="off">
                    <input type="password" id="password" class="fadeIn third" name="password"
                        placeholder="password"><br>
                    <button type="submit" name="login" class="fadeIn fourth ">Login</button>
            </form>
            <div id="formFooter">
                <p class="underlineHover" href="#">Selamat datang di aplikasi parkir</p>
            </div>
        </div>
    </div>
</body>

</html>