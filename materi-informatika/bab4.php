<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dasar Pemrograman - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="informatika.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../informatika.php">kembali ke materi Informatika</a>
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
      <div class="hero-title">Dasar Pemrograman</div>
      <div class="hero-desc">
        Mengenal cara kerja bahasa pemrograman dan menulis program sederhana.
      </div>
    </div>

    <div class="content">
      <h1>BAB 4</h1>
      <h1>DASAR PEMROGRAMAN</h1>

      <h2>Inti Materi</h2>
      <p>Mengenal cara kerja bahasa pemrograman dan menulis program sederhana.</p>

      <ul>
        <li>Bahasa pemrograman: Python, C, Java, JavaScript.</li>
        <li>Struktur dasar program: input, proses, output.</li>
        <li>Tipe data: integer, float, string, boolean.</li>
        <li>Operator matematis dan logika.</li>
        <li>Kontrol alur: if–else, looping (for, while).</li>
        <li>Fungsi: blok kode untuk tugas tertentu.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>