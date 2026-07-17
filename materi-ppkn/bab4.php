<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NKRI dan Bentuk Pemerintahan - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="ppkn.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="ppkn.php">kembali ke materi PKN</a>
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
      <div class="hero-title">NKRI dan Bentuk Pemerintahan</div>
      <div class="hero-desc">
        Mengenal konsep Negara Kesatuan Republik Indonesia dan sistem pemerintahannya.
      </div>
    </div>

    <div class="content">
        <h1>BAB 4</h1>
        <h1>NKRI dan Bentuk Pemerintahan</h1>

        <h2>Konsep NKRI</h2>
        <p>NKRI adalah negara yang berbentuk kesatuan, di mana kekuasaan pusat lebih kuat dibandingkan daerah, namun tetap memberi otonomi kepada provinsi.</p>

        <h2>Bentuk Pemerintahan Indonesia</h2>
        <ul>
            <li>Bentuk negara: Kesatuan</li>
            <li>Bentuk pemerintahan: Republik</li>
            <li>Sistem pemerintahan: Presidensial</li>
        </ul>

        <h2>Ciri-Ciri NKRI</h2>
        <ul>
            <li>Satu konstitusi (UUD 1945)</li>
            <li>Satu kepala negara</li>
            <li>Satu wilayah kedaulatan</li>
        </ul>

        <h2>Tujuan NKRI</h2>
        <p>Mewujudkan masyarakat yang adil, makmur, dan bersatu sesuai Pembukaan UUD 1945.</p>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>