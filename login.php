<?php
session_start();
include "koneksi_login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>SwiftCRUD</title>
</head>

<body>
    <h1>LOGIN</h1>
    <form action="" method="POST">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required placeholder="Masukkan Username Anda">
        <br>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required placeholder="Masukkan Password Anda">
        <br>
        <input type="submit" value="Submit" name="kirim">
    </form>
</body>

</html>

<?php
if (isset($_POST['kirim'])) {
    $sql = mysqli_query($koneksi, "select * from login where username = '$_POST[username]'
    and password ='$_POST[password]'");

    $cek = mysqli_num_rows($sql);
    if ($cek > 0) {
        $_SESSION['username'] = $_POST['username'];

        echo "<meta http-equiv=refresh content=0;URL='index.php'>";
    } else {
        echo "<p align=center><b>Username Atau Password Anda Salah!</b></p>";
        echo "<meta http-equiv=refresh content=2;URL='login.php'>";
    }
}
?>