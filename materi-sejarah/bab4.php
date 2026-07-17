<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masa Kerajaan Islam di Indonesia - ShadowSix</title>
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
      <div class="hero-title">Masa Kerajaan Islam di Indonesia</div>
      <div class="hero-desc">
        Mempelajari perkembangan Islam di Indonesia dan pengaruhnya terhadap budaya dan politik.
      </div>
    </div>

    <div class="content">
        <h1>BAB 4</h1>
        <h1>MASA KERAJAAN ISLAM DI INDONESIA</h1>

        <h2>Inti Materi</h2>
        <p>Mempelajari perkembangan Islam di Indonesia dan pengaruhnya terhadap budaya dan politik.</p>

        <ul>
            <li>Proses masuk: perdagangan internasional, perkawinan, dakwah ulama.</li>
            <li>Kerajaan Islam utama: Samudra Pasai, Malaka, Aceh, Demak, Banten, Mataram Islam, Ternate–Tidore.</li>
            <li>Perkembangan budaya: aksara Arab Melayu, seni kaligrafi, arsitektur masjid.</li>
            <li>Perdagangan dan politik: jalur rempah, perebutan hegemoni di Nusantara.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>