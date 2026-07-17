<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aktivitas Bela Diri - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="pjok.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../materi-pjok/pjok.php">kembali ke materi PJOK</a>
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
      <div class="hero-title">Aktivitas Bela Diri</div>
      <div class="hero-desc">
        Mempelajari teknik bertahan, pengendalian diri, serta etika dalam bela diri.
      </div>
    </div>

    <div class="content">
      <h1>BAB 5 – Aktivitas Bela Diri</h1>
      <h2>Rangkuman</h2>
      <ul>
        <li>Bela diri mengajarkan teknik bertahan sekaligus pengendalian diri.</li>
        <li>Pencak silat: kuda-kuda, pukulan, tendangan, elakan.</li>
        <li>Karate: kuda-kuda (dachi), pukulan (tsuki), tendangan (geri).</li>
        <li>Etika dan disiplin merupakan bagian penting.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30 </p>
    </footer>
  </body>
</html>