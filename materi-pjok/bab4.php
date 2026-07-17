<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atletik - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="pjok.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../pjok.php">kembali ke materi PJOK</a>
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
      <div class="hero-title">Atletik</div>
      <div class="hero-desc">
        Mempelajari berbagai cabang atletik seperti lari, lompat, dan lempar.
      </div>
    </div>

    <div class="content">
      <h1>BAB 4 – Atletik</h1>
      <h2>Rangkuman</h2>
      <ul>
        <li>Lari terdiri dari sprint, jarak menengah, dan jarak jauh.</li>
        <li>Lompat: lompat jauh, lompat tinggi.</li>
        <li>Lempar: tolak peluru, lempar lembing, lempar cakram.</li>
        <li>Mempelajari teknik start, langkah, dan pendaratan.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>