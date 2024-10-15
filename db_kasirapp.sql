-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2024 pada 17.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasirapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `detail_id` int(11) NOT NULL,
  `kode_produk` varchar(15) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `penjualan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`detail_id`, `kode_produk`, `nama_produk`, `harga`, `jumlah`, `penjualan_id`) VALUES
(1, 'M.001', 'Nasi Uduk', 20000, 2, 1),
(2, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 1),
(3, 'M.003', 'Ayam Geprek', 15000, 1, 1),
(4, 'M.001', 'Nasi Uduk', 20000, 2, 2),
(5, 'M.003', 'Ayam Geprek', 15000, 2, 2),
(6, 'M.001', 'Nasi Uduk', 20000, 3, 3),
(7, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 3),
(8, 'M.004', 'Ayam Bakar', 10000, 3, 3),
(9, 'M.001', 'Nasi Uduk', 20000, 2, 4),
(10, 'M.003', 'Ayam Geprek', 15000, 3, 4),
(11, 'M.004', 'Ayam Bakar', 10000, 2, 5),
(12, 'M.003', 'Ayam Geprek', 15000, 1, 5),
(13, 'M.001', 'Nasi Uduk', 20000, 2, 6),
(14, 'M.003', 'Ayam Geprek', 15000, 2, 6),
(15, 'M.001', 'Nasi Uduk', 20000, 2, 7),
(16, 'M.001', 'Nasi Uduk', 20000, 2, 8),
(17, 'M.003', 'Ayam Geprek', 15000, 3, 8),
(18, 'M.005', 'Nila Bakar', 25000, 2, 8),
(19, 'M.001', 'Nasi Uduk', 20000, 2, 9),
(20, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 9),
(21, 'M.003', 'Ayam Geprek', 15000, 4, 9),
(22, 'M.001', 'Nasi Uduk', 20000, 1, 10),
(23, 'M.005', 'Nila Bakar', 25000, 5, 10),
(24, 'M.003', 'Ayam Geprek', 15000, 2, 10),
(25, 'M.003', 'Ayam Geprek', 15000, 5, 11),
(26, 'M.001', 'Nasi Uduk', 20000, 5, 11),
(27, 'M.002', 'Nasi Goreng Spesial', 25000, 5, 12),
(28, 'M.003', 'Ayam Geprek', 15000, 2, 12),
(29, 'M.004', 'Ayam Bakar', 10000, 3, 12),
(30, 'M.001', 'Nasi Uduk', 20000, 2, 13),
(31, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 14),
(32, 'M.004', 'Ayam Bakar', 10000, 3, 14),
(33, 'M.005', 'Nila Bakar', 25000, 3, 14),
(34, 'D.002', 'Jus Sirsak', 10000, 3, 14),
(35, 'M.001', 'Nasi Uduk', 20000, 3, 15),
(36, 'M.003', 'Ayam Geprek', 15000, 1, 15),
(37, 'D.002', 'Jus Sirsak', 10000, 1, 15),
(38, 'D.002', 'Jus Sirsak', 10000, 3, 16),
(39, 'M.001', 'Nasi Uduk', 20000, 3, 16),
(40, 'D.002', 'Jus Sirsak', 10000, 3, 17),
(41, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 17),
(44, 'M.003', 'Ayam Geprek', 15000, 1, 17),
(46, 'M.001', 'Nasi Uduk', 20000, 2, 18),
(47, 'D.001', 'Jus Alpukat', 10000, 2, 18),
(48, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 19),
(49, 'M.004', 'Ayam Bakar', 10000, 2, 19),
(50, 'D.001', 'Jus Alpukat', 10000, 5, 19),
(51, 'M.001', 'Nasi Uduk', 20000, 1, 20),
(52, 'M.003', 'Ayam Geprek', 15000, 3, 20),
(53, 'M.001', 'Nasi Uduk', 20000, 2, 21),
(54, 'M.003', 'Ayam Geprek', 15000, 1, 21),
(55, 'D.001', 'Jus Alpukat', 10000, 3, 21),
(56, 'M.001', 'Nasi Uduk', 20000, 5, 22),
(57, 'M.005', 'Nila Bakar', 25000, 5, 22),
(58, 'M.001', 'Nasi Uduk', 20000, 2, 23),
(59, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 23),
(60, 'M.003', 'Ayam Geprek', 15000, 1, 23),
(61, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 24),
(62, 'D.002', 'Jus Sirsak', 10000, 2, 24),
(63, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 25),
(64, 'M.003', 'Ayam Geprek', 15000, 1, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(15) DEFAULT NULL,
  `nama_pelanggan` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`) VALUES
