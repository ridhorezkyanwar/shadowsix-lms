<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pergerakan Nasional Indonesia - ShadowSix</title>
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
      <div class="hero-title">Pergerakan Nasional Indonesia</div>
      <div class="hero-desc">
        Masa bangkitnya nasionalisme dan organisasi pergerakan melawan kolonialisme.
      </div>
    </div>

    <div class="content">
        <h1>BAB 7</h1>
        <h1>PERGERAKAN NASIONAL INDONESIA</h1>

        <h2>Inti Materi</h2>
        <p>Masa bangkitnya nasionalisme dan organisasi pergerakan melawan kolonialisme.</p>

        <ul>
            <li>Kebangkitan nasional: Budi Utomo (1908).</li>
            <li>Organisasi modern: Sarekat Islam, Indische Partij, Muhammadiyah, NU.</li>
            <li>Sumpah Pemuda (1928): satu bangsa, satu tanah air, satu bahasa.</li>
            <li>Peran pers dan pendidikan dalam membangkitkan semangat nasional.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>