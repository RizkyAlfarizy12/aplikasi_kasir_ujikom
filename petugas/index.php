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
    <title>Daftar Petugas</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
</head>
<body>
<?php include "../header.php" ?>
<main class="container border py-3">
<br><br><br>
<!-- pencarian -->
<div class="container">
	<div class="row">
			<div class="col-sm-8"><h3>Daftar Petugas</h3></div>
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
			<th class="py-3" width="100px">Username</th>
			<th class="py-3" width="100px">Password</th>
			<th class="py-3">Nama Petugas</th>
			<th class="py-3" width="100px">Level</th>
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
			$sqldata="select * from petugas where nama_petugas like '%$np%'";
		}else{
			$sqldata="select * from petugas";
		}
		$resdata=mysqli_query($koneksi,$sqldata);
		$jumlah_data = mysqli_num_rows($resdata);
		$total_halaman = ceil($jumlah_data / $batas);

		if(isset($_GET['np'])){
			$np=$_GET['np'];
			$sql="select * from petugas where nama_petugas like '%$np%' limit $halaman_awal, $batas";
		}else{
			$sql="select * from petugas limit $halaman_awal, $batas";
		}
		
		$result=mysqli_query($koneksi,$sql);
		$no= $halaman_awal+1;
		while($data=mysqli_fetch_array($result)){
		?>
		<tr>
				<td class="px-3"><?= $no ?>.</td>
				<td><?= $data['username'] ?></td>
				<td>********</td>
				<td><?= $data['nama_petugas'] ?></td>
				<td class="text-capitalize"><?= $data['level'] ?></td>
				<td align="right">
					<a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit<?= $data['id_petugas'] ?>">Edit</a>

					<a class="btn btn-danger btn-sm" href="delete.php?id=<?= $data['id_petugas'] ?>" onclick="return confirm('Apakah Anda Yakin data Petugas <?= $data['nama_petugas'] ?> akan dihapus ?')" class="hapus">Delete</a>
				</td>
		</tr>

<!-- Modal Edit -->
<div class="modal fade" id="modaledit<?= $data['id_petugas'] ?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">Edit Data Petugas</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="update.php?halaman=<?= $halaman ?>">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row my-1">
        	<div class="col-4">
        		Username 
        	</div>
        	<div class="col-8">
        		<input type="hidden" name="id" value="<?= $data['id_petugas'] ?>">
        		<input type="text" name="username" class="form-control" value="<?= $data['username'] ?>">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Password Baru
        	</div>
        	<div class="col-8">
        		<input type="text" name="password" class="form-control">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Nama Petugas 
        	</div>
        	<div class="col-8">
        		<input type="text" name="nama_petugas" class="form-control" value="<?= $data['nama_petugas'] ?>">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Level 
        	</div>
        	<div class="col-8">
        		<div class="col-8">
        		<?php  
        		if($data['level']=="admin"){
        		?>
        		<select name="level" size="1" class="form-control">
        			<option value="admin" class="form-control">Admin</option>
        			<option value="petugas" class="form-control">Petugas</option>
        		</select>
        		<?php
        		}else{
        		?>
        		<select name="level" size="1" class="form-control">
        			<option value="petugas" class="form-control">Petugas</option>
        			<option value="admin" class="form-control">Admin</option>
        		</select>
        		<?php
        		}
        		?>
        		
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
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">[+] Data Petugas</button>						
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
        <h3 class="modal-title">Input Data Petugas</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="simpan.php?halaman=<?= $halaman ?>">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row my-1">
        	<div class="col-4">
        		Username 
        	</div>
        	<div class="col-8">
        		<input type="text" name="username" class="form-control">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Password 
        	</div>
        	<div class="col-8">
        		<input type="text" name="password" class="form-control">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Nama Petugas 
        	</div>
        	<div class="col-8">
        		<input type="text" name="nama_petugas" class="form-control">
        	</div>
        </div>
        <div class="row my-1">
        	<div class="col-4">
        		Level 
        	</div>
        	<div class="col-8">
        		<select name="level" size="1" class="form-control">
        			<option value="petugas" class="form-control">Petugas</option>
        			<option value="admin" class="form-control">Admin</option>
        		</select>
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