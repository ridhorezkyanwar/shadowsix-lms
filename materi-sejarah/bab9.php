<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perumusan Pancasila & Proklamasi Kemerdekaan - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="sejarah.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="sejarah.php">kembali ke materi Sejarah</a>
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
      <div class="hero-title">Perumusan Pancasila & Proklamasi Kemerdekaan</div>
      <div class="hero-desc">
        Proses perumusan dasar negara dan dinamika menjelang Proklamasi Kemerdekaan Indonesia.
      </div>
    </div>

    <div class="content">
        <h1>BAB 9</h1>
        <h1>PERUMUSAN PANCASILA & PROKLAMASI KEMERDEKAAN</h1>

        <h2>Inti Materi</h2>
        <p>Proses perumusan dasar negara dan dinamika menjelang Proklamasi Kemerdekaan Indonesia.</p>

        <ul>
            <li>BPUPKI: perumusan dasar negara oleh Soekarno, Yamin, Supomo.</li>
            <li>Panitia Sembilan dan Piagam Jakarta.</li>
            <li>Kekalahan Jepang & kekosongan kekuasaan di Indonesia.</li>
            <li>Peristiwa Rengasdengklok dan Proklamasi 17 Agustus 1945.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>