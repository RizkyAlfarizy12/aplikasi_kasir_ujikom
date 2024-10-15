<?php 
$host="localhost";
$user="root";
$pass=""; 
$basisdata="db_resto";
$koneksi=mysqli_connect($host,$user,$pass);
$db=mysqli_select_db($koneksi,$basisdata);
?>