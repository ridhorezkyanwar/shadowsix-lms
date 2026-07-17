<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemrograman Dasar (Python) - ShadowSix</title>
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
      <div class="hero-title">Pemrograman Dasar (Python)</div>
      <div class="hero-desc">
        Perkenalan sintaks dasar Python — bahasa yang umum dipakai di pembelajaran AI karena sederhana dan kuat.
      </div>
    </div>

    <div class="content">
      <h1>BAB 3</h1>
      <h1>PEMROGRAMAN DASAR (PYTHON)</h1>

      <h2>Inti Materi</h2>
      <p>
        Perkenalan sintaks dasar Python — bahasa yang umum dipakai di
        pembelajaran AI karena sederhana dan kuat.
      </p>

      <ul>
        <li>Variabel, tipe data (int, float, string, boolean).</li>
        <li>Operator aritmatika dan logika.</li>
        <li>Kontrol alur: if-else, for, while.</li>
        <li>Fungsi sederhana: definisi, parameter, return.</li>
        <li>Input/output dan penanganan error dasar (try-except).</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>
