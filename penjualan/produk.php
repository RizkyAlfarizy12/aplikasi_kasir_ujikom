<?php  
session_start();
if(!isset($_SESSION['username'])&&!isset($_SESSION['password'])){
?>
<meta http-equiv="refresh" content="0;url=../login.php">
<?php 
}else{
?>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
</head>
<body>
<?php include "../header.php" ?>
<main class="container border py-3">
<br><br><br>
<!-- pencarian -->
<div class="container">
	<div class="row">
			<div class="col-sm-8 px-0"><h3><a href="transaksi.php" class="btn btn-secondary">&laquo; Back</a> Daftar Produk</h3></div>
			<div class="col-sm-4 px-0">
					<form class="d-flex" method="GET" action="">
        	<input class="form-control me-2" type="text" placeholder="Search" name="np">
        	<button class="btn btn-primary" type="submit">Search</button>
      </form>
			</div>
	</div>
</div>
<!-- akhir pencarian -->

<table class="table table-hover table-striped table-sm">
	<thead class="bg-primary text-white">
		<tr>
			<th class="p-3 rounded-start" width="55px">No.</th>
			<th class="py-3 px-3" width="100px">Kode</th>
			<th class="py-3">Nama Produk</th>
			<th class="py-3 text-end" width="100px">Harga</th>
			<th class="py-3 px-3 text-end rounded-end" width="100px" >Stok</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		include "../config.php";
		$batas = 10;
		$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

		$previous = $halaman - 1;
		$next = $halaman + 1;
		
		if(isset($_GET['np'])){
			$np=$_GET['np'];
			$sqldata="select * from produk where nama_produk like '%$np%'";
		}else{
			$sqldata="select * from produk";
		}
		$resdata=mysqli_query($koneksi,$sqldata);
		$jumlah_data = mysqli_num_rows($resdata);
		$total_halaman = ceil($jumlah_data / $batas);

		if(isset($_GET['np'])){
			$np=$_GET['np'];
			$sql="select * from produk where nama_produk like '%$np%' limit $halaman_awal, $batas";
		}else{
			$sql="select * from produk limit $halaman_awal, $batas";
		}
		
		$result=mysqli_query($koneksi,$sql);
		$no= $halaman_awal+1;
		while($data=mysqli_fetch_array($result)){
			$hp=number_format($data['harga'],0,",",".");
			$kp=$data['kode_produk'];
			$stokawal=$data['stok'];
			$sqlst="select * from detail_penjualan where kode_produk='$kp'";
			$resst=mysqli_query($koneksi,$sqlst);
			$jmlst=0;
			while($dtst=mysqli_fetch_array($resst)){
				$jml=$dtst['jumlah'];
				$jmlst=$jmlst+$jml;
			}
			$sqltp="select * from tambah_stok where kode_produk='$kp'";
			$restp=mysqli_query($koneksi,$sqltp);
			$jmltp=0;
			while($dttp=mysqli_fetch_array($restp)){
				$jml=$dttp['jumlah'];
				$jmltp=$jmltp+$jml;
			}
			$stokakhir=$stokawal-$jmlst+$jmltp;
			$sp=number_format($stokakhir,0,",",".");
		?>
		<tr>
				<td class="px-3"><?= $no ?>.</td>
				<td><a class="btn btn-sm btn-warning" href="transaksi.php?kp=<?= $data['kode_produk'] ?>"><?= $data['kode_produk'] ?></a></td>
				<td><?= $data['nama_produk'] ?></td>
				<td align="right"><?= $hp ?></td>
				<td align="right" class="px-3"><?= $sp ?></td>
		</tr>

		<?php  
		$no++;
		}
		?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="6" class="text-center">
				<div class="container">
					<div class="row">
						<div class="col-12 text-center py-3">

						<!-- Untuk nomor Halaman -->
							<ul class="pagination justify-content-center pagination-sm">
								<li class="page-item"><a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>&laquo; Previous</a></li>
								
								<?php 
								for($x=1;$x<=$total_halaman;$x++){
									if($x==$halaman){
								?>
									<li class="page-item active"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
								<?php
									}else{
								?> 
									<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
								<?php
									}
								}
								?>				
								<li class="page-item"><a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next &raquo;</a></li>
							</ul>				
						</div>
					</div>
				</div>
							
			</td>
		</tr>
	</tfoot>
</table>
</div>
</main>
<?php include "../footer.php" ?>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>