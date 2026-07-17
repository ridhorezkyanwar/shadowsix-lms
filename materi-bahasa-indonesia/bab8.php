<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Literasi Media & Teks Digital - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="bahasa.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../indonesia.php">kembali ke materi Bahasa Indonesia</a>
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
      <div class="hero-title">Literasi Media & Teks Digital</div>
      <div class="hero-desc">
        Memahami cara kerja media dan kemampuan membaca teks digital secara kritis.
      </div>
    </div>

    <div class="content">
      <h1>BAB 8</h1>
      <h1>LITERASI MEDIA & TEKS DIGITAL</h1>

      <h2>Inti Materi</h2>
      <p>Memahami cara kerja media dan kemampuan membaca teks digital secara kritis.</p>

      <ul>
        <li>Jenis teks media: berita, feature, iklan, opini.</li>
        <li>Mengecek kredibilitas sumber & deteksi hoaks.</li>
        <li>Penulisan web: judul pendek, paragraf efektif, hyperlink.</li>
        <li>Latihan: menulis ringkasan berita & postingan blog.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>