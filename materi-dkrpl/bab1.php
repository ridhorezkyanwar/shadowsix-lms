<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengenalan RPL - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="dkrpl.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../dkrpl.php">kembali ke materi DK RPL</a>
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
      <div class="hero-title">Pengenalan RPL</div>
      <div class="hero-desc">
        Mempelajari proses merancang, membuat, dan memelihara perangkat lunak.
      </div>
    </div>

    <div class="content">
      <h1>BAB 1</h1>
      <h1>PENGENALAN RPL</h1>

      <h2>Rangkuman</h2>
      <ul>
        <li>RPL mempelajari proses merancang, membuat, dan memelihara perangkat lunak.</li>
        <li>Lingkup kerja meliputi analisis kebutuhan, desain sistem, implementasi, pengujian, dan perawatan.</li>
        <li>Perangkat lunak berbeda dengan perangkat keras; software bersifat digital.</li>
        <li>Jenis software meliputi sistem operasi, aplikasi, dan utility.</li>
        <li>SDLC adalah tahapan yang digunakan dalam pengembangan perangkat lunak.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>