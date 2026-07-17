<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Interaksi Sosial - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="bk.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="bk.php">Kembali ke Materi BK</a>
        <a href="../tentang.php">Tentang</a>
        <a href="../kontak/kontak.php">Kontak</a>
      </nav>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <div class="user-info">
        <span class="username">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
        <a href="../logout.php" class="login-btn logout-btn" style="text-decoration: none">Logout</a>
      </div>
      <?php else: ?>
      <a href="../login.php" class="login-btn" style="text-decoration: none">Login</a>
      <?php endif; ?>
    </div>

    <div class="hero">
      <div class="hero-title">Interaksi Sosial dan Komunikasi Efektif</div>
      <div class="hero-desc">
        Berinteraksi Dengan kawan kawann dan berkomunikasi
      </div>
    </div>


    <div class="content chapter">
        <h1>BAB 2</h1>

        <h2>Pengertian Interaksi Sosial</h2>
        <p>Hubungan timbal balik antar individu, kelompok, atau individu dengan kelompok untuk mencapai tujuan bersama dalam masyarakat sekolah dan lingkungan sekitar.</p>

        <h2>Prinsip Komunikasi Efektif</h2>
        <ul>
            <li>Mendengar aktif (active listening).</li>
            <li>Menggunakan bahasa yang jelas dan mudah dipahami.</li>
            <li>Memberikan umpan balik yang konstruktif.</li>
            <li>Memahami perspektif orang lain (empati).</li>
        </ul>

        <h2>Penyelesaian Konflik</h2>
        <ul>
            <li>Mengedepankan musyawarah.</li>
            <li>Menghindari perilaku agresif.</li>
            <li>Mencari solusi yang adil bagi semua pihak.</li>
        </ul>

        <h2>Penerapan dalam Kehidupan Sehari-hari</h2>
        <p>Kerja kelompok yang efektif, menghargai pendapat teman, menjaga etika berkomunikasi di media sosial, dan berkolaborasi dalam proyek sekolah.</p>
    </div>

    <footer class="site-footer">
        <p>&copy; 2026 ShadowSix Project UKK No Absen 30. All Rights Reserved.</p>
    </footer>
  </body>
</html>