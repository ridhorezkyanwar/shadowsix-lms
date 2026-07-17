<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menghindari Pergaulan Bebas - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="pai.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="pai.php">kembali ke materi PAI</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
      </nav>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <div class="user-info">
        <span class="username"
          >Halo,
          <?php echo htmlspecialchars($_SESSION['username']); ?>!</span
        >
        <a
          href="../logout.php"
          class="login-btn logout-btn"
          style="text-decoration: none"
          >Logout</a
        >
      </div>
      <?php else: ?>
      <a href="../login.php" class="login-btn" style="text-decoration: none"
        >Login</a
      >
      <?php endif; ?>
    </div>

    <div class="hero">
      <div class="hero-title">Menghindari Pergaulan Bebas dan Pengaruh Buruk Lingkungan</div>
      <div class="hero-desc">
        Menjaga diri dari perilaku yang menyimpang dari norma agama dan sosial.
      </div>
    </div>

    <div class="content">
        <h1>BAB 6</h1>
        <h1>Menghindari Pergaulan Bebas dan Pengaruh Buruk Lingkungan</h1>

        <h2>Pengertian Pergaulan Bebas</h2>
        <p>Tindakan atau perilaku yang menyimpang dari norma agama maupun sosial.</p>

        <h2>Bentuk Pergaulan Negatif</h2>
        <ul>
            <li>Pacaran bebas</li>
            <li>Penyalahgunaan narkoba</li>
            <li>Perilaku kekerasan</li>
            <li>Pornografi & pornoaksi</li>
        </ul>

        <h2>Dampak Negatif</h2>
        <ul>
            <li>Merusak kesehatan</li>
            <li>Menurunkan prestasi</li>
            <li>Merusak masa depan</li>
        </ul>

        <h2>Cara Menghindari</h2>
        <ul>
            <li>Memilih teman yang baik</li>
            <li>Mengisi waktu dengan kegiatan positif</li>
            <li>Meningkatkan iman dan takwa</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Belajar RPL SMK</p>
    </footer>
  </body>
</html>