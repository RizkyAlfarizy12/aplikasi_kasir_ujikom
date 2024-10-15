<?php  
if(isset($_POST['save'])){
	$kp=$_POST['kp'];
	$np=$_POST['np'];
	$hp=$_POST['hp'];
	$sp=$_POST['sp'];
	$id=$_POST['id'];
	$halaman=$_GET['halaman'];
	include "../config.php";
	$sqle="update produk set kode_produk='$kp', nama_produk='$np', harga='$hp', stok='$sp' where id_produk='$id'";
	$simpan=mysqli_query($koneksi,$sqle);
	if($simpan){
		echo "<script>alert('Data Berhasil Di Edit')</script>";
	}else{
		echo "<script>alert('Data Gagal Di Edit')</script>";
	}
}
?>
<meta http-equiv="refresh" content="1;url=index.php?halaman=<?= $halaman ?>">