<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Drama, Dialog, & Pidato - ShadowSix</title>
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
      <div class="hero-title">Drama, Dialog, & Pidato</div>
      <div class="hero-desc">
        Melatih kemampuan berbicara dan ekspresi melalui pementasan serta pidato.
      </div>
    </div>

    <div class="content">
      <h1>BAB 5</h1>
      <h1>DRAMA, DIALOG, & PIDATO</h1>

      <h2>Inti Materi</h2>
      <p>Melatih kemampuan berbicara dan ekspresi melalui pementasan serta pidato.</p>

      <ul>
        <li>Drama: menulis naskah, mengembangkan karakter.</li>
        <li>Pidato: struktur (pembuka–isi–penutup).</li>
        <li>Bicara efektif: intonasi, artikulasi, gesture.</li>
        <li>Latihan: role-play, presentasi, pidato singkat.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>