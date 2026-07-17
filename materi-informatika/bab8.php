<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keamanan Digital & Etika Teknologi - ShadowSix</title>
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
      <div class="hero-title">Keamanan Digital & Etika Teknologi</div>
      <div class="hero-desc">
        Mempelajari perlindungan data dan etika dalam penggunaan teknologi.
      </div>
    </div>

    <div class="content">
      <h1>BAB 8</h1>
      <h1>KEAMANAN DIGITAL & ETIKA TEKNOLOGI</h1>

      <h2>Inti Materi</h2>
      <p>Mempelajari perlindungan data dan etika dalam penggunaan teknologi.</p>

      <ul>
        <li>Jenis ancaman: malware, phishing, hacking.</li>
        <li>Proteksi: antivirus, enkripsi, backup, password kuat.</li>
        <li>Privasi digital & jejak digital.</li>
        <li>Etika teknologi: plagiarisme, izin sumber, perilaku online.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>