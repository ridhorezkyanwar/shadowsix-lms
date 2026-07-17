<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengantar Coding & AI - ShadowSix</title>
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
      <div class="hero-title">Pengantar Coding & Kecerdasan Buatan (AI)</div>
      <div class="hero-desc">
        Memperkenalkan apa itu pemrograman (coding) dan kecerdasan buatan (AI), ruang lingkup, serta penerapannya di dunia kerja.
      </div>
    </div>

    <div class="content">
        <h1>BAB 1</h1>
        <h1>PENGANTAR CODING & KECERDASAN BUATAN (AI)</h1>

        <h2>Inti Materi</h2>
        <p>Memperkenalkan apa itu pemrograman (coding) dan kecerdasan buatan (AI), ruang lingkup, serta penerapannya di dunia kerja.</p>

        <ul>
            <li>Apa itu coding: menulis instruksi sehingga komputer melakukan tugas.</li>
            <li>Apa itu AI: sistem yang meniru sebagian fungsi kognitif manusia (pengenalan pola, prediksi).</li>
            <li>Contoh aplikasi: chatbot, rekomendasi, klasifikasi gambar, otomasi.</li>
            <li>Skill dasar: logika, algoritma, matematika dasar, dan etika penggunaan teknologi.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>