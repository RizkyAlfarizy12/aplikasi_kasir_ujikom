<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Styling Navbar */
        .navbar {
            background: linear-gradient(45deg, #1f6f8b, #28a745);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn {
            margin: 0 5px;
            padding: 8px 12px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        header {
            background-color: #343a40;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 0.5rem 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand h2 {
            font-size: 1.75rem;
            margin-bottom: 0;
            font-weight: bold;
            color: #fff;
            transition: transform 0.3s ease;
        }

        .navbar-brand h2:hover {
            transform: translateY(-5px);
        }

        /* Space for fixed header */
        body {
            padding-top: 100px;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        canvas {
            margin: 20px 0;
        }

        h1 {
            margin-bottom: 20px;
            color: #343a40;
            font-weight: bold;
            font-size: 2.5rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            transition: color 0.3s ease;
        }

        h1:hover {
            color: #1f6f8b;
        }

        .chart-container {
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            color: #6c757d;
            font-size: 0.9rem;
        }

    </style>
</head>
<?php
session_start(); // Pastikan session dimulai

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['level'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: ../login.php");
    exit();
}

// Cek level pengguna, misalnya hanya admin yang bisa mengakses
if ($_SESSION['level'] != "admin") {
    // Jika pengguna bukan admin, arahkan ke halaman yang sesuai
    header("Location: ../penjualan"); // Ganti dengan halaman yang sesuai untuk kasir
    exit();
}
?>

<header class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h2 class="mb-0">Toko OBAT</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white rounded-3" href="../halaman">Halaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white rounded-3" href="../penjualan">Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white rounded-3" href="../produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white rounded-3" href="../pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white rounded-3" href="../petugas">Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-success text-white rounded-3" href="../report">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning text-white rounded-3" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <h1>Dashboard</h1>
    <div class="chart-container">
        <!-- Area Chart -->
        <canvas id="areaChart"></canvas>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    &copy; 2024 Toko OBAT. All Rights Reserved.
</div>

<!-- Bootstrap JS and Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Fetch data penjualan dari file PHP
    fetch('../api/get_penjualan.php') // Sesuaikan dengan path file PHP Anda
        .then(response => response.json())
        .then(data => {
            // Memisahkan tanggal dan total_harga dari data penjualan
            const labels = data.map(item => item.tanggal); // Mendapatkan tanggal
            const totalHarga = data.map(item => item.total_harga); // Mendapatkan total_harga

            // Membuat grafik area dengan data yang diambil
            const ctx1 = document.getElementById('areaChart').getContext('2d');
            const areaChart = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: labels, // Menggunakan tanggal sebagai label
                    datasets: [{
                        label: 'Total Penjualan',
                        data: totalHarga, // Menggunakan total_harga sebagai data
                        fill: true,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        tension: 0.3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgba(0,0,0,0.7)'
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>

</body>
</html>
