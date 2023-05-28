<?php 
session_start();
$id_barang = $_GET['barang'];
if (isset($_GET['barang']) && is_numeric($_GET['barang'])) {
    if (isset($_SESSION['chart'][$_GET['barang']])) {
     $_SESSION['chart'][$_GET['barang']]++;
    }else {
     $_SESSION['chart'][$_GET['barang']] =1; 
    }
   }

   echo "<script>alert('Produk Berhasil di tambahkan ke keranjang');</script>";
   echo "<script>location='beli.php';</script>";
?>