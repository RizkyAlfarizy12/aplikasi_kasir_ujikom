<?php  
session_start();

	include "../config.php";
	$tanggal=date("Y-m-d H:i:s");
	$sqls="insert into penjualan (tanggal) values ('$tanggal')";
	$simpan=mysqli_query($koneksi,$sqls);
	$sql="select * from penjualan order by penjualan_id desc";
	$result=mysqli_query($koneksi,$sql);
	$data=mysqli_fetch_array($result);
	$_SESSION['penid']=$data['penjualan_id'];
	$_SESSION['tgl']=$data['tanggal'];

?>
<meta http-equiv="refresh" content="1;url=transaksi.php">