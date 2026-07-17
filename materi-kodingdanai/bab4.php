<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Struktur Data & Pemrosesan Data - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="koding.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="kodingdanai.php">kembali ke materi Coding & AI</a>
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
      <div class="hero-title">Struktur Data & Pemrosesan Data</div>
      <div class="hero-desc">
        Mengenal struktur data dasar yang sering dipakai dalam coding dan AI,
        serta teknik sederhana manipulasi data.
      </div>
    </div>

    <div class="content">
      <h1>BAB 4</h1>
      <h1>STRUKTUR DATA & PEMROSESAN DATA</h1>

      <h2>Inti Materi</h2>
      <p>
        Mengenal struktur data dasar yang sering dipakai dalam coding dan AI,
        serta teknik sederhana manipulasi data.
      </p>

      <ul>
        <li>Struktur data: list, tuple, dictionary, set, string.</li>
        <li>Operasi dasar: indexing, slicing, iterasi, penambahan/hapus elemen.</li>
        <li>Membaca/menulis file teks dan CSV.</li>
        <li>
          Pengenalan library: penggunaan pandas secara ringkas (konsep
          dataframe).
        </li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>