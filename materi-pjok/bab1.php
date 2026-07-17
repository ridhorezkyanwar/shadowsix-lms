<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kebugaran Jasmani - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="pjok.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../materi-pjok/pjok.php">kembali ke materi PJOK</a>
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
      <div class="hero-title">Kebugaran Jasmani</div>
      <div class="hero-desc">
        Mempelajari kemampuan tubuh melakukan aktivitas sehari-hari tanpa kelelahan berlebih.
      </div>
    </div>

    <div class="content">
      <h1>BAB 1 – Kebugaran Jasmani</h1>
      <h2>Rangkuman</h2>
      <ul>
        <li>Kebugaran jasmani merupakan kemampuan tubuh melakukan aktivitas sehari-hari tanpa kelelahan berlebih.</li>
        <li>Komponen utama: kekuatan, daya tahan, kelincahan, kecepatan, koordinasi, dan fleksibilitas.</li>
        <li>Bentuk latihan: lari, push-up, sit-up, plank, skipping.</li>
        <li>Prinsip latihan: overload, progresif, spesifik.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>