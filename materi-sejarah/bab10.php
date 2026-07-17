<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perjuangan Mempertahankan Kemerdekaan - ShadowSix</title>
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
      <div class="hero-title">Perjuangan Mempertahankan Kemerdekaan (1945–1949)</div>
      <div class="hero-desc">
        Mengkaji perjuangan diplomasi dan militer Indonesia setelah proklamasi.
      </div>
    </div>

    <div class="content">
        <h1>BAB 10</h1>
        <h1>PERJUANGAN MEMPERTAHANKAN KEMERDEKAAN (1945–1949)</h1>

        <h2>Inti Materi</h2>
        <p>Mengkaji perjuangan diplomasi dan militer Indonesia setelah proklamasi.</p>

        <ul>
            <li>Agresi Militer Belanda I & II.</li>
            <li>Diplomasi: Linggarjati, Renville, Roem-Royen.</li>
            <li>Serangan umum 1 Maret 1949.</li>
            <li>Konferensi Meja Bundar (KMB) → pengakuan kedaulatan RI.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>