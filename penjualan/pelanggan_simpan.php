<?php  
session_start();
if(isset($_POST['save'])){
	$penid=$_SESSION['penid'];
	$id_pelanggan=$_POST['ip'];
	include "../config.php";
	$sqls="update penjualan set id_pelanggan='$id_pelanggan' where penjualan_id='$penid'";
	$simpan=mysqli_query($koneksi,$sqls);
	$_SESSION['id_pelanggan']=$id_pelanggan;
}
?>
<meta http-equiv="refresh" content="1;url=transaksi.php">