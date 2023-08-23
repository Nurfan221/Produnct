<?php
error_reporting(0);
include 'koneksi.php';

$produk = mysqli_query($conn, "SELECT * FROM produk WHERE produk_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Minimarket</title>
    <link rel="stylesheet" href="style/style3.css">
</head>

<body>
    <header style=" background-image: url(gambar/background.jpg) ; ">
        <img src="gambar/logo.png" alt="" style="width:100px; height:100px; float:left;">
        <div class="container">
            <h1><a href="dasboard.php">PRODUNCH</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
    </header>

    </div>
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->produk_image ?>" width="100%">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->produk_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->produk_pice)  ?></h4>
                    <p>Deskripsi : <br>
                        <?php echo $p->produk_deskripsi ?>
                    </p>
                    <div class="search">
                        <div class="container">
                            <!-- Button trigger modal -->
                            <form action="" method="POST">
                                <button class="button-24 btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="deskripsi" value="Cari-Produk" id="btnlogin" role="button" style="  margin-left: 60px; padding-top:5px;">Beli</button>
                            </form>
                            <?php
                            if (isset($_POST['deskripsi'])) {
                                $d = $_POST['produk_id'];
                            ?>
                                <script>
                                    var yakin = confirm("Apakah kamu yakin ingin membeli?");

                                    if (yakin) {
                                        window.location = "dasboard.php";

                                    } else {

                                    }
                                </script>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <footer>
                <div class="container">
                    <small>Copyright &copy; 2023 - PRODUNCH </small>
                </div>
            </footer>
        </div>
</body>

</html>