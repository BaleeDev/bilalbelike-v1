<?php 
  // @session_start();   
  include '../../database/db.php';

  $id_barang = $_GET['barang'];
    
    $tampil = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE id='$id_barang' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $vid = $data['id'];
        $vnama = $data['nama_barang'];
        $vharga = $data['harga'];
        $vkategori = $data['kategori'];
        $vdsc = $data['dsc'];
        $vimg = $data['img'];
    }
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-5">
          <div class="col-sm-6">
            <h1>E-commerce</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">E-commerce</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- isi -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?=@$vnama?></h3>
              <div class="col-12">
                <img src="../../uploads/<?=@$vimg?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <!-- <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div> -->
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?=@$vnama?></h3>
              <p><strong>Detail : <br></strong><?=@$vdsc?></p>

              <hr>
              <!-- <h4>Available Colors</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Green
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Blue
                  <br>
                  <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Purple
                  <br>
                  <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Red
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                  Orange
                  <br>
                  <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
              </div> -->

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Rp. <?=@ number_format($vharga)?>
                </h2>
                <!-- <h4 class="mt-0">
                  <small>Ex Tax: $80.00 </small>
                </h4> -->
              </div>

              <div class="mt-4">
                <a href="keranjang.php?barang=<?=$data['id']?>" class="btn btn-primary btn-lg btn-flat"><i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Beli</a>
                <!-- <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Beli
                </div> -->
                
                <div class="btn btn-default btn-lg btn-flat">
                <a href="keranjang.php?barang=<?=@$vid?>" class="btn btn-navbar" name="keranjang"><i class="fas fa-heart fa-lg mr-2"></i>
                 Tambah Ke Keranjang</a>
                 <!-- <button class="btn btn-navbar" name="keranjang" type="submit"></button> <i class="fas fa-heart fa-lg mr-2"></i>
                  Ke Keranjang -->
                </div>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- end -->
</div>
<?php include 'Layout/footer.php';?>