<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Struktur Data Dasar - ShadowSix</title>
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
      <div class="hero-title">Struktur Data Dasar</div>
      <div class="hero-desc">
        Mempelajari cara mengorganisasi data agar mudah diproses.
      </div>
    </div>

    <div class="content">
      <h1>BAB 4</h1>
      <h1>STRUKTUR DATA DASAR</h1>

      <h2>Rangkuman</h2>
      <ul>
        <li>Struktur data membantu mengorganisasi data agar mudah diproses.</li>
        <li>Jenis struktur data dasar: array, list, dan string.</li>
        <li>Operasi dasar: akses elemen, menambah, menghapus, dan mengubah data.</li>
        <li>Data primitif seperti integer dan boolean; non-primitif seperti array dan objek.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>