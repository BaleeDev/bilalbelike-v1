<?php 
     @session_start();   
     include '../../database/db.php';
     $deletBarang = mysqli_query($conn, "DELETE FROM tbl_barang WHERE `tbl_barang`.`kategori` ='$_GET[id]'" );
     $deletKategori = mysqli_query($conn, "DELETE FROM tbl_kategori WHERE `tbl_kategori`.`id` ='$_GET[id]'" );
     if($deletKategori){
       echo "<script>
       alert('Hapus berhasil');
       document.location='kategori.php';
       </script>";
       }else{
       echo "<script>
       alert('Hapus gagal');
       document.location='kategori.php';
       </script>"; 
       }
    
?>