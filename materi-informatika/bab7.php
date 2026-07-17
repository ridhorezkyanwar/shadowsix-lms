<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TI dalam Dunia Kerja - ShadowSix</title>
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
      <div class="hero-title">TI dalam Dunia Kerja</div>
      <div class="hero-desc">
        Peran teknologi dalam industri modern dan transformasi digital.
      </div>
    </div>

    <div class="content">
      <h1>BAB 7</h1>
      <h1>TI DALAM DUNIA KERJA</h1>

      <h2>Inti Materi</h2>
      <p>Peran teknologi dalam industri modern dan transformasi digital.</p>

      <ul>
        <li>TI digunakan dalam perkantoran, industri, kesehatan, pendidikan.</li>
        <li>Software penting: spreadsheet, word processing, presentasi.</li>
        <li>Cloud computing: Google Drive, OneDrive.</li>
        <li>Pekerjaan bidang TI: programmer, network engineer, data analyst.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>