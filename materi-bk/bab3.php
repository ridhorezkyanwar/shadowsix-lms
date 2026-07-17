<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manajemen Waktu - ShadowSix</title>
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
      <div class="hero-title">Manajemen Waktu dan Kebiasaan Belajar</div>
      <div class="hero-desc">
        manajemankan waktu mu dan gaya atau kebiassan belajar
      </div>
    </div>

    <div class="content chapter">
        <h1>BAB 3</h1>

        <h2>Pentingnya Manajemen Waktu</h2>
        <p>Penggunaan waktu secara efektif untuk menyeimbangkan antara kegiatan akademik, non-akademik, istirahat, dan sosial, sehingga mencegah stres dan meningkatkan produktivitas.</p>

        <h2>Teknik Manajemen Waktu</h2>
        <ul>
            <li>Membuat jadwal harian atau mingguan.</li>
            <li>Membuat daftar prioritas tugas (to-do list).</li>
            <li>Menghindari penundaan (prokrastinasi).</li>
        </ul>

        <h2>Kebiasaan Belajar Efektif</h2>
        <ul>
            <li>Menciptakan lingkungan belajar yang kondusif.</li>
            <li>Membuat catatan yang terstruktur.</li>
            <li>Menggunakan teknik belajar yang sesuai (misalnya, Pomodoro Technique).</li>
        </ul>

        <h2>Penerapan dalam Kehidupan Sehari-hari</h2>
        <p>Mengerjakan PR tepat waktu, mengalokasikan waktu istirahat yang cukup, dan konsisten dengan jadwal belajar yang telah dibuat.</p>
    </div>

    <footer class="site-footer">
        <p>&copy; 2026 ShadowSix Project UKK No Absen 30. All Rights Reserved.</p>
    </footer>
  </body>
</html>