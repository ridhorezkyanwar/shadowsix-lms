<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Relasi dan Fungsi - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="mtk.css" />
    
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../matematika.php">kembali ke materi Matematika</a>
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
      <div class="hero-title">Relasi dan Fungsi</div>
      <div class="hero-desc">
        Memahami konsep relasi dan fungsi dalam matematika.
      </div>
    </div>

    <div class="content">
      <h1>BAB 3</h1>
      <h1>Relasi dan Fungsi</h1>

      <h2>Relasi</h2>
      <p>Relasi adalah hubungan antara dua himpunan yang memasangkan setiap elemen dari satu himpunan dengan himpunan lainnya.</p>

      <h2>Fungsi</h2>
      <p>Fungsi adalah relasi khusus yang memasangkan setiap elemen domain dengan tepat satu elemen kodomain.</p>

      <h3>Konsep penting</h3>
      <ul>
          <li>Domain</li>
          <li>Kodomain</li>
          <li>Range</li>
      </ul>

      <h2>Grafik Fungsi</h2>
      <p>Fungsi dapat direpresentasikan pada bidang koordinat kartesius untuk menunjukkan pola hubungan.</p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>