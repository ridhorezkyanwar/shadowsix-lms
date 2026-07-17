<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Describing People & Objects - ShadowSix</title>
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
      <div class="hero-title">Describing People & Objects</div>
      <div class="hero-desc">
        Menggunakan adjective untuk menggambarkan orang, benda, dan sifat.
      </div>
    </div>

    <div class="content">
      <h1>BAB 2</h1>
      <h1>DESCRIBING PEOPLE & OBJECTS</h1>

      <h2>Inti Materi</h2>
      <p>Menggunakan adjective untuk menggambarkan orang, benda, dan sifat.</p>

      <ul>
        <li>Physical description: tall, short, slim, curly hair, etc.</li>
        <li>Personality traits: kind, friendly, honest, confident.</li>
        <li>Describing objects: size, color, shape, material.</li>
        <li>Sentence patterns: 
          <ul>
            <li>He is… / She has…</li>
            <li>It is … (for objects)</li>
          </ul>
        </li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>