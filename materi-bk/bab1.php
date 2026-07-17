<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengembangan Diri - ShadowSix</title>
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
      <div class="hero-title">Pengembangan Diri dan Potensi</div>
      <div class="hero-desc">
        Kembangkan Diri Dan Temukan Pontensimu
      </div>
    </div>


    <div class="content chapter">
        <h1>BAB 1</h1>

        <h2>Pengertian Pengembangan Diri</h2>
        <p>Pengembangan diri adalah upaya sistematis dan berkelanjutan untuk meningkatkan potensi, keterampilan, dan kualitas personal yang dimiliki individu.</p>

        <h2>Mengenali Potensi Diri</h2>
        <ul>
            <li>Mengidentifikasi minat dan bakat.</li>
            <li>Memahami kekuatan dan kelemahan diri (analisis SWOT sederhana).</li>
            <li>Menetapkan tujuan hidup dan karir.</li>
        </ul>

        <h2>Pentingnya Percaya Diri</h2>
        <ul>
            <li>Meningkatkan motivasi untuk mencoba hal baru.</li>
            <li>Membangun hubungan sosial yang sehat.</li>
            <li>Membantu mengatasi tantangan dan kegagalan.</li>
        </ul>

        <h2>Penerapan dalam Kehidupan Sehari-hari</h2>
        <p>Aktif dalam kegiatan ekstrakurikuler, berani presentasi di kelas, menerima kritik membangun, dan terus belajar hal baru.</p>
    </div>

    <footer class="site-footer">
        <p>&copy; 2026 ShadowSix Project UKK No Absen 30. All Rights Reserved.</p>
    </footer>
  </body>
</html>