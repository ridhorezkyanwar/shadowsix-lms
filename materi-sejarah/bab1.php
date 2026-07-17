<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manusia Purba di Indonesia - ShadowSix</title>
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
      <div class="hero-title">Manusia Purba di Indonesia</div>
      <div class="hero-desc">
        Mempelajari jenis-jenis manusia purba di Indonesia, ciri-cirinya, dan persebarannya.
      </div>
    </div>

    <div class="content">
        <h1>BAB 1</h1>
        <h1>MANUSIA PURBA DI INDONESIA</h1>

        <h2>Inti Materi</h2>
        <p>Mempelajari jenis-jenis manusia purba di Indonesia, ciri-cirinya, dan persebarannya.</p>

        <ul>
            <li>Jenis manusia purba: Meganthropus, Pithecanthropus, Homo erectus, Homo sapiens awal.</li>
            <li>Penemu penting: Eugene Dubois (Java Man), G.H.R. von Koenigswald.</li>
            <li>Wilayah temuan: Sangiran, Trinil, Ngandong.</li>
            <li>Teknologi awal: kapak perimbas, alat serpih, kapak genggam.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>