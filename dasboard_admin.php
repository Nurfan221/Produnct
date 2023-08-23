<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login_admin.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PRODUNCH</title>
    <link rel="stylesheet" href="style/style3.css">
</head>

<body>
    <header style=" background-image: url(gambar/background.jpg) ; ">
        <img src="gambar/logo.png" alt="" style="width:100px; height:100px; float:left;">
        <div class="container">
            <h1><a href="dasboard_admin.php">PRODUNCH</a></h1>
            <ul>
                <li><a href="dasboard_admin.php">Dasboard</a></li>
                <li><a href="data_produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>

    <div class="selection">
        <div class="container">
            <h3>Dasboard</h3>
            <div class="box">
                <h4>Selamat Datang </h4>
            </div>
        </div>
    </div>




    <footer>
        <div class="container2">
            <small class="kaki">Copyright &copy; 2023 - PRODUNCH</small>
        </div>
    </footer>
</body>

</html>