(1, 'P.001', 'Alan Rusdiana', 'Jl. K.H. Abdul Halim No. 2000 Majalengka', '085111222333'),
(2, 'P.002', 'Asep Darmawan', 'Lingk. Dahlia No. 20 Majalengka', '085222333444');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`penjualan_id`, `tanggal`, `total_harga`, `bayar`, `id_pelanggan`, `id_petugas`, `nama_petugas`) VALUES
(1, '2024-01-25 14:05:09', 130000, 150000, 1, 1, 'Yoga Eryana'),
(2, '2024-01-25 14:10:39', 70000, 100000, 2, 1, 'Yoga Eryana'),
(3, '2024-01-25 15:03:52', 165000, 170000, 1, 4, 'M. Gibran'),
(4, '2024-01-25 19:30:03', 85000, 100000, 1, 4, 'M. Gibran'),
(5, '2024-01-26 10:46:11', 35000, 50000, NULL, 4, 'M. Gibran'),
(6, '2024-01-27 11:45:34', 70000, 100000, NULL, 1, 'Yoga Eryana'),
(7, '2024-01-31 11:46:04', NULL, NULL, NULL, 0, NULL),
(8, '2024-03-02 16:59:56', 135000, 150000, 1, 1, 'Yoga Eryana'),
(9, '2024-03-02 18:02:41', 150000, 200000, 2, 4, 'M. Gibran'),
(10, '2024-03-02 18:17:12', 175000, 200000, 1, 4, 'M. Gibran'),
(11, '2024-03-02 18:44:20', 175000, 200000, 1, 4, 'M. Gibran'),
(12, '2024-03-04 12:21:47', 185000, 200000, 1, 4, 'M. Gibran'),
(13, '2024-03-04 12:28:57', 40000, 50000, NULL, 1, 'Yoga Eryana'),
(14, '2024-03-04 20:23:41', 210000, 220000, 1, 2, 'Aldena Restu'),
(15, '2024-03-04 21:32:27', 85000, 100000, NULL, 1, 'Yoga Eryana'),
(16, '2024-03-05 09:09:39', 90000, 100000, NULL, 1, 'Yoga Eryana'),
(17, '2024-03-05 12:20:59', 95000, 100000, 1, 4, 'M. Gibran'),
(18, '2024-03-05 13:23:30', 60000, 70000, 2, 4, 'M. Gibran'),
(19, '2024-03-09 13:28:47', 145000, 150000, 1, 5, 'Ronaldo'),
(20, '2024-04-30 20:56:25', 65000, 100000, NULL, 4, 'M. Gibran'),
(21, '2024-05-28 12:47:55', 85000, 100000, 1, 1, 'Yoga Eryana'),
(22, '2024-06-08 14:09:44', 225000, 250000, 2, 2, 'Aldena Restu'),
(23, '2024-08-09 22:16:42', 105000, 120000, 2, 1, 'Yoga Eryana'),
(24, '2024-08-09 22:20:44', 95000, 100000, NULL, 1, 'Yoga Eryana'),
(25, '2024-08-09 22:27:04', 65000, 100000, NULL, 4, 'M. Gibran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_petugas` varchar(35) DEFAULT NULL,
  `level` enum('admin','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin', '$2y$10$fLm0bttQzBRjSg/if/zO4.KegWHsYJ.C3E5aXkPzI/s32sV/Ub3l6', 'Yoga Eryana', 'admin'),
(2, 'kasir2', '$2y$10$/cEkZ08Uf7LXYCmLMaHoTu6no7mO4LHhL.Jc7EN8yWct1vp2nDQIG', 'Aldena Restu', 'petugas'),
(4, 'kasir1', '$2y$10$6XI3ZWGEKWeCBui/cCo78.7491vnbv2lSythWnwTIMPKYemazgHe.', 'M. Gibran', 'petugas'),
(5, 'kasir3', '$2y$10$qJbU5D0yxh5Hk5TUlPSNCuld9RuClbS83cscLbwGt3tcpTQgeiv6S', 'Ronaldo', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(15) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga`, `stok`) VALUES
(1, 'M.001', 'Nasi Uduk', 20000, 25),
(2, 'M.002', 'Nasi Goreng Spesial', 25000, 25),
(3, 'M.003', 'Ayam Geprek', 15000, 50),
(4, 'M.004', 'Ayam Bakar', 10000, 25),
(5, 'M.005', 'Nila Bakar', 25000, 25),
(6, 'D.001', 'Jus Alpukat', 10000, 10),
(7, 'D.002', 'Jus Sirsak', 10000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tambah_stok`
--

CREATE TABLE `tambah_stok` (
  `tambah_id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `kode_produk` varchar(15) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tambah_stok`
--

INSERT INTO `tambah_stok` (`tambah_id`, `tanggal`, `kode_produk`, `jumlah`) VALUES
(1, '2024-01-31 08:39:02', 'M.001', 20),
(2, '2024-01-31 08:39:48', 'M.002', 10),
(3, '2024-01-31 08:41:23', 'M.003', 20),
(4, '2024-01-31 08:43:53', 'M.005', 10),
(5, '0000-00-00 00:00:00', 'M.001', 10),
(6, '0000-00-00 00:00:00', 'M.001', 50),
(7, '0000-00-00 00:00:00', 'D.002', 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualan_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tambah_stok`
--
ALTER TABLE `tambah_stok`
  ADD PRIMARY KEY (`tambah_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tambah_stok`
--
ALTER TABLE `tambah_stok`
  MODIFY `tambah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
