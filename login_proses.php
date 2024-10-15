<?php 
session_start();
if(isset($_POST['login'])){

include "config.php";
$username=stripslashes(strip_tags(htmlspecialchars($_POST['username'],ENT_QUOTES)));
$password=stripslashes(strip_tags(htmlspecialchars($_POST['password'],ENT_QUOTES)));

$sql="select * from petugas where username='$username'";
$result=mysqli_query($koneksi,$sql);
$data=mysqli_fetch_array($result);
$user_name = $data['username'];
$user_pass = $data['password'];

if (password_verify($password, $user_pass)) {
	$_SESSION['username']=$data['username'];
		$_SESSION['password']=$data['password'];
		$_SESSION['level']=$data['level'];
		$_SESSION['nama_petugas']=$data['nama_petugas'];
		$_SESSION['id_petugas']=$data['id_petugas'];
	} else {
		echo "<script>alert('Maaf User Name atau Password Anda Salah, Silahkan ulangi lagi !')</script>";
	}

}
?>
<meta http-equiv="refresh" content="0;url=index.php">