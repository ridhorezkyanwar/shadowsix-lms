<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bilangan dan Aljabar - ShadowSix</title>
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
      <div class="hero-title">Bilangan dan Aljabar</div>
      <div class="hero-desc">
        Memahami konsep bilangan real dan operasi aljabar dasar.
      </div>
    </div>

    <div class="content">
      <h1>BAB 1</h1>
      <h1>Bilangan dan Aljabar</h1>

      <h2>Bilangan Real</h2>
      <p>Bilangan real terdiri dari bilangan rasional dan irasional yang dapat direpresentasikan pada garis bilangan.</p>

      <h3>Kategori bilangan real</h3>
      <ul>
          <li>Bilangan bulat (… -2, -1, 0, 1, 2 …)</li>
          <li>Bilangan rasional (dapat ditulis a/b)</li>
          <li>Bilangan irasional (π, √2, dll)</li>
      </ul>

      <h2>Operasi Aljabar</h2>
      <p>Operasi pada bentuk aljabar meliputi penjumlahan, pengurangan, perkalian, dan pemfaktoran.</p>

      <h3>Contoh operasi</h3>
      <ul>
          <li>Penyederhanaan bentuk aljabar</li>
          <li>Mengalikan dua suku dan polinomial</li>
          <li>Memfaktorkan bentuk kuadrat</li>
      </ul>

      <h2>Bentuk Pangkat & Akar</h2>
      <p>Pangkat dan akar digunakan untuk menyederhanakan bentuk matematika yang melibatkan eksponen.</p>

      <ul>
          <li>Pangkat positif dan negatif</li>
          <li>Akar kuadrat dan akar pangkat n</li>
          <li>Aturan eksponen</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>