<?php  
if(isset($_POST['save'])){
	$kp=$_POST['kp'];
	$np=$_POST['np'];
	$hp=$_POST['hp'];
	$sp=$_POST['sp'];
	$halaman=$_GET['halaman'];
	include "../config.php";
	$sqls="insert into produk (kode_produk, nama_produk, harga, stok) values ('$kp', '$np', '$hp','$sp')";
	$simpan=mysqli_query($koneksi,$sqls);
	if($simpan){
		echo "<script>alert('Data Berhasil Disimpan')</script>";
	}else{
		echo "<script>alert('Data Gagal Disimpan')</script>";
	}
}
?>
<meta http-equiv="refresh" content="1;url=index.php?halaman=<?= $halaman ?>">