<?php 

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
      <div class="row mb-2 mt-5">
        <div class="col-sm-6">
          <h1 class="m-0">Lacak Kiriman Barang Anda</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
<form class="form-inline ml-0 ml-md-3 mb-3" action="" method="POST">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="cek_resi" type="search" placeholder="Nomor Resi Anda" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" name="cek" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
</form>
<?php 
if(isset($_POST['cek'])){
    $id_transaksi = $_POST['cek_resi'];
    $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE id='$id_transaksi' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        $vnama = $data['nama_pembeli'];
        $vtgl = $data['tgl_transaksi'];
    }

?>
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
      
                        
                 $tampil = mysqli_query($conn, "SELECT*FROM tbl_detail_transaksi WHERE id_transaksi='$id_transaksi' ");
                     if(mysqli_num_rows($tampil)){
                      while($dat= mysqli_fetch_array($tampil)){
                          $id_barang = $dat['id_barang'];
                          $tampil2 = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE id='$id_barang' ");
                             if(mysqli_num_rows($tampil2)){
                                 while($data= mysqli_fetch_array($tampil2)){
                                  $total = $dat['jumlah']*$data['harga'];   
                        ?>
                    <tr>
                      <td><?php echo $data['nama_barang']?></td>
                      <td>Rp. <?php echo number_format($data['harga'])?></td>
                      <td><?php echo $dat['jumlah']?></td>
                      <td>Rp. <?php echo number_format($total)?></td>
                    </tr>
                    <?php
                                 }
                             }
                      }
                     }
                    ?>
                    </tbody>
                    
                    <?php 
                    $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE id='$id_transaksi' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        $id_ongkir = $data['id_ongkir'];
       $vsub_total = $data['sub_total'];
    }
                    $tampil = mysqli_query($conn, "SELECT*FROM tbl_ongkir WHERE id='$id_ongkir' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        $tarif = $data['tarif'];
    }
                    ?>
                    <tfoot>
                        <td colspan="3">Sub Total</td>
                        <td>Rp. <?=@ number_format($vsub_total)?></td>
                    </tfoot>
                    <tfoot>
                        <td colspan="3">Ongkir</td>
                        <td>Rp. <?=@ number_format($tarif)?></td>
                    </tfoot>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red"><?=@$vtgl?></span>
                <span class=""><?=@$vnama?></span>
              </div>
              <?php $tampil = mysqli_query($conn, "SELECT*FROM tbl_lacak WHERE id_transaksi='$id_transaksi' "); 
                    if(mysqli_num_rows($tampil)){
                      while($dat= mysqli_fetch_array($tampil)){
                        ?>
              <div>
                <i class="fas fa-truck-moving bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <?php echo $dat['tgl']?> : <?php echo $dat['jam']?></span>
                  <h3 class="timeline-header no-border"><a href="#"></a> <?php echo $dat['info']?> </h3>
                  <?php 
                  $stts = $dat['info']; 
                  ?>
                </div>
              </div>
              <?php }
            } 
            ?>
    </section>
    <?php
    if($stts == "Barang sudah sampai di rumah anda"){
        ?>
        <div class="row">
        <div class="col-12 col-md-12">
    <a href="cek_resi.php?id=<?=@$id_transaksi?>" class="btn btn-primary">Konfirmasi Barang sudah di terima</a>
    </div>
    </div>
            <?php } ?>
    <!-- /.content -->
<?php } ?>
<?php
if(isset($_GET['id'])){
            $tgl = date("Y-m-d");
            $jam = date("H:i:s");
            $info ="Barang sudah diterima";
            $simpan= mysqli_query($conn, "INSERT INTO tbl_lacak (id_transaksi,tgl, jam,  info, status)
        VALUES ('$_GET[id]','$tgl' ,'$jam' , '$info' ,'$info')
            ");
            echo "<script>
       alert('Konfirmasi Penerimaan berhasil');
       document.location='cek_resi.php';
       </script>";
        }
?>
<?php include 'Layout/footer.php';?>