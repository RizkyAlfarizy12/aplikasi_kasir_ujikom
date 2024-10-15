<?php  
if(isset($_POST['save'])){
	$kode_pelanggan=$_POST['kode_pelanggan'];
	$nama_pelanggan=$_POST['nama_pelanggan'];
	$alamat=$_POST['alamat'];
	$no_hp=$_POST['no_hp'];
	$halaman=$_GET['halaman'];
	include "../config.php";
	$sqls="insert into pelanggan (kode_pelanggan, nama_pelanggan, alamat, no_hp) values ('$kode_pelanggan', '$nama_pelanggan', '$alamat','$no_hp')";
	$simpan=mysqli_query($koneksi,$sqls);
	if($simpan){
		echo "<script>alert('Data Berhasil Disimpan')</script>";
	}else{
		echo "<script>alert('Data Gagal Disimpan')</script>";
	}
}
?>
<meta http-equiv="refresh" content="1;url=index.php?halaman=<?= $halaman ?>">