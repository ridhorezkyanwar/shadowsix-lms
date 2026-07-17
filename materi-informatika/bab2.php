<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jaringan Komputer & Internet - ShadowSix</title>
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
      <div class="hero-title">Jaringan Komputer & Internet</div>
      <div class="hero-desc">
        Memahami dasar-dasar jaringan, perangkatnya, dan cara kerja internet.
      </div>
    </div>

    <div class="content">
      <h1>BAB 2</h1>
      <h1>JARINGAN KOMPUTER & INTERNET</h1>

      <h2>Inti Materi</h2>
      <p>Memahami dasar-dasar jaringan, perangkatnya, dan cara kerja internet.</p>

      <ul>
        <li>Jaringan = menghubungkan komputer untuk bertukar data.</li>
        <li>Jenis jaringan: LAN, MAN, WAN.</li>
        <li>Topologi: bus, star, ring, mesh.</li>
        <li>Perangkat jaringan: router, switch, modem, access point.</li>
        <li>Internet bekerja dengan IP Address dan DNS.</li>
        <li>Keamanan jaringan: firewall, enkripsi, password kuat.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>