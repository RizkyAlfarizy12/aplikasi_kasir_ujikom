<?php  
if(isset($_POST['save'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$passhash = password_hash($password,PASSWORD_DEFAULT);
	$nama_petugas=$_POST['nama_petugas'];
	$level=$_POST['level'];
	$halaman=$_GET['halaman'];
	include "../config.php";
	$sqls="insert into petugas (username, password, nama_petugas, level) values ('$username', '$passhash', '$nama_petugas','$level')";
	$simpan=mysqli_query($koneksi,$sqls);
	if($simpan){
		echo "<script>alert('Data Berhasil Disimpan')</script>";
	}else{
		echo "<script>alert('Data Gagal Disimpan')</script>";
	}
}
?>
<meta http-equiv="refresh" content="1;url=index.php?halaman=<?= $halaman ?>">