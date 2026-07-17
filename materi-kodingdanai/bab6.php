<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Preprocessing & Fitur Engineering - ShadowSix</title>
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
      <div class="hero-title">Preprocessing & Fitur Engineering</div>
      <div class="hero-desc">
        Teknik menyiapkan data agar model AI bekerja lebih baik: pembersihan,
        normalisasi, encoding.
      </div>
    </div>

    <div class="content">
      <h1>BAB 6</h1>
      <h1>PREPROCESSING & FITUR ENGINEERING</h1>

      <h2>Inti Materi</h2>
      <p>
        Teknik menyiapkan data agar model AI bekerja lebih baik: pembersihan,
        normalisasi, encoding.
      </p>

      <ul>
        <li>Membersihkan data: mengatasi missing value dan outlier.</li>
        <li>Skala/normalisasi: min-max, standardization.</li>
        <li>Encoding data kategorikal: one-hot, label encoding.</li>
        <li>
          Membuat fitur baru (feature engineering) sederhana untuk meningkatkan
          performa model.
        </li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>