<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recount Text - ShadowSix</title>
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
      <div class="hero-title">Recount Text</div>
      <div class="hero-desc">
        Menceritakan pengalaman masa lalu menggunakan bentuk lampau.
      </div>
    </div>

    <div class="content">
      <h1>BAB 4</h1>
      <h1>RECOUNT TEXT</h1>

      <h2>Inti Materi</h2>
      <p>Menceritakan pengalaman masa lalu menggunakan bentuk lampau.</p>

      <ul>
        <li>Purpose: to retell past events.</li>
        <li>Generic structure:
          <ul>
            <li>Orientation</li>
            <li>Events</li>
            <li>Re-orientation</li>
          </ul>
        </li>
        <li>Past tense verbs: went, saw, played, visited.</li>
        <li>Time expressions: yesterday, last week, two days ago.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>