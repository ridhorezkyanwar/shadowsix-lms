<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perubahan Sosial dan Budaya - ShadowSix</title>
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
      <div class="hero-title">Perubahan Sosial dan Budaya</div>
      <div class="hero-desc">
        Menganalisis faktor dan dampak dari perubahan sosial dan budaya dalam masyarakat.
      </div>
    </div>

    <div class="content">
        <h1>BAB 6</h1>
        <h1>Perubahan Sosial dan Budaya</h1>

        <h2>Pengertian perubahan sosial</h2>
        <p>Perubahan sosial adalah pergeseran struktur, perilaku, atau pola hidup masyarakat dari waktu ke waktu.</p>

        <h2>Faktor penyebab perubahan</h2>
        <ul>
            <li>Teknologi</li>
            <li>Pendidikan</li>
            <li>Ekonomi</li>
            <li>Interaksi budaya</li>
        </ul>

        <h2>Dampak perubahan sosial</h2>
        <ul>
            <li>Peningkatan kualitas hidup</li>
            <li>Ketersediaan teknologi modern</li>
            <li>Perubahan nilai dan norma</li>
            <li>Potensi konflik sosial</li>
        </ul>

        <h2>Perubahan budaya</h2>
        <p>Budaya dapat berubah melalui akulturasi, asimilasi, difusi, atau inovasi baru dalam masyarakat.</p>

        <h2>Projek peserta didik</h2>
        <p>Siswa membuat studi observasi tentang perubahan budaya di lingkungan mereka, lalu menyajikannya dalam laporan atau presentasi visual.</p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>