<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kehidupan Masa Praaksara - ShadowSix</title>
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
      <div class="hero-title">Perkembangan Kehidupan Sosial-Budaya Masa Praaksara</div>
      <div class="hero-desc">
        Perubahan kehidupan manusia dari berburu-meramu hingga bercocok tanam dan menetap.
      </div>
    </div>

    <div class="content">
        <h1>BAB 2</h1>
        <h1>PERKEMBANGAN KEHIDUPAN SOSIAL-BUDAYA MASA PRAAKSARA</h1>

        <h2>Inti Materi</h2>
        <p>Menjelaskan perubahan kehidupan manusia dari berburu-meramu hingga bercocok tanam dan menetap.</p>

        <ul>
            <li>Masa berburu–meramu: hidup nomaden, alat batu sederhana.</li>
            <li>Masa bercocok tanam: mulai menetap, muncul sistem sosial awal.</li>
            <li>Masa perundagian: teknologi logam, pembagian kerja lebih jelas.</li>
            <li>Peninggalan budaya: menhir, dolmen, sarkofagus, punden berundak.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>