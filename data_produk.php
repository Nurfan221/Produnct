<?php
session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login_admin.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <li><a href="produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <div class="selection">
        <h3>Data Produk</h3>
        <div class="box">
            <p><a href="tambah-Produk.php">Tambah data</a></p>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>deskripsi</th>
                        <th>Gambar</th>
                        <th>Jumlah sisa</th>

                    </tr>



                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY produk_id DESC");
                    if (mysqli_num_rows($produk) > 0) {
                        while ($row = mysqli_fetch_array($produk)) {

                    ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['produk_name'] ?></td>
                                <td> Rp.<?php echo number_format($row['produk_pice']) ?></td>
                                <td><?php echo $row['produk_deskripsi'] ?></td>
                                <td><img src="produk/<?php echo $row['produk_image'] ?>" width="100px" class="img"></td>
                                <td><?php echo $row['produk_status'] ?></td>
                                <td>
                                    <a href="edit-produk.php ?id=<?php echo $row['produk_id'] ?>">Edit</a>||<a href="
    proses-hapus.php?idp=<?php echo $row['produk_id'] ?>" onclick="return confirm('Yakin ingin hapus')">Hapus</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="7">Tidak ada data</td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
    <footer>
        <div class="container2">
            <small class="kaki">Copyright &copy; 2023 - PRODUNCH</small>
        </div>
    </footer>
</body>

</html>