<?php  
session_start();
if (isset($_GET['penid'])) {
    $penid = $_GET['penid'];
    $kbl = $_GET['kbl'];

    include "../config.php";

    // Fetch penjualan data
    $sqlpenjualan = "SELECT * FROM penjualan WHERE penjualan_id='$penid'";
    $respenjualan = mysqli_query($koneksi, $sqlpenjualan);
    $dtpenjualan = mysqli_fetch_array($respenjualan);

    if ($dtpenjualan) {
        $tgl = $dtpenjualan['tanggal'];
        $bayar = $dtpenjualan['bayar'];
        $nbayar = number_format($bayar, 0, ",", ".");
        $id_pelanggan = $dtpenjualan['id_pelanggan'];

        // Fetch pelanggan data
        $sqlpelanggan = "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
        $respelanggan = mysqli_query($koneksi, $sqlpelanggan);
        $dtpelanggan = mysqli_fetch_array($respelanggan);
        $npel = $dtpelanggan ? $dtpelanggan['nama_pelanggan'] : "Tidak diketahui";

        // Fetch petugas data
        $id_petugas = $dtpenjualan['id_petugas'];
        $sqlpetugas = "SELECT * FROM petugas WHERE id_petugas='$id_petugas'";
        $respetugas = mysqli_query($koneksi, $sqlpetugas);
        $dtpetugas = mysqli_fetch_array($respetugas);
        $npet = $dtpetugas ? $dtpetugas['nama_petugas'] : "Tidak diketahui";

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Daftar Pembayaran</title>
            <link rel="stylesheet" href="print.css?time=<?= md5(time()) ?>">
        </head>
        <body class="struk" onload="printOut()">
        <section class="sheet">
        <center>
            <br>
            <h2 style="margin:0px">Toko Obat</h2>
            Jl. Siliwangi No. 30 Kadipaten Majalengka<br>
            Telp. 088222333001 <br>
        </center>
        <?= str_repeat("=", 37) ?>
        <table width="100%" cellspacing="0">
            <tr>
                <td style="padding:2px 5px;">Tgl : <?= $tgl ?></td>
            </tr>
            <tr>
                <td style="padding:2px 5px;">Penjualan ID : <?= $penid ?></td>
            </tr>
            <tr>
                <td style="padding:2px 5px;">Pelanggan : <?= $npel ?></td>
            </tr>
            <tr>
                <td style="padding:2px 5px;">Kasir : <?= $npet ?></td>
            </tr>
        </table>
        <?= str_repeat("-", 37) ?>
        <table width="100%" cellspacing="0">
            <?php 
            $sql = "SELECT * FROM detail_penjualan WHERE penjualan_id='$penid'";
            $result = mysqli_query($koneksi, $sql);
            $no = 1;
            $jmltot = 0;
            while ($data = mysqli_fetch_array($result)) {
                $hp = number_format($data['harga'], 0, ",", ".");
                $jp = number_format($data['jumlah'], 0, ",", ".");
                $total = $data['harga'] * $data['jumlah'];
                $tot = number_format($total, 0, ",", ".");
                ?>
                <tr>
                    <td valign="top" style="padding:5px;"><?= $no ?>.</td>
                    <td valign="top" style="padding:5px 2px; width:180px">
                        <?= $jp ?> <?= $data['nama_produk'] ?> @ <?= $hp ?>
                    </td>
                    <td align="right" valign="top" style="padding:5px; width:60px"><?= $tot ?></td>
                </tr>
                <?php
                $no++;
                $jmltot += $total;
                $jmltotal = number_format($jmltot, 0, ",", ".");
            }
            ?>
        </table>
        <table width="100%" cellspacing="0">
            <tr>
                <td colspan="3"><?= str_repeat("-", 36) ?></td>
            </tr>
            <tr>
                <td align="right" style="padding:5px 5px;">Total :</td>
                <th align="right" style="font-size:10pt; padding:2px 5px;"><?= $jmltotal ?></th>
            </tr>
            <tr>
                <td align="right" style="padding:5px 5px;">Bayar :</td>
                <td align="right" style="padding:5px 5px;"><?= $nbayar ?></td>
            </tr>
            <tr>
                <td align="right" style="padding:5px 5px;">Kembali :</td>
                <td align="right" style="padding:5px 5px;"><?= $kbl ?></td>
            </tr>
        </table>
        <?= str_repeat("-", 37) ?>
        <br>
        <center>
            Terima Kasih atas Kunjungan Anda <br>
            Semoga Berkenan
        </center>
        <br/><br/><br/><br/>
        </section>
        <script>
            var lama = 1000;
            var t = null;
            function printOut() {
                window.print();
                t = setTimeout("self.close()", lama);
            }
        </script>
        </body>
        </html>
        <?php
    } else {
        echo "Penjualan tidak ditemukan.";
    }
} else {
    echo "Parameter tidak lengkap.";
}
?>
