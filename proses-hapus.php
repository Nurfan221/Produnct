<?php 

include'koneksi.php';

if(isset($_GET['idp'])){

    $produk = mysqli_query($conn,"SELECT produk_image FROM produk WHERE produk_id = '".$_GET['idp']."' ");

    $p = mysqli_fetch_object($produk);
    unlink('./produk/'.$p->produk_image);

    $delete = mysqli_query($conn, "DELETE FROM produk WHERE produk_id = '".$_GET['idp']."' ");
    echo '<script>window.location="dataproduk.php"</script>';
}
?>