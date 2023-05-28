<?php 
  @session_start();   
  include '../../database/db.php';
if(@$_SESSION['Admin']){
   
   $id_transaksi ="";
   if(isset($_POST['update'])){
       
   $tgl = date("Y-m-d");
   $jam = date("H:i:s");
   $cek ="Barang sudah diterima";
   $status ="";
   if($cek == $_POST['tinfo']){
      $status = "Barang sudah di terima"; 
   }else{
        $status = "Sedang di peroses";
   }
       
        $simpan= mysqli_query($conn, "INSERT INTO tbl_lacak (id_transaksi,tgl, jam,  info, status)
        VALUES ('$_POST[tid_transaksi]','$tgl' ,'$jam' , '$_POST[tinfo]' ,'$status')
            ");
   }
   
?>
<?php include 'Layout/header.php';?>
<div class="content-wrapper">
  <!-- @include('sweetalert::alert') -->
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pengiriman Barang</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row my-3">
        <div class="col-12 col-md-4">
          <form class="form-inline ml-0 ml-md-3 mb-3 mt-5" action="" method="POST">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" value="<?= $id_transaksi?>" name="cek_resi" type="search" placeholder="Nomor Resi Barang" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar " name="cek" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        </form>
          <!-- /.card -->
        </div>
         <div class="col-12 col-md-8">
             <form class="form-inline ml-0 ml-md-3 mb-3 mt-5" action="" method="POST">
                 <?php
                 $res ='';
                 if(isset($_POST['cek'])){
                     $res = $_POST['cek_resi'];
                 }else{
                     $res= $id_transaksi;
                 }
                 ?>
            <div class="form-group mr-2">
                <input type="text" name="tid_transaksi" value="<?=@$res?>" class="form-control"   >
            </div>
            <div class="form-group">
             <select class="custom-select form-control-border border-width-2 " name="tinfo" id="kategori_barang">  <option value="Barang siap untuk dikirim">Barang siap untuk dikirim</option>
                 <option value="Barang sedang dalam perjalanan">Barang sedang dalam perjalanan</option> 
                 <option value="Barang sudah sampai didaerah anda">Barang sudah sampai didaerah anda</option> 
                 <option value="Barang sudah sampai di rumah anda">Barang sudah sampai di rumah anda</option> 
                 <option value="Barang sudah diterima">Barang sudah diterima</option> 
             </select>
            </div>
            <button class="btn btn-outline-primary ml-2 mt-2" name="update">Update Pengiriman</button>
        </form>
         </div>
         <!-- /.card-header -->
         <?php
         if(isset($_POST['cek']) || isset($_POST['update'])){
             
             if(!isset($_POST['cek_resi'])){
                 $id_transaksi = $_POST['tid_transaksi'];
             }else{
              $id_transaksi = $_POST['cek_resi'];   
             }
         ?>
         
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Info</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- @foreach ($barang as $item) -->
                  <?php 
                  $tampil = mysqli_query($conn, "SELECT*FROM tbl_lacak WHERE id_transaksi='$id_transaksi' order by id desc");
                  if(mysqli_num_rows($tampil)){
                    while($dat= mysqli_fetch_array($tampil)){
                        
                        
                  ?>
                  <tr>
                    <td><?php echo $dat['tgl']?></td>
                    <td><?php echo $dat['jam']?></td>
                    <td><?php echo $dat['info']?></td>
                    <?php
                    if($dat['status'] == "Barang sudah diterima"){
                    ?>
                    <td><a href="konfirmasi.php?id=<?=@$res?>"  class="badge btn-primary">Konfirmasi</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $stts = $dat['status'];
                  ?>
                <?php } 
              }?>
                  <!-- @endforeach -->
                </tbody>
              </table>
              <!-- {{$barang->links()}} -->
    
    
   
            </div>
            <!-- /.card-body -->
            <?php } ?>
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