<?php
session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimarket</title>
    <link rel="stylesheet" href="style/style3.css">
</head>

<body>
    <header style=" background-image: url(gambar/background.jpg) ; ">
        <img src="gambar/logo.png" alt="" style="width:100px; height:100px; float:left;">
        <div class="container">
            <h1><a href="dasboard.php">PRODUNCH</a></h1>
            <ul>
                <li><a href="dasboard.php">Dasboard</a></li>
                <li><a href="data_produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>

    <div class="selection">
        <div class="container">
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">



                    <input type="text" name="nama" placeholder="Nama Produk" class="input-control" required>
                    <input type="text" name="harga" placeholder="Harga" class="input-control" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea name="deskripsi" class="input-control" placeholder="Deskripsi"></textarea>
                    <input type="text" name="status" placeholder="Produk Status" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $nama       = $_POST['nama'];
                    $harga      = $_POST['harga'];
                    $deskripsi  = $_POST['deskripsi'];
                    $status     = $_POST['status'];

                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'produk' . time() . '.' . $type2;


                    $type_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    if (!in_array($type2, $type_diizinkan)) {
                        echo '<script>alert("Format file tidak diizinkan")</script>';
                    } else {
                        move_uploaded_file($tmp_name, './produk/' . $newname);
                        //query
                        $insert = mysqli_query($conn, "INSERT INTO produk VALUES(
                                null,
                                '" . $nama . "',
                                '" . $harga . "',
                                '" . $deskripsi . "',
                                '" . $newname . "',
                                '" . $status . "',
                                null
                                )");

                        if ($insert) {

                            echo '<script>alert("simpan data berhasil")</script>';
                            echo '<script>window.location="data_produk.php"</script>';
                        } else {
                            echo 'gagal' . mysqli_error($conn);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="container2">
            <small class="kaki">Copyright &copy; 2020 - Warungindo</small>
        </div>
    </footer>
</body>

</html>