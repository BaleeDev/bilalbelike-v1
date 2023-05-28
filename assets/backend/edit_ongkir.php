<?php 
     @session_start();   
     include '../../database/db.php';

  
    $id_barang = $_GET['id'];
    
    $tampil = mysqli_query($conn, "SELECT*FROM tbl_ongkir WHERE id='$id_barang' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $vnama_kabupaten = $data['nama_kabupaten'];
        $vnama_provensi = $data['nama_provensi'];
        $vnama_kota = $data['nama_kota'];
        $vtarif = $data['tarif'];
        
    }



    // Jika tombol simpan di klik
    if(isset($_POST['update'])){
        // data disimpan
            
                    $edit= mysqli_query($conn, "UPDATE tbl_ongkir set
                    nama_kabupaten = '$_POST[tnama_kabupaten]',
                    nama_provensi = '$_POST[tprovensi]',
                    nama_kota = '$_POST[tnama_kota]',
                    tarif = '$_POST[ttarif]'
                    WHERE id='$_GET[id]'
                        "); 
                
    
        // data akan disimpan baru
        
            if($edit){
            echo "<script>
            alert('Edit berhasil');
            document.location='ongkir.php';
            </script>";
            }else{
            echo "<script>
            alert('Edit gagal');
            document.location='edit_ongkir.php';
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
          <h1 class="m-0">Edit Ongkir</h1>
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
                  <h3 class="card-title">Form Edit Ongkir</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                       <select class="custom-select form-control-border border-width-2 " name="tprovensi" id="kategori_barang">
                          <!--<option >Pilih Provensi</option>-->
                           <option value="<?=@$vnama_provensi?>" ><?=@$vnama_provensi?></option> 
                            <option value="Aceh">Aceh</option>
                            <option value="Bali">Bali</option>
                            <option value="Bangka Belitung">Bangka Belitung</option>
                            <option value="Banten">Banten</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="Lampung">Lampung</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Maluku Utara">Maluku Utara</option>
                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                            <option value="Papua">Papua</option>
                            <option value="Papua Barat">Papua Barat</option>
                            <option value="Riau">Riau</option>
                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Sumatera Barat">Sumatera Barat</option>
                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                            <option value="Sumatera Utara">Sumatera Utara</option>
                            <option value="Yogyakarta">Yogyakarta</option> 
                        </select>
                      </div>
                     <div class="form-group">
                        <input type="text" class="form-control form-control-border border-width-2"  id="nama_kota" name="tnama_kabupaten" value="<?=@$vnama_kabupaten?>"  placeholder="Nama Kabupaten" required >
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control form-control-border border-width-2"  id="nama_kota" name="tnama_kota" value="<?=@$vnama_kota?>"  placeholder="Nama Kota" required >
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control form-control-border border-width-2"  id="nama_kota" name="ttarif" value="<?=@$vtarif?>"  placeholder="Tarif" required >
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