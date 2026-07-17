<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Announcement Text - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="inggris.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../inggris.php">kembali ke materi Bahasa Inggris</a>
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
      <div class="hero-title">Announcement Text</div>
      <div class="hero-desc">
        Membuat dan memahami pengumuman resmi.
      </div>
    </div>

    <div class="content">
      <h1>BAB 7</h1>
      <h1>ANNOUNCEMENT TEXT</h1>

      <h2>Inti Materi</h2>
      <p>Membuat dan memahami pengumuman resmi.</p>

      <ul>
        <li>Purpose: giving information to the public.</li>
        <li>Common contents:
          <ul>
            <li>Title</li>
            <li>Date & Time</li>
            <li>Place</li>
            <li>Details and instructions</li>
          </ul>
        </li>
        <li>Formal expressions: please attend…, you are invited…</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>