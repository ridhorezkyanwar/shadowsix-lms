<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hak dan Kewajiban - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="ppkn.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="ppkn.php">kembali ke materi PKN</a>
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
      <div class="hero-title">Hak dan Kewajiban Warga Negara</div>
      <div class="hero-desc">
        Memahami keseimbangan antara hak yang diterima dan kewajiban yang harus dilaksanakan.
      </div>
    </div>

    <div class="content">
        <h1>BAB 3</h1>
        <h1>Hak dan Kewajiban Warga Negara</h1>

        <h2>Pengertian Hak</h2>
        <p>Hak adalah segala sesuatu yang diterima oleh warga negara dan dijamin oleh negara.</p>

        <h2>Pengertian Kewajiban</h2>
        <p>Kewajiban adalah segala sesuatu yang harus dilakukan oleh warga negara sebagai tanggung jawab moral maupun hukum.</p>

        <h2>Hak Warga Negara</h2>
        <ul>
            <li>Hak pendidikan</li>
            <li>Hak pekerjaan dan penghidupan</li>
            <li>Hak kebebasan berpendapat</li>
            <li>Hak perlindungan hukum</li>
        </ul>

        <h2>Kewajiban Warga Negara</h2>
        <ul>
            <li>Menghormati hak orang lain</li>
            <li>Taat hukum dan peraturan</li>
            <li>Membela negara</li>
            <li>Ikut serta memajukan negara</li>
        </ul>

        <h2>Keseimbangan Hak dan Kewajiban</h2>
        <p>Keseimbangan diperlukan agar tidak terjadi pelanggaran hak atau penyalahgunaan kebebasan.</p>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>