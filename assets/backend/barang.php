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
          <h1 class="m-0">Data Barang</h1>
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
             <a href="tambah_barang.php" class="btn btn-outline-dark">Tambah Barang</a>
             
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga Rp.</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- @foreach ($barang as $item) -->
                  <?php 
                  $no = 1;
                  $tampil = mysqli_query($conn, "SELECT*FROM tbl_barang ");
                  if(mysqli_num_rows($tampil)){
                    while($dat= mysqli_fetch_array($tampil)){
                      $vkategori = $dat['kategori'];
                      $tampilKategori = mysqli_query($conn, "SELECT*FROM tbl_kategori WHERE id='$vkategori' ");
                      $dataKategori = mysqli_fetch_array($tampilKategori);
                      if($dataKategori)
                      {
                          //jika data ditemukan maka data di tampung dulu ke variabel
                          $vNamaKategori = $dataKategori['nama_kategori'];
                      }
                  ?>
                  <tr>
                    <td><?= $no++?></td>
                    <td><?php echo $dat['nama_barang']?></td>
                    <td>Rp. <?php echo $dat['harga']?></td>
                    <td><?php echo $vNamaKategori?></td>
                    <td><?php echo substr($dat['dsc'],0,10)?>...</td>
                    <td>
                    <img src="../../uploads/<?php echo $dat['img']?>" width="70px" alt="">
                    </td>
                    <td>
                      <a href="edit.php?id=<?=$dat['id']?>" class="badge badge-info">Edit</a>
                      <a href="hapus.php?id=<?=$dat['id']?>" id="hapus" data-id="{{$item->id}}" data-token="{{csrf_token()}}" data-url="{{route('barang.destroy',[$item->id])}}" data-target="#delete" class="badge badge-danger">Hapus</a>
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