<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toko OBAT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Warna hijau untuk elemen navbar */
    .navbar {
      background: linear-gradient(45deg, #218838, #28a745); /* Gradien hijau */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan pada navbar */
    }
    /* Warna untuk tombol dan elemen lain */
    .btn-primary {
      background-color: #28a745; /* Hijau lebih terang */
      border-color: #28a745;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan pada tombol */
      transition: all 0.3s ease; /* Transisi pada hover */
    }
    .btn-primary:hover {
      background-color: #218838; /* Warna lebih gelap pada hover */
    }
    .btn-secondary {
      background-color: #218838;
      border-color: #218838;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }
    .btn-secondary:hover {
      background-color: #19692c;
    }
    .btn-success {
      background-color: #1e7e34;
      border-color: #1e7e34;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .btn-warning {
      background-color: #ffc107;
      border-color: #ffc107;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }
    .btn-warning:hover {
      background-color: #e0a800;
    }
    /* Pisahkan Laporan dan Logout */
    .nav-item.logout {
      margin-left: 20px; /* Jarak antara laporan dan logout */
    }
    /* Sesuaikan header agar tetap di atas */
    header {
      background-color: #343a40; /* Warna gelap untuk header */
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      padding: 0.5rem 0;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan pada header */
    }
    .navbar-brand h2 {
      font-size: 1.75rem;
      margin-bottom: 0;
      font-weight: bold;
      color: #fff;
    }
    /* Tambahkan padding bawah agar konten tidak terhalang header */
    body {
      padding-top: 80px;
    }
    /* Tambahkan padding dan hover pada elemen menu */
    .nav-link {
      padding: 0.5rem 1rem;
      border-radius: 50px; /* Rounded buttons */
      transition: background-color 0.3s ease;
    }
    .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.2); /* Efek hover pada link */
    }
  </style>
</head>
<body>

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
            <a class="nav-link btn-sm btn-primary text-white rounded-3 px-4 mx-1 my-1" href="../penjualan">Penjualan</a>
          </li>
          <?php if($_SESSION['level']=="admin"){ ?>
          <li class="nav-item">
            <a class="nav-link btn-sm btn-primary text-white rounded-3 px-4 mx-1 my-1" href="../produk">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-sm btn-primary text-white rounded-3 px-4 mx-1 my-1" href="../pelanggan">Pelanggan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-sm btn-secondary text-white rounded-3 px-4 mx-1 my-1" href="../petugas">Petugas</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link btn-sm btn-success text-white rounded-3 px-4 mx-1 my-1" href="../report">Laporan</a>
          </li>
          <li class="nav-item logout">
            <a class="nav-link btn-sm btn-warning text-white rounded-3 px-4 mx-1 my-1" href="../logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
