<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Membaca Kritis & Literasi - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="bahasa.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../bahasa indonesia.php">kembali ke materi Bahasa Indonesia</a>
        <a href="../tentang.php">Tentang</a>
        <a href="../kontak/kontak.php">Kontak</a>
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
      <div class="hero-title">Membaca Kritis & Literasi</div>
      <div class="hero-desc">
        Mengembangkan kemampuan memahami, mengevaluasi, dan menarik kesimpulan dari berbagai teks.
      </div>
    </div>

    <div class="content">
      <h1>BAB 1</h1>
      <h1>MEMBACA KRITIS & LITERASI</h1>

      <h2>Inti Materi</h2>
      <p>Mengembangkan kemampuan memahami, mengevaluasi, dan menarik kesimpulan dari berbagai teks (informatif, naratif, deskriptif).</p>

      <ul>
        <li>Strategi membaca: pra-baca, baca aktif, pasca-baca.</li>
        <li>Menentukan gagasan pokok & tujuan penulis.</li>
        <li>Membedakan fakta dan opini.</li>
        <li>Evaluasi kredibilitas sumber.</li>
        <li>Membuat ringkasan dan peta konsep.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>