<?php
require_once "config/database.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = mysqli_query($conn, "SELECT * FROM produk WHERE id = $id");
$produk = mysqli_fetch_assoc($query);

if (!$produk) {
    die("Produk tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title><?= htmlspecialchars($produk['nama']); ?> - Abigaile Co</title>
    <!-- Menggunakan cache busting agar desain langsung berubah -->
    <link rel="stylesheet" href="assets/style.css?v=<?= time(); ?>">
</head>
<body>

<div class="navbar">
    <div class="container">
        <a href="index.php">Abigaile Co</a>
        <a href="index.php">Home</a>
        <a href="produk.php">Produk</a>
        <a href="tentang.php">Tentang Kami</a>
    </div>
</div>

<!-- Container khusus untuk detail produk agar bisa ke tengah -->
<div class="container product-detail-container">
    
    <div class="product-detail-wrapper">
        
        <!-- KOLOM KIRI: Foto Produk -->
        <div class="product-detail-image">
            <?php if ($produk['gambar']): ?>
                <img src="uploads/produk/<?= htmlspecialchars($produk['gambar']); ?>" alt="<?= htmlspecialchars($produk['nama']); ?>">
            <?php endif; ?>
        </div>

        <!-- KOLOM KANAN: Informasi Produk -->
        <div class="product-detail-info">
            <h1><?= htmlspecialchars($produk['nama']); ?></h1>
            
            <p class="category">Kategori: <?= htmlspecialchars($produk['kategori']); ?></p>
            
            <h2 class="price">
                Rp <?= number_format($produk['harga'], 0, ',', '.'); ?>
            </h2>
            
            <div class="description">
                <p><?= nl2br(htmlspecialchars($produk['deskripsi'])); ?></p>
            </div>
            
            <p class="stock">Stok Tersedia: <strong><?= $produk['stok']; ?></strong></p>
            
            <a href="produk.php" class="btn btn-back">Kembali</a>
        </div>

    </div>

</div>

</body>
</html>