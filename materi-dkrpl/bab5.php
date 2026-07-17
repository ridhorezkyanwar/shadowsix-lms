<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengenalan Basis Data - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="dkrpl.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../dkrpl.php">kembali ke materi DK RPL</a>
        <a href="../tentang.php">Tentang</a>
        <a href="../kontak/kontak.php">Kontak</a>
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
      <div class="hero-title">Pengenalan Basis Data</div>
      <div class="hero-desc">
        Mempelajari konsep dasar penyimpanan dan pengelolaan data secara terstruktur.
      </div>
    </div>

    <div class="content">
      <h1>BAB 5</h1>
      <h1>PENGENALAN BASIS DATA</h1>

      <h2>Rangkuman</h2>
      <ul>
        <li>Basis data adalah tempat menyimpan data secara terstruktur.</li>
        <li>DBMS yang umum digunakan antara lain MySQL, PostgreSQL, SQLite.</li>
        <li>Elemen utama database: tabel, kolom, baris, primary key.</li>
        <li>CRUD adalah operasi dasar: Create, Read, Update, Delete.</li>
      </ul>
    </div>

    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>