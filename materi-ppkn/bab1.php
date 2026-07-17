<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nilai-Nilai Pancasila - ShadowSix</title>
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
      <div class="hero-title">Nilai-Nilai Pancasila</div>
      <div class="hero-desc">
        Memahami Pancasila sebagai dasar negara dan pedoman hidup bangsa Indonesia.
      </div>
    </div>

    <div class="content">
        <h1>BAB 1</h1>
        <h1>Nilai-Nilai Pancasila dalam Kehidupan Berbangsa dan Bernegara</h1>

        <h2>Pengertian Pancasila</h2>
        <p>Pancasila adalah dasar negara, pandangan hidup, dan ideologi bangsa Indonesia yang menjadi pedoman dalam bersikap dan berperilaku.</p>

        <h2>Fungsi Pancasila</h2>
        <ul>
            <li>Sebagai dasar negara</li>
            <li>Sebagai ideologi nasional</li>
            <li>Sebagai pedoman hidup masyarakat</li>
            <li>Sebagai sumber hukum di Indonesia</li>
        </ul>

        <h2>Nilai-Nilai Pancasila</h2>
        <ul>
            <li>Ketuhanan Yang Maha Esa: Menghormati kebebasan beragama.</li>
            <li>Kemanusiaan yang Adil dan Beradab: Menjunjung nilai kemanusiaan.</li>
            <li>Persatuan Indonesia: Menjaga keutuhan bangsa.</li>
            <li>Kerakyatan: Mengutamakan musyawarah.</li>
            <li>Keadilan Sosial: Keadilan bagi seluruh masyarakat.</li>
        </ul>

        <h2>Penerapan Pancasila</h2>
        <p>Menghargai perbedaan, bekerja sama, gotong royong, serta taat aturan negara.</p>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>