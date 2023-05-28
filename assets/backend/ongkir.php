<?php 
  @session_start();   
  include '../../database/db.php';
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
          <h1 class="m-0">Data Ongkir</h1>
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
            <div class="card-header">
             <a href="tambah_ongkir.php" class="btn btn-outline-dark">Tambah Ongkir</a>
             
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Provensi</th>
                    <th>Nama Kabupaten</th>
                    <th>Nama Kota</th>
                    <th>Tarif</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- @foreach ($barang as $item) -->
                  <?php 
                  $no = 1;
                  $tampil = mysqli_query($conn, "SELECT*FROM tbl_ongkir order by id desc");
                  if(mysqli_num_rows($tampil)){
                    while($dat= mysqli_fetch_array($tampil)){
                  ?>
                  <tr>
                    <td><?= $no++?></td>
                    <td><?php echo $dat['nama_provensi']?></td>
                    <td><?php echo $dat['nama_kabupaten']?></td>
                    <td><?php echo $dat['nama_kota']?></td>
                    <td>Rp. <?php echo number_format($dat['tarif'])?></td>
                    <td>
                      <a href="edit_ongkir.php?id=<?=$dat['id']?>" class="badge badge-info">Edit</a>
                      <a href="hapus_ongkir.php?id=<?=$dat['id']?>" id="hapus" data-id="{{$item->id}}" data-token="{{csrf_token()}}" data-url="{{route('barang.destroy',[$item->id])}}" data-target="#delete" class="badge badge-danger">Hapus</a>
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