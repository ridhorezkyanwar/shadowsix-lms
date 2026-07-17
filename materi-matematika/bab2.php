<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Persamaan dan Pertidaksamaan - ShadowSix</title>
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
      <div class="hero-title">Persamaan dan Pertidaksamaan</div>
      <div class="hero-desc">
        Memahami cara menyelesaikan persamaan dan pertidaksamaan linear dan kuadrat.
      </div>
    </div>

    <div class="content">
      <h1>BAB 2</h1>
      <h1>Persamaan dan Pertidaksamaan</h1>

      <h2>Persamaan Linear Satu Variabel</h2>
      <p>Bentuk umum persamaan linear adalah ax + b = 0 dengan a ≠ 0.</p>

      <h3>Metode penyelesaian</h3>
      <ul>
          <li>Operasi aljabar dasar</li>
          <li>Substitusi nilai</li>
      </ul>

      <h2>Pertidaksamaan Linear</h2>
      <p>Pertidaksamaan dapat berbentuk &lt;, &gt;, ≤, atau ≥ dan memiliki himpunan penyelesaian pada garis bilangan.</p>

      <h2>Persamaan Kuadrat</h2>
      <p>Persamaan kuadrat memiliki bentuk ax² + bx + c = 0 dengan a ≠ 0.</p>

      <h3>Metode penyelesaian</h3>
      <ul>
          <li>Faktorisasi</li>
          <li>Melengkapkan kuadrat</li>
          <li>Rumus kuadrat</li>
      </ul>

    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>