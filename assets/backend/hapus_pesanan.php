<?php 
     @session_start();   
     include '../../database/db.php';
     $delet = mysqli_query($conn, "DELETE FROM tbl_transaksi WHERE `tbl_transaksi`.`id` ='$_GET[id]'" );
     if($delet){
       echo "<script>
       alert('Hapus berhasil');
       document.location='pesanan.php';
       </script>";
       }else{
       echo "<script>
       alert('Hapus gagal');
       document.location='pesanan.php';
       </script>"; 
       }
    
?>