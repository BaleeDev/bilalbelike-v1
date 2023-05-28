<?php 
 @session_start();   
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
<form action="transaksi.php" method="POST" enctype="multipart/form-data">

    <div class="card card-primary mt-5">
              <div class="card-header">
                <h3 class="card-title">Alamat Pengiriman</h3>
              </div>
  
            <div class="card-body">
                  <input type="text" name="nama_pembeli" class="form-control form-control-border" id="exampleInputBorder" placeholder="Nama Lengkap Sesuai KTP" required>
                  <input type="text" name="no_hp" class="form-control form-control-border" id="exampleInputBorder" placeholder="Nomor Telpon" required>
                  <input type="text" name="email" class="form-control form-control-border" id="exampleInputBorder" placeholder="Email" required>
                  <input type="text" name="kode_pos" class="form-control form-control-border" id="exampleInputBorder" placeholder="Kode Pos" required>
                  <select class="custom-select form-control-border" name="sprov" id="exampleSelectBorder">
                    <option>Pilih Provensi, Kabupaten, Kota (Ongkir)</option>
                    <?php $tampil = mysqli_query($conn, "SELECT*FROM tbl_ongkir "); 
                    if(mysqli_num_rows($tampil)){
                      while($dat= mysqli_fetch_array($tampil)){
                        ?>
                    <option value="<?php echo $dat['id']?>"><?php echo $dat['nama_provensi']?>, <?php echo $dat['nama_kabupaten']?>, <?php echo $dat['nama_kota']?>, Rp. <?php echo number_format($dat['tarif'])?></option>
                    <?php }
                    } ?>
                  </select>
                 
                        <textarea class="form-control" name="alamat" rows="3" placeholder="Isi dengan nama jalan, nomor rumah, nama gedung dsb..."></textarea>
                <label for="">Metode Pembayaran</label>
                  <select class="custom-select form-control-border" name="metode_pembayaran" id="exampleSelectBorder">
                    <option>Metode Pembayaran</option>
                    <option value="COD">COD</option>
                    <option value="Transfer">Transfer</option>
                  </select>
                  <p><strong>Keterangan : </strong><i>Untuk di Luar Pulau Lombok pengiriman maksimal 7 hari kerja</i></p>
                <button name="bpesan" class="btn btn-block btn-outline-primary btn-sm mt-2 mb-1">Pesan</button>
            </div>
  </form>
  </div>
<!-- </form> -->

<?php 

?>
<?php include 'Layout/footer.php';?>