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
            <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-5">
          <div class="col-sm-6">
            <h1>Kontak</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        
        <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Programmer
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Muhammad Ikbal Tamimi</b></h2>
                      <p class="text-muted text-sm"><b>Tentang : </b> Web Designer / UX / Gamer  </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Lombok Utara, Kecamatan Gangga, Karang Jurang </li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +6283129108636</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../../dist/img/Ikbal.jpeg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="https://wa.me/6283129108638" class="btn btn-sm bg-teal">
                      <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://www.instagram.com/baleedev/" class="btn btn-sm btn-warning">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
              </div>
            </div>
            </div>
            </div>
            </div>
        
        </div>

    </div>
<?php include 'Layout/footer.php';?>