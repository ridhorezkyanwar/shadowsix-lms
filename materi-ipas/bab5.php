<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kearifan Lokal dan Kelestarian - ShadowSix</title>
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
      <div class="hero-title">Kearifan Lokal dan Kelestarian</div>
      <div class="hero-desc">
        Menjelajahi bagaimana nilai-nilai tradisional membantu menjaga kelestarian alam dan sosial.
      </div>
    </div>

    <div class="content">
        <h1>BAB 5</h1>
        <h1>Kearifan Lokal dan Kelestarian</h1>

        <h2>Pengertian kearifan lokal</h2>
        <p>Kearifan lokal adalah nilai, kebiasaan, dan praktik tradisional suatu masyarakat yang membantu menjaga harmoni dengan lingkungan.</p>

        <h2>Contoh kearifan lokal di Indonesia</h2>
        <ul>
            <li>Sistem Subak di Bali</li>
            <li>Sasi di Maluku</li>
            <li>Dewi Sri di Jawa</li>
            <li>Uma di Mentawai</li>
        </ul>

        <h2>Peran kearifan lokal</h2>
        <ul>
            <li>Melestarikan alam</li>
            <li>Menjaga keseimbangan sosial</li>
            <li>Mengatur pemanfaatan sumber daya secara bijak</li>
        </ul>

        <h2>Tantangan kearifan lokal</h2>
        <ul>
            <li>Modernisasi</li>
            <li>Hilangnya generasi penerus</li>
            <li>Pengaruh budaya global</li>
        </ul>

        <h2>Projek peserta didik</h2>
        <p>Siswa mendokumentasikan kearifan lokal di daerah setempat dalam bentuk video, artikel, atau presentasi.</p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>