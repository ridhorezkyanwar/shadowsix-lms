<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Algoritma & Flowchart - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="informatika.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../informatika.php">kembali ke materi Informatika</a>
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
      <div class="hero-title">Algoritma & Flowchart</div>
      <div class="hero-desc">
        Mempelajari langkah-langkah sistematis untuk menyelesaikan masalah.
      </div>
    </div>

    <div class="content">
      <h1>BAB 3</h1>
      <h1>ALGORITMA & FLOWCHART</h1>

      <h2>Inti Materi</h2>
      <p>Mempelajari langkah-langkah sistematis untuk menyelesaikan masalah.</p>

      <ul>
        <li>Algoritma = urutan langkah logis untuk menyelesaikan masalah.</li>
        <li>Ciri algoritma: jelas, terstruktur, dapat dijalankan.</li>
        <li>Representasi: pseudocode & flowchart.</li>
        <li>Simbol flowchart: start/end, proses, input-output, keputusan.</li>
        <li>Contoh: algoritma menghitung luas bangun datar.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>