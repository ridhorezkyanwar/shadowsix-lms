<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Demokrasi dalam Kehidupan - ShadowSix</title>
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
      <div class="hero-title">Demokrasi dalam Kehidupan Sehari-Hari</div>
      <div class="hero-desc">
        Menerapkan nilai-nilai demokrasi dalam lingkungan keluarga, sekolah, dan masyarakat.
      </div>
    </div>

    <div class="content">
        <h1>BAB 6</h1>
        <h1>Demokrasi dalam Kehidupan Sehari-Hari</h1>

        <h2>Pengertian Demokrasi</h2>
        <p>Demokrasi adalah sistem pemerintahan yang menempatkan rakyat sebagai pemegang kekuasaan tertinggi.</p>

        <h2>Prinsip-Prinsip Demokrasi</h2>
        <ul>
            <li>Kebebasan berpendapat</li>
            <li>Musyawarah mufakat</li>
            <li>Keadilan</li>
            <li>Kebersamaan</li>
            <li>Penghormatan HAM</li>
        </ul>

        <h2>Nilai-Nilai Demokrasi</h2>
        <ul>
            <li>Toleransi</li>
            <li>Keterbukaan</li>
            <li>Tanggung jawab</li>
            <li>Kritis terhadap kebijakan publik</li>
        </ul>

        <h2>Penerapan Demokrasi</h2>
        <p>Berpartisipasi dalam pemilu, musyawarah kelas, organisasi sekolah, dan menghargai pendapat orang lain.</p>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>