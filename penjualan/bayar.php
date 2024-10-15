<?php  
session_start();
if(isset($_POST['save'])){
	$jmltotal=$_POST['jmltotal'];
	$bayar=$_POST['bayar'];
	$penid=$_SESSION['penid'];
	$id_petugas=$_SESSION['id_petugas'];
	$nama_petugas=$_SESSION['nama_petugas'];
	if($bayar<$jmltotal){
		echo "<script>alert('Jumlah Bayar Kurang dari $jmltotal !')</script>";
	}else{
	include "../config.php";
	$sqls="update penjualan set total_harga='$jmltotal', bayar='$bayar', id_petugas='$id_petugas', nama_petugas='$nama_petugas' where penjualan_id='$penid'";
	$simpan=mysqli_query($koneksi,$sqls);
	$_SESSION['bayar']=$bayar;
	$_SESSION['jmltotal']=$jmltotal;
	}
}
?>
<meta http-equiv="refresh" content="1;url=transaksi.php">