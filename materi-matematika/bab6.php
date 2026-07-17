<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trigonometri Dasar - ShadowSix</title>
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
      <div class="hero-title">Trigonometri Dasar</div>
      <div class="hero-desc">
        Mempelajari perbandingan trigonometri pada segitiga siku-siku.
      </div>
    </div>

    <div class="content">
      <h1>BAB 6</h1>
      <h1>Trigonometri Dasar</h1>

      <h2>Perbandingan Trigonometri</h2>
      <p>Trigonometri mempelajari rasio dalam segitiga siku-siku.</p>

      <ul>
          <li>Sinus = depan / miring</li>
          <li>Cosinus = samping / miring</li>
          <li>Tangen = depan / samping</li>
      </ul>

      <h2>Pemanfaatan Trigonometri</h2>
      <p>Digunakan untuk menghitung tinggi bangunan, panjang bayangan, dan jarak yang sulit diukur langsung.</p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>