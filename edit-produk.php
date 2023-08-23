<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
    $produk = mysqli_query($conn,"SELECT * FROM produk WHERE produk_id = '".$_GET['id']. "' ");
    if(mysqli_num_rows($produk)== 0){
        echo '<script>window.location="dataproduk.php"</script>';
    }
    $p  = mysqli_fetch_object($produk);
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
<header  style=" background-image: url(gambar/background.jpg) ; ">
<img src="gambar/logo.png" alt="" style="width:100px; height:100px; float:left;">
<div class="container">
<h1><a href="dasboard_admin.php">PRODUNCH</a></h1>
<ul>
<li><a href="dasboard_admin.php">Dasboard</a></li>
<li><a href="dataproduk.php">Data Produk</a></li>
<li><a href="keluar.php">Keluar</a></li>
</ul>
</div>
</header>

<div class="selection">
    <div class="container">
        <h3>Edit Data Produk</h3>
        <div class="box">
            <form action="" method="POST" enctype ="multipart/form-data">
            
            
            
            <input type="text" name="nama" placeholder="Nama Produk" class="input-control" value ="<?php echo $p->
            produk_name ?>" required>
            <input type="text" name="harga" placeholder="Harga" class="input-control" value ="<?php echo $p->
            produk_pice ?>"required>


            <img src="produk/<?php echo $p-> produk_image ?>"width="100px" >
            <input type="hidden" name="foto" value = "<?php echo $p->produk_image ?>">
            <input type="file" name="gambar"  class="input-control" >
            <textarea name="deskripsi" class="input-control" placeholder = "Deskripsi"><?php echo $p->
            produk_deskripsi ?></textarea>
            <input type="text" name="status" placeholder="Produk Status" class="input-control" value ="<?php echo $p->
            produk_status ?>"required>
            <input class="button-24" type="submit" name="submit" value="Submit" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){

                $nama       = $_POST['nama'];
                $harga      = $_POST['harga'];
                $deskripsi  = $_POST['deskripsi'];
                $status     = $_POST['status'];
                $foto       = $_POST['foto'];

                $filename =$_FILES['gambar']['name'];
                $tmp_name =$_FILES['gambar']['tmp_name'];

                 $type1 = explode('.', $filename);
                 $type2 = $type1[1];

                 $newname = 'produk'.time().'.'.$type2;
                 $type_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                if($filename !=  ''){

                    if(!in_array($type2, $type_diizinkan)){
                        echo '<script>alert("Format file tidak diizinkan")</script>';
                    }else{
                        unlink('./produk/'.$foto);
                        move_uploaded_file($tmp_name, './produk/'.$newname);
                        $namagambar = $username;
                    }
                }else{
                    $namagambar = $foto;

                }
                        //querry
                $update = mysqli_query($conn,"UPDATE produk SET
                                        produk_name = '".$nama."',
                                        produk_pice = '".$harga."',
                                        produk_deskripsi = '".$deskripsi."',
                                        produk_image = '".$namagambar."',
                                        produk_status = '".$status."'
                                        WHERE produk_id = '".$p->produk_id."'
                ");

                if($update){
                                    
                    echo '<script>alert("ubah data berhasil")</script>';
                    echo '<script>window.location="data_produk.php"</script>';
                }else{
                    echo 'gagal'.mysqli_error($conn);
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