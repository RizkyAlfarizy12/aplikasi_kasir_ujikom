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
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
</head>
<body>
<?php include "../header.php" ?>
<main class="container border py-3">
<br><br><br>
<!-- pencarian -->
<div class="container">
	<div class="row">
			<div class="col-sm-8"><h3>Daftar Pelanggan</h3></div>
			<div class="col-sm-4">
					<form class="d-flex" method="GET" action="">
        	<input class="form-control me-2" type="text" placeholder="Search" name="np">
        	<button class="btn btn-secondary" type="submit">Search</button>
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
			<th class="py-3" width="200px">Nama Pelanggan</th>
			<th class="py-3">Alamat</th>
			<th class="py-3" width="200px">No HP/WA</th>
			<th class="py-3 text-center rounded-end" width="130px">Aksi</th>
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
			$sqldata="select * from pelanggan where nama_pelanggan like '%$np%'";
		}else{
			$sqldata="select * from pelanggan";
		}
		$resdata=mysqli_query($koneksi,$sqldata);
		$jumlah_data = mysqli_num_rows($resdata);
		$total_halaman = ceil($jumlah_data / $batas);

		if(isset($_GET['np'])){
			$np=$_GET['np'];
			$sql="select * from pelanggan where nama_pelanggan like '%$np%' limit $halaman_awal, $batas";
		}else{
			$sql="select * from pelanggan limit $halaman_awal, $batas";
		}
		
		$result=mysqli_query($koneksi,$sql);
		$no= $halaman_awal+1;
		while($data=mysqli_fetch_array($result)){
		?>
		<tr>
				<td class="px-3"><?= $no ?>.</td>
				<td><?= $data['kode_pelanggan'] ?></td>
				<td><?= $data['nama_pelanggan'] ?></td>
				<td><?= $data['alamat'] ?></td>
				<td><?= $data['no_hp'] ?></td>
				<td align="right">
					<a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit<?= $data['id_pelanggan'] ?>">Edit</a>

					<a class="btn btn-danger btn-sm" href="delete.php?id=<?= $data['id_pelanggan'] ?>" onclick="return confirm('Apakah Anda Yakin data produk <?= $data['nama_pelanggan'] ?> akan dihapus ?')" class="hapus">Delete</a>
				</td>
		</tr>

<!-- Modal Edit -->
<div class="modal fade" id="modaledit<?= $data['id_pelanggan'] ?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">Edit Data Pelanggan</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="update.php?halaman=<?= $halaman ?>">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row my-1">
        	<div class="col-4">
        		Kode Pelanggan 
        	</div>
        	<div class="col-8">
        		<input type="hidden" name="id" value="<?= $data['id_pelanggan'] ?>">
        		<input type="text" name="kode_pelanggan" class="form-control" value="<?= $data['kode_pelanggan'] ?>">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Nama Pelanggan 
        	</div>
        	<div class="col-8">
        		<input type="text" name="nama_pelanggan" class="form-control" value="<?= $data['nama_pelanggan'] ?>">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Alamat 
        	</div>
        	<div class="col-8">
        		<textarea name="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		No HP/WA 
        	</div>
        	<div class="col-8">
        		<input type="text" name="no_hp" class="form-control" value="<?= $data['no_hp'] ?>">
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
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">[+] Data Pelanggan</button>						
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
        <h3 class="modal-title">Input Data Pelanggan</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="simpan.php?halaman=<?= $halaman ?>">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row my-1">
        	<div class="col-4">
        		Kode Pelanggan 
        	</div>
        	<div class="col-8">
        		<input type="text" name="kode_pelanggan" class="form-control">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Nama Pelanggan 
        	</div>
        	<div class="col-8">
        		<input type="text" name="nama_pelanggan" class="form-control">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Alamat 
        	</div>
        	<div class="col-8">
        		<textarea name="alamat" class="form-control"></textarea>
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		No HP/WA 
        	</div>
        	<div class="col-8">
        		<input type="text" name="no_hp" class="form-control">
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
</main>
<?php include "../footer.php" ?>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>