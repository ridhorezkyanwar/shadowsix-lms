<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendidikan Kesehatan - ShadowSix</title>
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
      <div class="hero-title">Pendidikan Kesehatan</div>
      <div class="hero-desc">
        Mempelajari pola hidup sehat, pencegahan cedera, dan pentingnya kesehatan mental.
      </div>
    </div>

    <div class="content">
      <h1>BAB 8 – Pendidikan Kesehatan</h1>
      <h2>Rangkuman</h2>
      <ul>
        <li>Pola hidup sehat meliputi makan bergizi, istirahat cukup, dan rutin berolahraga.</li>
        <li>Pencegahan cedera dan dasar P3K.</li>
        <li>Pentingnya menjaga kesehatan mental.</li>
        <li>Dampak negatif rokok, alkohol, dan napza.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>