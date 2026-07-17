<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sastra: Puisi & Cerita Pendek - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="bahasa.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../indonesia.php">kembali ke materi Bahasa Indonesia</a>
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
      <div class="hero-title">Sastra: Puisi & Cerita Pendek</div>
      <div class="hero-desc">
        Mengenal unsur dan teknik penciptaan karya sastra puisi dan cerpen.
      </div>
    </div>

    <div class="content">
      <h1>BAB 4</h1>
      <h1>SASTRA: PUISI & CERITA PENDEK</h1>

      <h2>Inti Materi</h2>
      <p>Mengenal unsur dan teknik penciptaan karya sastra puisi dan cerpen.</p>

      <ul>
        <li>Puisi: diksi, rima, majas, citraan.</li>
        <li>Cerpen: orientasi, konflik, resolusi.</li>
        <li>Menganalisis tema, karakter, dan pesan moral.</li>
        <li>Latihan: menulis puisi & cerpen mini.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>