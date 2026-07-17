<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Statistika - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="mtk.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../matematika.php">kembali ke materi Matematika</a>
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
      <div class="hero-title">Statistika</div>
      <div class="hero-desc">
        Mempelajari cara mengumpulkan, mengolah, dan menyajikan data.
      </div>
    </div>

    <div class="content">
      <h1>BAB 7</h1>
      <h1>Statistika</h1>

      <h2>Jenis Data</h2>
      <p>Data dapat berupa data tunggal atau data kelompok.</p>

      <h2>Ukuran Pemusatan</h2>
      <ul>
          <li>Mean (rata-rata)</li>
          <li>Median (nilai tengah)</li>
          <li>Modus (nilai paling sering muncul)</li>
      </ul>

      <h2>Penyajian Data</h2>
      <p>Data dapat disajikan dalam bentuk tabel, diagram batang, diagram lingkaran, maupun histogram.</p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>