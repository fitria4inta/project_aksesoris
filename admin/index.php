<?php

require_once "../includes/auth.php";
require_once "../config/database.php";

$total_produk = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM produk"
);
$data_produk = mysqli_fetch_assoc($total_produk);

$total_kategori = mysqli_query(
    $conn,
    "SELECT COUNT(DISTINCT kategori) AS total FROM produk"
);
$data_kategori = mysqli_fetch_assoc($total_kategori);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin - Abigaile Co</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<!-- Tambahkan class admin-navbar agar warnanya bisa dibedakan -->
<div class="navbar admin-navbar">
    <div class="container">
        <a href="index.php">Dashboard Admin</a>
        
        <!-- Tambahkan ../ agar mengarah ke produk.php di luar folder admin -->
        <a href="../produk.php">Produk</a>
        
        <a href="../index.php">Website</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">

    <!-- Tulisan H1 Dashboard Admin dihapus, diganti dengan sapaan yang lebih besar -->
    <h2 class="admin-greeting">
        Selamat datang, <strong><?= htmlspecialchars($_SESSION['admin_nama']); ?>!</strong>
    </h2>

    <!-- Menggunakan container baru agar posisinya di tengah -->
    <div class="admin-stats-container">

        <div class="admin-stat-card">
            <h3>Total Produk</h3>
            <h1><?= $data_produk['total']; ?></h1>
        </div>

        <div class="admin-stat-card">
            <h3>Total Kategori</h3>
            <h1><?= $data_kategori['total']; ?></h1>
        </div>

        <div class="admin-stat-card">
            <h3>Status</h3>
            <h1>Aktif</h1>
        </div>

    </div>

    <!-- Kotak untuk manajemen produk juga disesuaikan -->
    <div class="admin-management-card">
        <h2>Manajemen Produk</h2>
        <p>Kelola katalog produk Abigaile Co.</p>
        <br>
        <a href="produk.php" class="btn">Kelola Produk</a>
    </div>

</div>

</body>

</html>