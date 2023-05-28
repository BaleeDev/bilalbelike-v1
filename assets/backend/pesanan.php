<?php 
  @session_start();   
  include '../../database/db.php';
  
  $tgl = date("Y-m-d");
  $jam = date("H:i:s");
  
if(@$_SESSION['Admin']){
?>
<?php include 'Layout/header.php';?>
<div class="content-wrapper">
  <!-- @include('sweetalert::alert') -->
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pesanan</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row my-3">
        <div class="col-12">
          <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No Resi</th>
                    <th>Nama Pembeli</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- @foreach ($barang as $item) -->
                  <?php 
                  $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE status='belum di peroses' order by id desc");
                  if(mysqli_num_rows($tampil)){
                    while($dat= mysqli_fetch_array($tampil)){
                  ?>
                  <tr>
                    <td><?php echo $dat['id']?></td>
                    <td><?php echo $dat['nama_pembeli']?></td>
                    <td><?php echo $dat['tgl_transaksi']?></td>
                    <td><?php echo $dat['metode_pengiriman']?></td>
                    <td>
                        <p class="badge badge-warning"><?php echo $dat['status']?></p></td>
                    <td>
                      <a href="pesanan.php?id=<?=$dat['id']?>" class="badge badge-info">Terima</a>
                      <a href="hapus_pesanan.php?id=<?=$dat['id']?>" class="badge badge-danger">Tolak</a>
                    </td>
                  </tr>
                <?php } 
              }?>
                  <!-- @endforeach -->
                </tbody>
              </table>
              
              <!-- {{$barang->links()}} -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php
        if(isset($_GET['id'])){
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
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>BilalBeleke ART</strong><br>
                    Nusa Tenggara Barat<br>
                    Mataram<br>
                    Wa: +6287893152054<br>
                    Email: messiselviana@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                      <?php
                      $id_barang = $_GET['id'];
    
    $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE id='$id_barang' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $vid_ongkir = $data['id_ongkir'];
        $vmetode_pengiriman = $data['metode_pengiriman'];
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
                    Phone: <?=@$vno_telpon?><br>
                    Email: <?=@$vemail?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Order ID:</b> <?=@$vid_ongkir?>
                </div>
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
      
                     $id_transaksi = $_GET['id'];
      
                 $tampil = mysqli_query($conn, "SELECT*FROM tbl_detail_transaksi WHERE id_transaksi='$_GET[id]' ");
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
                  <?php
                  if($vmetode_pengiriman =="COD"){
                      ?>
                  <img src="../../dist/img/credit/cod.png" alt="Visa" width="14%">
                 <?php }else{
                     ?>
                     <img src="../../dist/img/bca.png" alt="Visa" width="14%">
                 <?php }
                  ?>

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Pembayaran dilakukan ketika barang sudah sampai, tidak perlu membayar kurir karena sudah termasuk kedalam biaya ongkir.
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
                        <th>Total:</th>
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
                  <a href="../../pages/examples/invoice-print.php?id=<?=@$id_transaksi?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <!--<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit-->
                  <!--  Payment-->
                  <!--</button>-->
                  <!--<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">-->
                  <!--  <i class="fas fa-download"></i> Generate PDF-->
                  <!--</button>-->
                </div>
              </div>
            </div>
            
            <?php
            $status = "Sedang di peroses";
            $edit= mysqli_query($conn, "UPDATE tbl_transaksi set
                    status = '$status'
                    WHERE id='$_GET[id]'
                        "); 
                        
            $info ="Pesanan anda sedang di peroses";
            $simpan= mysqli_query($conn, "INSERT INTO tbl_lacak (id_transaksi,tgl, jam,  info, status)
        VALUES ('$_GET[id]','$tgl' ,'$jam' , '$info' ,'$status')
            ");
            
            } ?>
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
<?php }else{
 echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";   
}