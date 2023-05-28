<?php 
     @session_start();   
     include '../../database/db.php';

    // Jika tombol simpan di klik
    if(isset($_POST['bsimpan'])){
        // data disimpan
            
        // data akan disimpan baru
        $simpan= mysqli_query($conn, "INSERT INTO tbl_kategori (nama_kategori)
        VALUES ('$_POST[tbarang]')
            ");
                if($simpan){
                    echo "<script>
                        alert('Simpan berhasil');
                        document.location='kategori.php';
                    </script>";
                }else{
                    echo "<script>
                        alert('Simpan gagal');
                        document.location='tambah_kategori.php';
                    </script>"; 
                }
    }
    if(@$_SESSION['Admin']){
?>
<?php include 'Layout/header.php';?>
<div class="content-wrapper">

   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Kategori</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">Form Tambah Kategori</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-border border-width-2"  id="nama_barang" name="tbarang" value="<?=@$vnama?>"  placeholder="Nama Kategori" required >
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="row">
                  <div class="col-5"></div>
                  <div class="col-4">
                    <button type="submit" name="bsimpan" class="btn btn-outline-dark">Simpan</button>
                </div>
                </div>
                </form>
              </div>
              <!-- /.card -->
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->
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