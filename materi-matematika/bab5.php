<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Geometri Dasar - ShadowSix</title>
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
      <div class="hero-title">Geometri Dasar</div>
      <div class="hero-desc">
        Mempelajari bangun datar dan konsep geometri dasar.
      </div>
    </div>

    <div class="content">
      <h1>BAB 5</h1>
      <h1>Geometri Dasar</h1>

      <h2>Bangun Datar</h2>
      <p>Bangun datar adalah bentuk dua dimensi yang memiliki panjang dan lebar.</p>

      <h3>Contoh bangun datar</h3>
      <ul>
          <li>Segitiga</li>
          <li>Persegi dan persegi panjang</li>
          <li>Lingkaran</li>
          <li>Jajargenjang dan trapesium</li>
      </ul>

      <h2>Rumus dasar</h2>
      <ul>
          <li>Luas dan keliling</li>
          <li>Konsep sudut</li>
          <li>Teorema Pythagoras</li>
      </ul>

      <h2>Transformasi Geometri</h2>
      <p>Transformasi meliputi translasi, refleksi, rotasi, dan dilatasi.</p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>