<?php
session_start();
include '../databasecpnel.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengenalan Informatika & Sistem Komputer - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="informatika.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../informatika.php">kembali ke materi Informatika</a>
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

    <main>
    <div class="hero">
      <div class="hero-title">Pengenalan Informatika & Sistem Komputer</div>
      <div class="hero-desc">
        Memahami konsep dasar informatika dan komponen sistem komputer.
      </div>
    </div>
    <!-- Konten materi ini sekarang diambil dari database melalui view_materi.php -->
    <div class="content">
      <p style="text-align: center; color: var(--muted); padding: 20px;">
        Materi ini sekarang diakses secara dinamis. Silakan kunjungi halaman mata pelajaran Informatika dan klik materi yang relevan.
      </p>
      <p style="text-align: center;">
        <a href="../informatika.php" class="back-link" style="display: inline;">&larr; Kembali ke Daftar Materi Informatika</a>
      </p>
    </div>
    </main>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>