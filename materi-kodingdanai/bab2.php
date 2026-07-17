<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Algoritma & Pemecahan Masalah - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="koding.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../kodingdanai.php">kembali ke materi Coding & AI</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
      </nav>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <div class="user-info">
        <span class="username"
          >Selamat Datang,
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
      <div class="hero-title">Algoritma & Pemecahan Masalah</div>
      <div class="hero-desc">
        Memahami langkah sistematis untuk menyelesaikan masalah (algoritma) dan bagaimana merancang solusi sebelum coding.
      </div>
    </div>

    <div class="content">
        <h1>BAB 2</h1>
        <h1>ALGORITMA & PEMECAHAN MASALAH</h1>

        <h2>Inti Materi</h2>
        <p>Memahami langkah sistematis untuk menyelesaikan masalah (algoritma) dan bagaimana merancang solusi sebelum coding.</p>

        <ul>
            <li>Definisi algoritma dan sifat-sifatnya (jelas, terurut, hingga/finite).</li>
            <li>Representasi: pseudocode dan flowchart.</li>
            <li>Strategi pemecahan masalah: dekomposisi, pattern recognition, abstraction.</li>
            <li>Contoh sederhana: algoritma mencari nilai maksimum, menghitung rata-rata.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>