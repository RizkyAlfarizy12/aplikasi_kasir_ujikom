<?php  
if(isset($_POST['save'])){
	$kp=$_POST['kp'];
	$jp=$_POST['jp'];
	$tanggal=date("Y-m-d H:i:s");
	include "../config.php";
	$sqls="insert into tambah_stok (tanggal,kode_produk, jumlah) values ('$tanggal', '$kp', '$jp')";
	$simpan=mysqli_query($koneksi,$sqls);
	if($simpan){
		echo "<script>alert('Data Berhasil Disimpan')</script>";
	}else{
		echo "<script>alert('Data Gagal Disimpan')</script>";
	}
}
?>
<meta http-equiv="refresh" content="1;url=index.php">