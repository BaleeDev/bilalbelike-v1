<?php 
     @session_start();   
     include '../../database/db.php';
     $delet = mysqli_query($conn, "DELETE FROM tbl_barang WHERE `tbl_barang`.`id` ='$_GET[id]'" );
     if($delet){
       echo "<script>
       alert('Hapus berhasil');
       document.location='barang.php';
       </script>";
       }else{
       echo "<script>
       alert('Hapus gagal');
       document.location='barang.php';
       </script>"; 
       }
    
?>