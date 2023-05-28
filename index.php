<?php 
//  @session_start();   
@session_start(); 
 include 'database/db.php';
 if(@$_SESSION['User']){
?>
<?php include 'dist/frontend/Layout/header.php';?>
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
            <a href="index.php" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
                 $data = mysqli_query($conn,"select * from tbl_kategori");
                 if(mysqli_num_rows($data)){
                    while($dat= mysqli_fetch_array($data)){
              ?>
              <a class="dropdown-item " href="index.php?hal=tmp&kategori=<?php echo $dat['id']?>"><?php echo $dat['nama_kategori']?></a>
                <?php
                 }
                 }
                ?>
          </li>
          <li class="nav-item">
            <a href="assets/frontend/beli.php" class="nav-link">Keranjang</a>
          </li>
          <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Layanan</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item " href="assets/frontend/cek_resi.php">Lacak Barang</a>
              <a class="dropdown-item" href="assets/frontend/pembayar.php">Transaksi</a>
          </li>
          <li class="nav-item">
            <a href="assets/frontend/kontak.php" class="nav-link">Kontak</a>
          </li>
          <li class="nav-item">
            <a href="assets/frontend/tentang.php" class="nav-link">Tentang</a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">Keluar</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3" action="" method="POST">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="query" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" name="cari" type="submit">
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
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner mt-5">
    <div class="carousel-item active">
      <img class="d-block w-100" src="dist/img/baner.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="dist/img/baner2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="dist/img/baner3.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="dist/img/baner4.jpg" alt="four slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!-- isi -->
<div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
          <?php 
          
          $batas = 6;
          $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
          $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
          $previous = $halaman - 1;
          $next = $halaman + 1;
          
          

          // $cari1 = $query1;
          if(isset($_POST['cari'])){
            $query = $_POST['query'];
            if($query !=''){
            //   $tampil = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE nama_barang LIKE '%".$query."%' ");
            $data = mysqli_query($conn,"SELECT*FROM tbl_barang WHERE nama_barang LIKE '%".$query."%' ");
          $jumlah_data = mysqli_num_rows($data);
          $total_halaman = ceil($jumlah_data / $batas);
        //   $tampil = mysqli_query($conn,"select * from tbl_barang limit $halaman_awal, $batas");
          $tampil = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE nama_barang LIKE '%".$query."%' order by id desc limit $halaman_awal, $batas");
          $nomor = $halaman_awal+1;
          }
        }elseif (isset($_POST['cari1'])) {
          $cari1 = $_POST['query1'];
          if ($cari1 !='') {
            
            // $tampil = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE nama_barang LIKE '%".$cari1."%' "); 
             $data = mysqli_query($conn,"SELECT*FROM tbl_barang WHERE nama_barang LIKE '%".$cari1."%' ");
          $jumlah_data = mysqli_num_rows($data);
          $total_halaman = ceil($jumlah_data / $batas);
        //   $tampil = mysqli_query($conn,"select * from tbl_barang limit $halaman_awal, $batas");
          $tampil = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE nama_barang LIKE '%".$cari1."%' order by id desc limit $halaman_awal, $batas");
          $nomor = $halaman_awal+1;
          }
        }elseif(isset($_GET['hal'])){
            if($_GET['hal']= "tmp"){
                $data = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE kategori='$_GET[kategori]'");
                $jumlah_data = mysqli_num_rows($data);
          $total_halaman = ceil($jumlah_data / $batas);
                $tampil = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE kategori='$_GET[kategori]' order by id desc limit $halaman_awal, $batas");
        //   $tampil = mysqli_query($conn,"select * from tbl_barang limit $halaman_awal, $batas");
          $nomor = $halaman_awal+1;
            }
        }else{
        //   $tampil = mysqli_query($conn, "SELECT*FROM tbl_barang order by id desc limit 6");
        $data = mysqli_query($conn,"select * from tbl_barang");
          $jumlah_data = mysqli_num_rows($data);
          $total_halaman = ceil($jumlah_data / $batas);
          $tampil = mysqli_query($conn,"select * from tbl_barang order by id desc limit $halaman_awal, $batas");
          $nomor = $halaman_awal+1;
        }
            if(mysqli_num_rows($tampil)){
              while($dat= mysqli_fetch_array($tampil)){
            ?>
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                <strong>Kategori : </strong><?php echo $dat['kategori']?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                    <h2 class="lead"><b><?php echo $dat['nama_barang']?></b></h2>
                      <p class="text-muted text-sm">Detail: </b> <?php echo substr($dat['dsc'],0,10)?>...</p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-money-bill-wave-alt"></i></span> Harga: Rp.<?php echo number_format($dat['harga'])?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="uploads/<?php echo $dat['img']?>" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                  <a href="assets/frontend/keranjang.php?barang=<?=$dat['id']?>" class="btn btn-sm bg-teal">
                    <i class="fab fa-shopify"></i> Beli
                    </a>
                    <a href="assets/frontend/detail.php?barang=<?=$dat['id']?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-tag"></i> Detail
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?php } } ?>
            
        </div>
        </div>
</div>
<!-- end -->
<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
<?php include 'dist/frontend/Layout/footer.php';?>
<?php }else{
 echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";   
}
?>