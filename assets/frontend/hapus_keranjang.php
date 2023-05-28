<?php 
session_start(); 
if(isset($_GET['id'])){
    $id_k = $_GET['id'];
    unset($_SESSION['chart'][$id_k]);
    
}elseif (isset($_GET['all'])) {
    session_destroy();
    
} 
echo "<script>alert('Produk Berhasil di Hapus dari keranjang');</script>";
echo "<script>location='beli.php';</script>";

?>