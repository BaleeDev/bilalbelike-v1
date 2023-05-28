<?php 
@session_start();   
include '../../database/db.php';

$id_ongkir = $_POST['sprov'];
$metode_pengiriman = $_POST['metode_pembayaran'];
$nama_pembeli = $_POST['nama_pembeli'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$kode_pos = $_POST['kode_pos'];
$alamat = $_POST['alamat'];
$tgl = date("Y-m-d");

$query = mysqli_query($conn, "SELECT * FROM tbl_ongkir WHERE id='$id_ongkir'");    
$data = mysqli_fetch_array($query);
$tarif = $data['tarif'];

$query = mysqli_query($conn, "SELECT max(id) as no_resi FROM tbl_transaksi");    
$data = mysqli_fetch_array($query);
$kodeBarang = $data['no_resi'];

$urutan = (int) substr($kodeBarang, 3, 3);

$urutan++;

$huruf = "BT";
$kodeBarang = $huruf . sprintf("%03s", $urutan);


$total_harga=0;
foreach ($_SESSION['chart'] as $key => $value) {
    $tampil = mysqli_query($conn, "SELECT*FROM tbl_barang WHERE id='$key' ");
    $data = mysqli_fetch_array($tampil);

    $total = $data['harga'] * $value;
    $total_harga += $total;

$simpan= mysqli_query($conn, "INSERT INTO tbl_detail_transaksi (id_transaksi, id_barang, jumlah, total_harga)
VALUES ('$kodeBarang','$key', '$value', '$total_harga')
    ");

}
$sub_total = $total_harga + $tarif;
$status ="belum di peroses";
$simpan= mysqli_query($conn, "INSERT INTO tbl_transaksi (id, id_ongkir,nama_pembeli, no_hp,email,  kode_pos, alamat, metode_pengiriman, total_harga, sub_total, tgl_transaksi, status)
VALUES ('$kodeBarang','$id_ongkir','$nama_pembeli','$no_hp','$email','$kode_pos','$alamat','$metode_pengiriman','$total_harga','$sub_total','$tgl','$status')
    ");

$idt = $conn->insert_id;

$jam = date("H:i:s");
$info = "Pesanan anda sudah di terima oleh penjual";
$status ="Sedang di peroses";
$simpan= mysqli_query($conn, "INSERT INTO tbl_lacak (id_transaksi, tgl, jam, info, status)
VALUES ('$kodeBarang','$tgl', '$jam', '$info','$status')
    ");
echo "<script>alert('No Resi : $kodeBarang Sub total yang harus di bayar Rp. $sub_total');</script>";
unset($_SESSION['chart']);
if($metode_pengiriman !="Transfer"){
echo "<script>location='cek_resi.php';</script>";
}else{
   echo "<script>location='pembayar.php';</script>"; 
}
// echo $kodeBarang;
// echo $total_harga;
?>