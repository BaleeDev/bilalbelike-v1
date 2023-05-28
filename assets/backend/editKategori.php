<?php 
     @session_start();   
     include '../../database/db.php';

  
    $id_barang = $_GET['id'];
    
    $tampil = mysqli_query($conn, "SELECT*FROM tbl_kategori WHERE id='$id_barang' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $vnama = $data['nama_kategori'];
    }




    // Jika tombol simpan di klik
    if(isset($_POST['update'])){
        // data disimpan
            
                    $edit= mysqli_query($conn, "UPDATE tbl_kategori set
                    nama_kategori = '$_POST[tbarang]'
                    WHERE id='$_GET[id]'
                        "); 
    
        // data akan disimpan baru
        
            if($edit){
            echo "<script>
            alert('Edit berhasil');
            document.location='kategori.php';
            </script>";
            }else{
            echo "<script>
            alert('Edit gagal');
            document.location='editKategori.php';
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
          <h1 class="m-0">Edit Kategori</h1>
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
                  <h3 class="card-title">Form Edit Kategori</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-border border-width-2"  id="nama_barang" name="tbarang" value="<?=@$vnama?>"  placeholder="Nama Barang" required >
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="row">
                  <div class="col-5"></div>
                  <div class="col-4">
                    <button type="submit" name="update" class="btn btn-outline-dark">Update</button>
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