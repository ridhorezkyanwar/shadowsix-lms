<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Persatuan dalam Kebhinekaan - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="ppkn.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../ppkn.php">kembali ke materi PPKN</a>
        <a href="../tentang.php">Tentang</a>
        <a href="../kontak/kontak.php">Kontak</a>
      </nav>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <div class="user-info">
        <span class="username">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
        <a href="../logout.php" class="login-btn logout-btn" style="text-decoration: none">Logout</a>
      </div>
      <?php else: ?>
      <a href="../login.php" class="login-btn" style="text-decoration: none">Login</a>
      <?php endif; ?>
    </div>

    <div class="hero">
      <div class="hero-title">Persatuan dalam Kebhinekaan</div>
      <div class="hero-desc">
        Memahami pentingnya persatuan di tengah keberagaman suku, agama, dan budaya.
      </div>
    </div>

    <div class="content">
        <h1>BAB 5</h1>
        <h1>Persatuan dalam Kebhinekaan</h1>

        <h2>Makna Bhinneka Tunggal Ika</h2>
        <p>Berbeda-beda tetapi tetap satu, mencerminkan persatuan di tengah keberagaman.</p>

        <h2>Bentuk Keberagaman</h2>
        <ul>
            <li>Suku</li>
            <li>Agama</li>
            <li>Bahasa</li>
            <li>Adat istiadat</li>
            <li>Kebudayaan</li>
        </ul>

        <h2>Ancaman terhadap Persatuan</h2>
        <ul>
            <li>Perpecahan antar kelompok</li>
            <li>Radikalisme</li>
            <li>Berita bohong (hoaks)</li>
        </ul>

        <h2>Upaya Menjaga Persatuan</h2>
        <ul>
            <li>Gotong royong</li>
            <li>Saling menghormati</li>
            <li>Toleransi</li>
            <li>Mengutamakan kepentingan bangsa</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>