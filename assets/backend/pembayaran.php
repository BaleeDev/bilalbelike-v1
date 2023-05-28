<?php 
  @session_start();   
  include '../../database/db.php';
if(@$_SESSION['Admin']){
    
?>
<?php include 'Layout/header.php';?>
<div class="content-wrapper">
  <!-- @include('sweetalert::alert') -->
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Bukti Pembayaran</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row my-3">
        <div class="col-12 col-md-4">
          <form class="form-inline ml-0 ml-md-3 mb-3" action="" method="POST">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar"  name="cek_resi" type="search" placeholder="Nomor Resi Barang" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" name="cek" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        </form>
          <!-- /.card -->
        </div>
         
         <!-- /.card-header -->
        
      </div>
      <!-- /.row -->
      <?php
      if(isset($_POST['cek'])){
          $id_barang = $_POST['cek_resi'];
          $tampil = mysqli_query($conn, "SELECT*FROM tbl_bukti WHERE id_transaksi='$id_barang' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $vimg = $data['img'];
    }else{
       $vimg = ""; 
    }
    if($vimg !=""){
      ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-2 col-md-2"></div>
          <div class="col-8 col-md-8">
                        <img src="../..//uploads/<?=@$vimg?>" class="img-fluid mb-2" width="100%" alt="white sample"/>
          </div>
         </div>
     </div>
      
      <?php
       } else{?>
       <h2>Belum ada bukti pembayaran atau data tidak ada.</h2>
     <?php  }
       }?>
      
    </div><!-- /.container-fluid -->
</section>

<!-- /.content -->
</div>

<?php include 'Layout/footer.php';?>
<?php }else{
 echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";   
}