<?php 
  session_start();   
  include '../../database/db.php';

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
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 mt-5">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Keranjang Barang</h3>
              </div>
              <form action="bayar.php" class="mb-3">
              <div class="row">
              <?php 

              if (isset($_SESSION['chart'])) {
               
              $qty=0;
              $tot_harga=0;
              foreach ($_SESSION['chart'] as $key => $value) {
              ?>
              <?php 
               $tampil = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE id='$key' ");
               $data = mysqli_fetch_array($tampil);
               
              ?>
                <div class="col-12 col-sm-6 col-md-4 mt-2  d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                    
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?=$data['nama_barang']?></b></h2>
                      <?php 
                
                $total = $data['harga'] * $value;
                $qty += $value; 
                $tot_harga += $total;
                ?>
                <p class="text-muted text-sm"><b><i class="fab fa-shopify"></i> Harga Rp. <?= number_format($data['harga'])?></b></p>
                      
                    </div>
                    <div class="col-5 text-center">
                      <img src="../../uploads/<?=$data['img']?>" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                    <a href="hapus_keranjang.php?id=<?=@$key?>" class="btn btn-outline-danger btn-xs">Hapus <i class="fas fa-trash-alt"></i></a>
                  </div>
                </div>
              </div>
            </div>
             <?php } ?>
            <?php }else{

             ?>
             </div>
             <div><span class="pl-3">Anda Bleum menambahkan barang ke keranjang</span></div>
             <a href="../../index.php" class="pl-3">Yuk Berbelanja dulu</a>
             <?php } ?>
            </div>
            <?php 
            if (isset($_SESSION['chart'])) {
             ?>
            <a href="hapus_keranjang.php?all=semua" class="btn btn-outline-danger btn-xs mb-3">Hapus Semua <i class="fas fa-trash-alt"></i></a>
            <a href="../../index.php" class="btn btn-outline-primary btn-xs mb-3">Cari Barang Lagi..</a>
            <?php } ?>
            </div>
            
              <?php 
              if (isset($_SESSION['chart'])) {
              ?>
            <div class="card card-primary col-md-4 col-12 mt-5">
              <div class="card-header">
                <h3 class="card-title">Ringkasan Belanja</h3>
                 </div>
                 <div class="ringkasan pl-4 mt-3 pr-4">
                 <p>Total Jumlah Barang         :   <?=@$qty?></p>
                <p>Total Harga Barang           : Rp. <?=@ number_format($tot_harga)?></p>
                <hr>
                </div>
                 <div class="container">
                <button type="submit" name="bsimpan" class="btn btn-block btn-outline-primary btn-sm mb-2">Lanjut Ke Pembayaran</button>
                <!-- <button type="button" class="btn btn-block btn-outline-primary btn-sm">Lanjut Ke Pembayaran</button> -->
                </form>
                </div>
        </div>
        <?php } ?>
        </div>

    </div>
<?php include 'Layout/footer.php';?>