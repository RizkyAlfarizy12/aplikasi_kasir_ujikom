<?php  
if(isset($_POST['save'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$nama_petugas=$_POST['nama_petugas'];
	$level=$_POST['level'];
	$id=$_POST['id'];
	$halaman=$_GET['halaman'];
	include "../config.php";
	if(empty($password)){
		$sqle="update petugas set username='$username', nama_petugas='$nama_petugas', level='$level' where id_petugas='$id'";
	} else{
		$passhash = password_hash($password,PASSWORD_DEFAULT);
		$sqle="update petugas set username='$username', nama_petugas='$nama_petugas', password='$passhash', level='$level' where id_petugas='$id'";
	}
	
	$simpan=mysqli_query($koneksi,$sqle);
	if($simpan){
		echo "<script>alert('Data Berhasil Di Edit')</script>";
	}else{
		echo "<script>alert('Data Gagal Di Edit')</script>";
	}
}
?>
<meta http-equiv="refresh" content="1;url=index.php?halaman=<?= $halaman ?>">