<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kesehatan dan Kesejahteraan - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="ipas.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../ipas.php">kembali ke materi IPAS</a>
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
      <div class="hero-title">Kesehatan dan Kesejahteraan</div>
      <div class="hero-desc">
        Mempelajari pentingnya menjaga kesehatan fisik, mental, dan sosial untuk kesejahteraan.
      </div>
    </div>

    <div class="content">
        <h1>BAB 4</h1>
        <h1>Kesehatan dan Kesejahteraan</h1>

        <h2>Pengertian kesehatan</h2>
        <p>Kesehatan adalah kondisi sejahtera secara fisik, mental, dan sosial, bukan hanya bebas dari penyakit.</p>

        <h2>Faktor yang memengaruhi kesehatan</h2>
        <ul>
            <li>Pola makan</li>
            <li>Aktivitas fisik</li>
            <li>Kesehatan mental</li>
            <li>Kebersihan lingkungan</li>
        </ul>

        <h2>Gizi dan kebutuhan tubuh</h2>
        <p>Tubuh membutuhkan karbohidrat, protein, lemak sehat, vitamin, mineral, dan air untuk menjaga fungsi tubuh.</p>

        <h2>Perilaku hidup bersih dan sehat (PHBS)</h2>
        <ul>
            <li>Mencuci tangan</li>
            <li>Membersihkan lingkungan</li>
            <li>Makan makanan bergizi</li>
            <li>Aktivitas fisik rutin</li>
        </ul>

        <h2>Dampak gaya hidup buruk</h2>
        <ul>
            <li>Obesitas</li>
            <li>Risiko penyakit jantung</li>
            <li>Gangguan mental</li>
            <li>Penurunan imunitas</li>
        </ul>

        <h2>Projek peserta didik</h2>
        <p>Peserta didik membuat kampanye kesehatan seperti poster, modul edukasi, atau kegiatan olahraga kelompok.</p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>