<?php  
session_start();
unset($_SESSION['bayar']);
unset($_SESSION['penid']);
unset($_SESSION['tgl']);
unset($_SESSION['id_pelanggan']);
?>
<meta http-equiv="refresh" content="1;url=index.php">