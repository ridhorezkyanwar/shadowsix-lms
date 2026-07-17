<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teknologi untuk Kehidupan - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="ipas.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../ipas.php">kembali ke materi IPAS</a>
        <a href="#">Tentang</a>
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
      <div class="hero-title">Teknologi untuk Kehidupan</div>
      <div class="hero-desc">
        Memahami bagaimana teknologi membentuk dan mempermudah kehidupan manusia.
      </div>
    </div>

    <div class="content">
      <h1>BAB 3</h1>
      <h1>Teknologi untuk Kehidupan</h1>

      <h2>Pengertian teknologi</h2>
      <p>Teknologi adalah penerapan ilmu pengetahuan untuk mempermudah aktivitas manusia.</p>

      <h2>Jenis teknologi</h2>
      <ul>
          <li>Teknologi informasi</li>
          <li>Teknologi komunikasi</li>
          <li>Teknologi transportasi</li>
          <li>Teknologi kesehatan</li>
      </ul>

      <h2>Dampak teknologi</h2>
      <ul>
          <li>Dampak positif: efisiensi, akses informasi cepat, inovasi kesehatan</li>
          <li>Dampak negatif: kecanduan gadget, polusi elektronik, kesenjangan digital</li>
      </ul>

      <h2>Etika penggunaan teknologi</h2>
      <p>Pengguna teknologi harus menjaga privasi, keamanan data, dan menggunakan teknologi secara bijak.</p>

      <h2>Projek peserta didik</h2>
      <p>Siswa membuat prototipe sederhana seperti alat sensor, aplikasi kecil, atau media edukasi digital.</p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>