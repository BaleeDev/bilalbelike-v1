<?php 
  @session_start();   
  include '../../database/db.php';
  
  $tgl = date("Y-m-d");
  $jam = date("H:i:s");
  
?>
<?php include 'Layout/header.php';?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar fixed-top navbar-expand-md navbar-light navbar-white">
    <div class="container">
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../../index.php" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
                 $dataKategori = mysqli_query($conn,"select * from tbl_kategori");
                 if(mysqli_num_rows($dataKategori)){
                    while($datK= mysqli_fetch_array($dataKategori)){
              ?>
              <a class="dropdown-item " href="../../index.php?hal=tmp&kategori=<?php echo $datK['id']?>"><?php echo $datK['nama_kategori']?></a>
                <?php
                 }
                 }
                ?>
            </div>
          </li>
          <li class="nav-item">
            <a href="beli.php" class="nav-link">Keranjang</a>
          </li>
          <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Layanan</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item " href="cek_resi.php">Lacak Barang</a>
              <a class="dropdown-item" href="pembayar.php">Transaksi</a>
          </li>
          <li class="nav-item">
            <a href="kontak.php" class="nav-link">Kontak</a>
          </li>
          <li class="nav-item">
            <a href="tentang.php" class="nav-link">Tentang</a>
          </li>
          <li class="nav-item">
            <a href="../../logout.php" class="nav-link">Keluar</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3" action="../../index.php" method="POST">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="query1" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" name="cari1" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <a href="../../index3.html" class="navbar-brand">
        <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light"><strong><b>BilalBeleke<i>ART</strong></span>
      </a>
        <!-- Notifications Dropdown Menu -->
        
        
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
<div class="content-wrapper">
  <!-- @include('sweetalert::alert') -->
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-5">
        <div class="col-sm-6">
          <h1 class="m-0">Inputkan No Resi Untuk Melanjutkan Pembayaran Dengan Cara Transfer</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
 <form class="form-inline ml-0 ml-md-3 mb-3 " action="" method="POST">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" value="" name="cek_resi" type="search" placeholder="Nomor Resi Barang" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" name="cek" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        </form>
  <section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row my-3">
        <div class="col-12">
          <div class="card">
           
          </div>
          <!-- /.card -->
        </div>
        <?php
        if(isset($_POST['cek'])){
            $metode_pengiriman = "";
            $id_barang = $_POST['cek_resi'];
            $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE id='$id_barang' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $metode_pengiriman = $data['metode_pengiriman'];
    }
    
    if($metode_pengiriman =="Transfer"){
        ?>
        <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> BilalBeleke ART
                    <small class="float-right">Date: <?=@$tgl?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                      <?php
                      $id_barang = $_POST['cek_resi'];
    
    $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE id='$id_barang' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $vid_ongkir = $data['id_ongkir'];
        $vnama_pembeli = $data['nama_pembeli'];
        $vno_hp = $data['no_hp'];
        $vemail = $data['email'];
        $vkode_pos = $data['kode_pos'];
        $valamat = $data['alamat'];
        $vtotal_harga = $data['total_harga'];
        $vsub_total = $data['sub_total'];
    }
    
    
    $tampi = mysqli_query($conn, "SELECT*FROM tbl_ongkir WHERE id='$vid_ongkir' ");
    $data = mysqli_fetch_array($tampi);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $vnama_provensi = $data['nama_provensi'];
        $vnama_kabupaten = $data['nama_kabupaten'];
        $vnama_kota = $data['nama_kota'];
        $vtarif = $data['tarif'];
    }
                      ?>
                    <strong><?=@$vnama_pembeli?></strong><br>
                    <?=@$vnama_provensi?>, <?=@$vnama_kabupaten?>,<?=@$vnama_kota?><br>
                    <?=@$valamat?>, Kode Pos : <?=@$vkode_pos?><br>
                    Phone: <?=@$vno_hp?><br>
                    Email: <?=@$vemail?>
                  </address>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Nama Barang</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
      
                     $id_transaksi = $_POST['cek_resi'];
                
                 $tampil = mysqli_query($conn, "SELECT*FROM tbl_detail_transaksi WHERE id_transaksi='$_POST[cek_resi]' ");
                 
                     if(mysqli_num_rows($tampil)){
                      while($dat= mysqli_fetch_array($tampil)){
                          $id_barang = $dat['id_barang'];
                          $tampil2 = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE id='$id_barang' ");
                             if(mysqli_num_rows($tampil2)){
                                 while($data= mysqli_fetch_array($tampil2)){
                        ?>
                    <tr>
                      <td><?php echo $data['nama_barang']?></td>
                      <td>Rp. <?php echo number_format($data['harga'])?></td>
                      <td><?php echo $dat['jumlah']?></td>
                      <td>Rp. <?php echo number_format($dat['total_harga'])?></td>
                    </tr>
                    <?php
                                 }
                             }
                      }
                     }
                       
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Metode Pembayaran:</p>
                  <img src="../../dist/img/bca.png" alt="Visa" width="70px"><p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">No Rek : 0562005160 <br>
                  a/n Messi Selviana</p>

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Pesanan anda akan di peroses, jika anda sudah mentransfer uang sesuai dengan total yang harus anda bayar. Saat mengupload bukti pembayaran usahakan foto bukti transaksinya tidak blur atau gambarnya tidak jelas, supaya bisa lebih cepat di proses. <br>
                    Pemrosesan maksimal 1 x 24 jam dari waktu pengiriman bukti transaksi.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp. <?=@ number_format($vtotal_harga)?></td>
                      </tr>
                      <tr>
                        <th>Ongkir:</th>
                        <td>Rp. <?=@ number_format($vtarif)?></td>
                      </tr>
                      <tr>
                        <th>Total yang harus di bayar :</th>
                        <td>Rp. <?=@ number_format($vsub_total)?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <form action="" method="POST" enctype="multipart/form-data">
                      <input type="text" name="id_transaksi" value="<?=@ $id_transaksi?>" hidden >
                    <div class="custom-file">
                        <input type="file" name="foto"class="custom-file-input " id="customFile" >
                   <label class="custom-file-label" for="customFile">Upload Bukti Transaksi</label>
                      </div>
                        <button type="submit" name="bsimpan" class="btn btn-outline-dark mt-2">Konfirmasi</button>
                  </form>
                </div>
              </div>
            </div>
            
            <?php
            
        }else{ ?>
        <h2>Data Tidak Ada!!</h2>
            
       <?php }
            } ?>
            
            <?php
            if(isset($_POST['bsimpan'])){
    
            $vnama = $_FILES['foto']['name'];
            $source = $_FILES['foto']['tmp_name'];
            $folder = '../../uploads/';
            move_uploaded_file($source, $folder.$vnama);
    
     $simpan= mysqli_query($conn, "INSERT INTO tbl_bukti (id_transaksi,img)
        VALUES ('$_POST[id_transaksi]','$vnama')
            ");
                if($simpan){
                    echo "<script>
                        alert('Bukti Transaksi berhasil di kirim, Anda bisa melacak kiriman barang anda');
                        document.location='cek_resi.php';
                    </script>";
                }
}
            ?>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


<?php include 'Layout/footer.php';?>
