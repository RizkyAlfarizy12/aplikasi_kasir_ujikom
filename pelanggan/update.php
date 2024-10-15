<?php  
if(isset($_POST['save'])){
	$kode_pelanggan=$_POST['kode_pelanggan'];
	$nama_pelanggan=$_POST['nama_pelanggan'];
	$alamat=$_POST['alamat'];
	$no_hp=$_POST['no_hp'];
	$id=$_POST['id'];
	$halaman=$_GET['halaman'];
	include "../config.php";
	$sqle="update pelanggan set kode_pelanggan='$kode_pelanggan', nama_pelanggan='$nama_pelanggan', alamat='$alamat', no_hp='$no_hp' where id_pelanggan='$id'";
	$simpan=mysqli_query($koneksi,$sqle);
	if($simpan){
		echo "<script>alert('Data Berhasil Di Edit')</script>";
	}else{
		echo "<script>alert('Data Gagal Di Edit')</script>";
	}
}
?>
<meta http-equiv="refresh" content="1;url=index.php?halaman=<?= $halaman ?>">