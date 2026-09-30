<?php

require_once "config/database.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM produk
     ORDER BY id DESC
     LIMIT 6"
);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Abigaile Co - Accessories Store</title>

    <link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="navbar">
    <div class="container">
        <!-- Urutan pertama otomatis menjadi logo di kiri berkat CSS sebelumnya -->
        <a href="index.php">Abigaile Co</a>
        
        <!-- Menu lainnya akan otomatis berjejer di ujung kanan -->
        <a href="index.php">Home</a>
        <a href="produk.php">Produk</a>
        <a href="tentang.php">Tentang Kami</a>
    </div>
</div>

<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Abigaile Co</h1>
            <p>Your Everyday Elegance</p>
            <a href="produk.php" class="btn">Lihat Produk</a>
        </div>
        <div class="hero-image">
            <!-- Ubah nama file gambar sesuai dengan yang kamu simpan -->
            <img src="assets/images/hero.jpg" alt="Abigaile Co Hero">
        </div>
    </div>
</section>

<div class="container">

    <h2>Produk Terbaru</h2>

    <div class="grid">

        <?php while ($row = mysqli_fetch_assoc($query)): ?>

        <div class="card">

            <?php if ($row['gambar']): ?>

                <img
                    src="uploads/produk/<?= htmlspecialchars($row['gambar']); ?>"
                    class="product-image"
                >

            <?php endif; ?>

            <h3>
                <?= htmlspecialchars($row['nama']); ?>
            </h3>

            <p>
                <?= htmlspecialchars($row['kategori']); ?>
            </p>

            <strong>
                Rp <?= number_format(
                    $row['harga'],
                    0,
                    ',',
                    '.'
                ); ?>
            </strong>

            <br><br>

            <a
                href="detail.php?id=<?= $row['id']; ?>"
                class="btn"
            >
                Detail
            </a>

        </div>

        <?php endwhile; ?>

    </div>

</div>

</body>

</html>