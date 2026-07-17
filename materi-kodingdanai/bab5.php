<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengenalan Machine Learning - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="koding.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="kodingdanai.php">kembali ke materi Coding & AI</a>
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
      <div class="hero-title">Pengenalan Machine Learning</div>
      <div class="hero-desc">
        Memahami konsep dasar machine learning (ML): supervised,
        unsupervised, dan aplikasi umumnya.
      </div>
    </div>

    <div class="content">
      <h1>BAB 5</h1>
      <h1>PENGENALAN MACHINE LEARNING</h1>

      <h2>Inti Materi</h2>
      <p>
        Memahami konsep dasar machine learning (ML): supervised, unsupervised,
        dan aplikasi umumnya.
      </p>

      <ul>
        <li>
          Perbedaan: supervised (label), unsupervised (cluster), reinforcement.
        </li>
        <li>
          Alur umum ML: kumpulkan data → preprocessing → pelatihan → evaluasi
          → deployment.
        </li>
        <li>Contoh algoritma sederhana: regresi linear, K-means, decision tree.</li>
        <li>
          Konsep overfitting & underfitting — pentingnya data yang cukup dan
          validasi.
        </li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>