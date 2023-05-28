<?php 
     @session_start();   
     include '../../database/db.php';
     $delet = mysqli_query($conn, "DELETE FROM tbl_ongkir WHERE id='$_GET[id]'" );
     if($delet){
       echo "<script>
       alert('Hapus berhasil');
       document.location='ongkir.php';
       </script>";
       }else{
       echo "<script>
       alert('Hapus gagal');
       document.location='ongkir.php';
       </script>"; 
       }
    
?>