<?php 
     @session_start();   
     include '../../database/db.php';

    // Jika tombol simpan di klik
    if(isset($_POST['bsimpan'])){
        // data disimpan
            
            $vnama = $_FILES['foto']['name'];
            $source = $_FILES['foto']['tmp_name'];
            $folder = '../../uploads/';
            move_uploaded_file($source, $folder.$vnama);
    
        // data akan disimpan baru
        $simpan= mysqli_query($conn, "INSERT INTO tbl_barang (nama_barang,harga, kategori,  dsc, img)
        VALUES ('$_POST[tbarang]','$_POST[tharga]' ,'$_POST[tkategori]' , '$_POST[tdeskripsi]' ,'$vnama')
            ");
                if($simpan){
                    echo "<script>
                        alert('Simpan berhasil');
                        document.location='barang.php';
                    </script>";
                }else{
                    echo "<script>
                        alert('Simpan gagal');
                        document.location='tambah_barang.php';
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
          <h1 class="m-0">Tambah Barang</h1>
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
                  <h3 class="card-title">Form Tambah Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-border border-width-2"  id="nama_barang" name="tbarang" value="<?=@$vnama?>"  placeholder="Nama Barang" required >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-border border-width-2 " id="harga_barang" name="tharga" value="<?=@$vharga?>" placeholder="Harga Barang Rp." required>
                    </div>
                    <div class="form-group">
                       <select class="custom-select form-control-border border-width-2 " name="tkategori" id="kategori_barang">
                        <?php
                        $data = mysqli_query($conn,"select * from tbl_kategori");
                           if(mysqli_num_rows($data)){
                            while($dat= mysqli_fetch_array($data)){
                        ?>
                          <option value="<?php echo $dat['id']?>"><?php echo $dat['nama_kategori']?></option>
                            <?php
                            }
                          }
                          ?>
                            </select>  
                        </select>
                      </div>
                      <div class="form-group">
                        <textarea class="form-control form-control-border border-width-2 " rows="3" name="tdeskripsi" placeholder="Deskripsi Barang ..." required><?=@$vdsc?></textarea>
                      </div>
                      <div class="custom-file">
                        <input type="file" name="foto"class="custom-file-input " id="customFile" >
                   <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                      </div>
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