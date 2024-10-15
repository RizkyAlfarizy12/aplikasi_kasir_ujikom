<?php 
$koneksi=mysqli_connect("localhost","root","");
//$koneksi=mysqli_connect("localhost:3306","root","root");
$db=mysqli_select_db($koneksi,"db_kasirapp");
date_default_timezone_set('Asia/Jakarta');
?>