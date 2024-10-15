r<?php  
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
			<div class="col-sm-8"><h3>Daftar Produk</h3></div>
			<div class="col-sm-4">
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
			<th class="py-3" width="100px">Kode</th>
			<th class="py-3">Nama Produk</th>
			<th class="py-3 text-end" width="100px">Harga</th>
			<th class="py-3 text-end" width="70px">Stok</th>
			<th class="py-3 text-center rounded-end" width="130px">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		include "../config.php";
		$batas = 5;
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
			if($stokakhir<=0){
				$st_akhir="<span class='text-danger'><b>Habis</b></span>";
			}else{
				$st_akhir=$sp;
			}
		?>
		<tr>
				<td class="px-3"><?= $no ?>.</td>
				<td><?= $data['kode_produk'] ?></td>
				<td><?= $data['nama_produk'] ?></td>
				<td align="right"><?= $hp ?></td>
				<td align="right"><?= $st_akhir ?></td>
				<td align="right">
					<a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit<?= $data['id_produk'] ?>">Edit</a>

					<a class="btn btn-danger btn-sm" href="delete.php?id=<?= $data['id_produk'] ?>" onclick="return confirm('Apakah Anda Yakin data produk <?= $data['nama_produk'] ?> akan dihapus ?')" class="hapus">Delete</a>
				</td>
		</tr>

<!-- Modal Edit -->
<div class="modal fade" id="modaledit<?= $data['id_produk'] ?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">Edit Data Produk</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="update.php?halaman=<?= $halaman ?>">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row my-1">
        	<div class="col-4">
        		Kode Produk 
        	</div>
        	<div class="col-8">
        		<input type="hidden" name="id" value="<?= $data['id_produk'] ?>">
        		<input type="text" name="kp" class="form-control" value="<?= $data['kode_produk'] ?>">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Nama Produk 
        	</div>
        	<div class="col-8">
        		<input type="text" name="np" class="form-control" value="<?= $data['nama_produk'] ?>">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Harga 
        	</div>
        	<div class="col-8">
        		<input type="text" name="hp" class="form-control" value="<?= $data['harga'] ?>">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Stok 
        	</div>
        	<div class="col-8">
        		<input type="text" name="sp" class="form-control" value="<?= $data['stok'] ?>">
        	</div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary" name="save">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- akhir modal Edit -->

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
						<div class="col-4 text-start py-3">

						<!-- tombol input	 -->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">[+] Data Produk</button>
							<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tambahstok">[+] Stok</button>						
						</div>
						<div class="col-8 text-end py-3">

						<!-- Untuk nomor Halaman -->
							<ul class="pagination justify-content-end pagination-sm">
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
<!-- Modal Form -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">Input Data Produk</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="simpan.php?halaman=<?= $halaman ?>">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row my-1">
        	<div class="col-4">
        		Kode Produk 
        	</div>
        	<div class="col-8">
        		<input type="text" name="kp" class="form-control">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Nama Produk 
        	</div>
        	<div class="col-8">
        		<input type="text" name="np" class="form-control">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Harga 
        	</div>
        	<div class="col-8">
        		<input type="text" name="hp" class="form-control">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Stok 
        	</div>
        	<div class="col-8">
        		<input type="text" name="sp" class="form-control">
        	</div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary" name="save">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- akhir modal Form -->

<!-- Modal Tambah Stok -->
<div class="modal fade" id="tambahstok">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    	<!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">Tambah Stok</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="tambah_stok_simpan.php?halaman=<?= $halaman ?>">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row my-1">
        	<div class="col-4">
        		Kode Produk 
        	</div>
        	<div class="col-8">
        		<input list="kode_produk" id="kp" name="kp" autocomplete="off" placeholder="Kode Produk" class="form-control me-2" />
								<datalist id="kode_produk">
									<?php  
									include "../config.php";
									$sqlp="select * from produk";
									$resp=mysqli_query($koneksi,$sqlp);
									while($dtp=mysqli_fetch_array($resp)){
									?>
									<option value="<?= $dtp['kode_produk'] ?>"><?= $dtp['nama_produk'] ?></option>
									<?php
									}
									?>
								</datalist>
        	</div>
        </div>
        
        <div class="row my-1">
        	<div class="col-4">
        		Jumlah 
        	</div>
        	<div class="col-8">
        		<input type="number" name="jml" class="form-control">
        	</div>
        </div>
      </div>

      

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary" name="save">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- akhir modal Tambah Stok -->
</main>
<?php include "../footer.php" ?>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>