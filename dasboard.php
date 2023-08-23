<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PRODUNCH</title>
    <link rel="stylesheet" href="style/style3.css">
    <script type="text/javascript" src="jquery.js"></script>
</head>

<body>
    <header style=" background-image: url(gambar/background.jpg) ; ">
        <img src="gambar/logo.png" alt="" style="width:100px; height:100px; float:left;">
        <div class="container">

            <h1><a href="dasboard.php">PRODUNCH</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="cetak_kartu.php">Cetak Kartu</a></li>
            </ul>
        </div>
    </header>

    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="sc" placehorder="Cari Produk">

                <button class="button-24" name="cari" value="Cari-Produk" id="btnlogin" role="button">Cari</button>

            </form>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                $produk = mysqli_query($conn, "SELECT * FROM produk WHERE produk_status !=0 ORDER BY produk_id DESC LIMIT 4");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {

                ?>

                        <a href="deskripsi.php?id=<?php echo $p['produk_id'] ?>">
                            <div class="col-5">
                                <div class="gmbrprdk" style=" height:200px">
                                    <img src="produk/<?php echo $p['produk_image'] ?>">
                                </div>
                                <div class="deskripsi" style=" height:170px">

                                    <div class="deskripsi1" style=" height:100px">
                                        <p class="nama"><?php echo substr($p['produk_name'], 0, 20) ?></p>
                                        <p class="harga">Rp.<?php echo number_format($p['produk_pice']) ?></p>
                                    </div>

                                    <div class="deskripsi2" style=" height:50px">
                                        <!-- Button trigger modal -->
                                        <form action="" method="POST">
                                            <button class="button-24" name="deskripsi" value="Cari-Produk" id="btnlogin" role="button" style="  margin-left: 60px; padding-top:5px;">Deskripsi</button>
                                        </form>
                                        <?php
                                        if (isset($_POST['deskripsi'])) {
                                            $d = $_POST['produk_id'];
                                            header('location: deskripsi.php');
                                        }
                                        ?>




                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <P>Produk tidak ada</P>
                <?php } ?>
            </div>
        </div>
    </div>

    <div>
        <footer>
            <div class="container">
                <small>Copyright &copy; 2023 - Produnch </small>
            </div>
        </footer>
    </div>
</body>


</html>