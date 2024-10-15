<?php  
session_start();

if(isset($_GET['tgl'])) {
    $tgl = $_GET['tgl'];
    $np = $_GET['np'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembayaran <?= date("Ymd-His") ?></title>
    <link rel="stylesheet" href="reportprint.css?time=<?= md5(time()) ?>">
</head>
<body class="struk" onload="printOut()">

<section class="sheet">
<center>
    <h2 style="margin:0px">Toko Obat</h2>
    Jl. Siliwangi No. 30 Kadipaten Majalengka<br>
    Telp. 088222333001 <br><br>
    
    <?php  
    // Format tanggal
    $tg = substr($tgl, 8, 2);
    $bl = substr($tgl, 5, 2);
    $th = substr($tgl, 0, 4);
    $bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    
    $tanggal = $tg === "" ? "Bulan " . $bulan[(int)$bl] . " $th" : "Tanggal $tg " . $bulan[(int)$bl] . " $th";
    ?>

    <b>Laporan Penjualan <?= $tanggal ?></b>
    <?php if($np !== "") { ?>
    <br><b>Nama Petugas : <?= $np ?></b>
    <?php } ?>
</center>

<table width="100%" cellspacing="0">
    <thead>
        <tr>
            <td colspan="8"><?= str_repeat("=", 130) ?></td>
        </tr>
        <tr>
            <th width="30px" style="padding-left: 10px;">No.</th>
            <th width="70px">Tanggal</th>
            <th width="70px">Kode</th>
            <th>Nama Produk</th>
            <th width="70px" align="right">Harga</th>
            <th width="40px" align="right">Jml</th>
            <th width="80px" align="right">Total</th>
            <th width="120px" style="padding-left: 10px;">Nama Petugas</th>
        </tr>
        <tr>
            <td colspan="8"><?= str_repeat("-", 130) ?></td>
        </tr>
    </thead>
    <tbody>
        <?php  
        include "../config.php";
        
        // Menggunakan prepared statement untuk keamanan
        $stmt = $koneksi->prepare("SELECT penjualan.tanggal, penjualan.id_petugas, penjualan.nama_petugas, detail_penjualan.kode_produk, detail_penjualan.nama_produk, detail_penjualan.harga, detail_penjualan.jumlah, detail_penjualan.harga * detail_penjualan.jumlah AS tot FROM detail_penjualan JOIN penjualan ON penjualan.penjualan_id = detail_penjualan.penjualan_id WHERE penjualan.tanggal LIKE ? AND penjualan.nama_petugas LIKE ?");
        
        $tgl_param = $tgl . '%';
        $np_param = $np . '%';
        $stmt->bind_param("ss", $tgl_param, $np_param);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $no = 1;
        $jmltot = 0;
        
        while ($data = $result->fetch_assoc()) {
            $hp = number_format($data['harga'], 0, ",", ".");
            $jp = number_format($data['jumlah'], 0, ",", ".");
            $total = $data['harga'] * $data['jumlah'];
            $tot = number_format($total, 0, ",", ".");
        ?>
        <tr>
            <td style="padding-left: 10px;"><?= $no ?>.</td>
            <td><?= substr($data['tanggal'], 0, 10) ?></td>
            <td><?= $data['kode_produk'] ?></td>
            <td><?= $data['nama_produk'] ?></td>
            <td align="right"><?= $hp ?></td>
            <td align="right" class="px-3"><?= $jp ?></td>
            <td align="right" class="px-3"><?= $tot ?></td>
            <td style="padding-left: 10px;"><?= $data['nama_petugas'] ?></td>
        </tr>
        <?php  
            $no++;
            $jmltot += $total;
        }
        
        $jmltotal = number_format($jmltot, 0, ",", ".");
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="8"><?= str_repeat("-", 130) ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="5"><b>Total :</b></td>
            <td align="right"><b><?= $jmltotal ?: 0 ?></b></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="8"><?= str_repeat("=", 130) ?></td>
        </tr>
    </tfoot>
</table>

<br>
<?php  
// Format tanggal sekarang
$tglskr = date("Y-m-d");
$tgs = substr($tglskr, 8, 2);
$bls = substr($tglskr, 5, 2);
$ths = substr($tglskr, 0, 4);
$tglsekarang = "$tgs " . $bulan[(int)$bls] . " $ths";
?>
<table width="100%">
    <tr>
        <td></td>
        <td width="200px" align="center">
            <p>Majalengka, <?= $tglsekarang ?><br>
            Direktur,<br><br><br><br><br>
            _______________________</p>
        </td>
    </tr>
</table>

</section>

<script>
function printOut() {
    window.print();
    setTimeout(function() { self.close(); }, 1000);
}
</script>
<?php 
} else {
    // Jika parameter tgl tidak ada, arahkan ke halaman lain atau tampilkan pesan kesalahan
    echo "Data tidak tersedia.";
} 
?>
</body>
</html>
