<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beriman kepada Malaikat - ShadowSix</title>
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
      <div class="hero-title">Beriman kepada Malaikat-Malaikat Allah</div>
      <div class="hero-desc">
        Meyakini keberadaan malaikat sebagai makhluk Allah yang taat.
      </div>
    </div>

    <div class="content">
        <h1>BAB 1</h1>
        <h1>Beriman kepada Malaikat-Malaikat Allah</h1>

        <h2>Pengertian Beriman kepada Malaikat</h2>
        <p>Iman kepada malaikat berarti meyakini bahwa malaikat adalah makhluk Allah yang diciptakan dari cahaya dan selalu taat kepada perintah-Nya.</p>

        <h2>Sifat-Sifat Malaikat</h2>
        <ul>
            <li>Tercipta dari cahaya</li>
            <li>Tidak makan dan minum</li>
            <li>Selalu taat kepada Allah</li>
            <li>Tidak memiliki hawa nafsu</li>
        </ul>

        <h2>Nama-Nama Malaikat dan Tugasnya</h2>
        <ul>
            <li>Jibril: menyampaikan wahyu</li>
            <li>Mikail: mengatur rezeki</li>
            <li>Israfil: meniup sangkakala</li>
            <li>Izrail: mencabut nyawa</li>
            <li>Munkar & Nakir: menanya di alam kubur</li>
            <li>Raqib & Atid: mencatat amal baik & buruk</li>
            <li>Malik: penjaga neraka</li>
            <li>Ridwan: penjaga surga</li>
        </ul>

        <h2>Hikmah Beriman kepada Malaikat</h2>
        <ul>
            <li>Menambah ketakwaan</li>
            <li>Mendorong berbuat baik</li>
            <li>Menghindari maksiat</li>
            <li>Meyakini keadilan Allah</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Belajar RPL SMK</p>
    </footer>
  </body>
</html>