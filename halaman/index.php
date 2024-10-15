<?php
session_start();
if (!isset($_SESSION['id_user'])){
    header("Location: ../index.php");
    exit();
}
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 'Nama Pengguna Tidak Ditemukan'; // Default jika kunci "nama_user" tidak tersedia
$level = isset($_SESSION['level']) ? $_SESSION['level'] : 'Level tidak ditemukan';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;
        }
        .home-container {
            text-align: center;
            margin-top: 50px;
        }
        .welcome-text {
            font-size: 24px;
            color: #495057;
        }
        .logout-btn {
            background-color: #dc3545;
            border: 1px solid #dc3545;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background-color: #c82333;
            border: 1px solid #c82333;
        }
        .bawah
        {
            text-align: center;
            width: 1500PX;
	        position: fixed;
	        bottom: 0;
        }
    </style>
</head>
<body>
    <?php
include "../header.php";
?>
    <div class="container home-container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="welcome-text">Selamat Datang <?php echo $id_user; ?> di Halaman Utama</h2>
                <p>Anda berhasil login sebagai <?php echo $level; ?></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<footer>
<div class="bawah">
Copyright &copy <?= date("Y") ?> By. Kelompok 7 12RPL2
</div>
</footer>
</html>