<?php  
session_start();
$nama_petugas=$_SESSION['nama_petugas'];
$penid=$_SESSION['penid'];
$tgl=$_SESSION['tgl'];
include "../config.php";
$sqlpenjualan="select * from penjualan where penjualan_id='$penid'";
$respenjualan=mysqli_query($koneksi,$sqlpenjualan);
$dtpenjualan=mysqli_fetch_array($respenjualan);
$id_pelanggan=$dtpenjualan['id_pelanggan'];
$sqlpelanggan="select * from pelanggan where id_pelanggan='$id_pelanggan'";
$respelanggan=mysqli_query($koneksi,$sqlpelanggan);
$dtpelanggan=mysqli_fetch_array($respelanggan);
$npel=$dtpelanggan['nama_pelanggan'];
$id_petugas=$dtpenjualan['id_petugas'];
$sqlpetugas="select * from petugas where id_petugas='$id_petugas'";
$respetugas=mysqli_query($koneksi,$sqlpetugas);
$dtpetugas=mysqli_fetch_array($respetugas);
$npet=$dtpetugas['nama_petugas'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body style="padding:5px 10px; width:3.75in; font:9pt 'consolas';">
<center>
	<h2>Toko 48</h2>
	Jl. Siliwangi No. 30 Kadipaten Majalengka<br>
	Telp. 088222333001 <br><br>
</center>
<table width="100%" cellspacing="0">
	<tr>
		<td width="50%" class="brs" style="padding:2px 5px; border-top: 1px solid;">Tgl : <?= $tgl ?></td>
		<td  align="right" class="brs" style="padding:2px 5px; border-top: 1px solid;">Penjualan ID : <?= $penid ?></td>
	</tr>
	<tr>
		<td class="brs" style="padding:2px 5px; border-bottom: 1px solid;">Pelanggan : <?= $npel ?></td>
		<td align="right" class="brs" style="padding:2px 5px; border-bottom: 1px solid;">Kasir : <?= $npet ?></td>
	</tr>
</table>
<table width="100%" cellspacing="0">
	<?php 
	include "../config.php";
	$sql="select * from detail_penjualan where penjualan_id='$penid'";
	$result=mysqli_query($koneksi,$sql);
	$no= 1;
	$jmltot=0;
	while($data=mysqli_fetch_array($result)){
		$hp=number_format($data['harga'],0,",",".");
		$jp=number_format($data['jumlah'],0,",",".");
		$total=$data['harga']*$data['jumlah'];
		$tot=number_format($total,0,",",".");
	?>
		<tr>
			<td class="brs" valign="top" style="padding:5px">
				<?= $no ?>.
			</td>
			<td class="brs" valign="top" style="padding:5px">
				<?= $jp ?> <?= $data['nama_produk'] ?> @ <?= $hp ?>		
			</td>
			<td class="brs" align="right" valign="top"  style="padding:5px" width="80px"><?= $tot ?></td>
		</tr>
	<?php
	$no++;
	$jmltot=$jmltot+$total;
	$jmltotal=number_format($jmltot,0,",",".");
	}
	?>
		<tr>
			<td colspan="2" class="brs" align="right" style="padding:5px 5px; border-bottom: 1px solid; border-top: 1px solid;">Total :</td>
			<th class="brs" align="right" style="font-size:11pt; padding:2px 5px;  border-bottom: 1px solid; border-top: 1px solid;"><?= $jmltotal ?></th>
		</tr>
		<?php  
		if(isset($_SESSION['total'])){
			$bayar=$_SESSION['bayar'];
			$nbayar=number_format($bayar,"0",",",".");
			$kembali=$_SESSION['kembali'];
			$nkembali=number_format($kembali,"0",",",".");
			?>
		<tr>
			<td colspan="2" class="brs" align="right" style="padding:5px 5px; border-bottom: 1px solid;">Bayar :</td>
			<td class="brs" align="right" style="padding:5px 5px; border-bottom: 1px solid;"><?= $nbayar ?></td>
		</tr>
		<tr>
			<td colspan="2" class="brs" align="right" style="padding:5px 5px; border-bottom: 1px solid;">Kembali :</td>
			<td class="brs" align="right" style="padding:5px 5px; border-bottom: 1px solid;"><?= $nkembali ?></td>
		</tr>
			<?php
		}
		?>
</table>
<br>
<center>
Terima Kasih atas Kunjungan Anda <br>
Semoga Berkenan
</center>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>
