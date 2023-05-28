<?php 
     @session_start();   
     include '../../database/db.php';
     
     $edit= mysqli_query($conn, "UPDATE tbl_transaksi set
                   status = 'pesanan diterima'
                    WHERE id='$_GET[id]'
                        ");
     
    
     if($edit){
       echo "<script>
       alert('Konfirmasi penerimaan berhasil');
       document.location='status.php';
       </script>";
       }else{
       echo "<script>
       alert('Konfirmasi penerimaan gagal');
       document.location='status.php';
       </script>"; 
       }
    
?>