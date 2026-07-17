<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Etika, Privasi & Keamanan AI - ShadowSix</title>
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
      <div class="hero-title">Etika, Privasi & Keamanan AI</div>
      <div class="hero-desc">
        Aspek etika dan risiko penggunaan AI: bias, privasi data, keamanan, dan
        dampak sosial.
      </div>
    </div>

    <div class="content">
      <h1>BAB 9</h1>
      <h1>ETIKA, PRIVASI & KEAMANAN AI</h1>

      <h2>Inti Materi</h2>
      <p>
        Aspek etika dan risiko penggunaan AI: bias, privasi data, keamanan, dan
        dampak sosial.
      </p>

      <ul>
        <li>Bias data dan bagaimana meminimalkannya (pemilihan data representatif).</li>
        <li>Privasi: penyimpanan data sensitif dan izin penggunaan data.</li>
        <li>Keamanan model: serangan adversarial dan perlunya validasi.</li>
        <li>Tanggung jawab penggunaan: seberapa penting transparansi dan audit algoritma.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>