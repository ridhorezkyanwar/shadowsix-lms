<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Descriptive Text - ShadowSix</title>
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
      <div class="hero-title">Descriptive Text</div>
      <div class="hero-desc">
        Mendeskripsikan hewan, tempat wisata, dan objek menarik.
      </div>
    </div>

    <div class="content">
      <h1>BAB 6</h1>
      <h1>DESCRIPTIVE TEXT</h1>

      <h2>Inti Materi</h2>
      <p>Mendeskripsikan hewan, tempat wisata, dan objek menarik.</p>

      <ul>
        <li>Structure:
          <ul>
            <li>Identification</li>
            <li>Description</li>
          </ul>
        </li>
        <li>Descriptive details: appearance, behavior, uniqueness.</li>
        <li>Example topics: Bali Beach, Komodo Dragon, School Library.</li>
        <li>Using adjectives: beautiful, dangerous, peaceful, wide.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>