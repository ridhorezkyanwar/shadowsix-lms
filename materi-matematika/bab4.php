<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Persamaan Linear Dua Variabel - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="mtk.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../matematika.php">kembali ke materi Matematika</a>
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
      <div class="hero-title">Sistem Persamaan Linear Dua Variabel</div>
      <div class="hero-desc">
        Memahami cara menyelesaikan sistem persamaan linear dengan dua variabel.
      </div>
    </div>

    <div class="content">
      <h1>BAB 4</h1>
      <h1>Sistem Persamaan Linear Dua Variabel</h1>

      <h2>Pengertian SPLDV</h2>
      <p>SPLDV adalah dua persamaan linear dengan dua variabel yang diselesaikan secara bersamaan.</p>

      <h3>Metode penyelesaian</h3>
      <ul>
          <li>Substitusi</li>
          <li>Eliminasi</li>
          <li>Grafik</li>
      </ul>

      <h2>Aplikasi SPLDV</h2>
      <p>SPLDV digunakan untuk menyelesaikan masalah jual-beli, perbandingan, dan sistem biaya.</p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>