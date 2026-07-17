<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ibadah yang Menguatkan Ketakwaan - ShadowSix</title>
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
      <div class="hero-title">Ibadah yang Menguatkan Ketakwaan</div>
      <div class="hero-desc">
        Memahami makna dan tujuan ibadah dalam Islam.
      </div>
    </div>

    <div class="content">
        <h1>BAB 4</h1>
        <h1>Ibadah yang Menguatkan Ketakwaan</h1>

        <h2>Pengertian Ibadah</h2>
        <p>Segala bentuk ketaatan kepada Allah yang dilakukan dengan ikhlas.</p>

        <h2>Jenis-Jenis Ibadah</h2>
        <ul>
            <li>Ibadah wajib: salat, puasa Ramadan, zakat</li>
            <li>Ibadah sunnah: salat tahajud, sedekah, puasa sunnah</li>
        </ul>

        <h2>Tujuan dan Manfaat Ibadah</h2>
        <ul>
            <li>Mendekatkan diri kepada Allah</li>
            <li>Membentuk perilaku baik</li>
            <li>Menjaga kesehatan spiritual</li>
        </ul>

        <h2>Contoh Ibadah sebagai Pelajar</h2>
        <ul>
            <li>Salat wajib tepat waktu</li>
            <li>Mematuhi aturan sekolah</li>
            <li>Belajar dengan sungguh-sungguh</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Belajar RPL SMK</p>
    </footer>
  </body>
</html>