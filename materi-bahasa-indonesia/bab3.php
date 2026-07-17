<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menulis Eksposisi & Esei Singkat - ShadowSix</title>
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
      <div class="hero-title">Menulis Eksposisi & Esei Singkat</div>
      <div class="hero-desc">
        Menyampaikan argumen dan menjelaskan ide secara logis dan terstruktur.
      </div>
    </div>

    <div class="content">
      <h1>BAB 3</h1>
      <h1>MENULIS EKSPOSISI & ESEI SINGKAT</h1>

      <h2>Inti Materi</h2>
      <p>Menyampaikan argumen dan menjelaskan ide secara logis dan terstruktur.</p>

      <ul>
        <li>Eksposisi: tesis, argumen, bukti, penegasan ulang.</li>
        <li>Esei: pendahuluan → isi → penutup.</li>
        <li>Kohesi paragraf dan penggunaan konjungsi logis.</li>
        <li>Latihan: menulis opini tentang isu aktual.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>