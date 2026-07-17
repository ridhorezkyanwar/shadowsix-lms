<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Asking & Giving Opinions - ShadowSix</title>
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
      <div class="hero-title">Asking & Giving Opinions</div>
      <div class="hero-desc">
        Menyampaikan pendapat dan menanggapi pendapat orang lain.
      </div>
    </div>

    <div class="content">
      <h1>BAB 8</h1>
      <h1>ASKING & GIVING OPINIONS</h1>

      <h2>Inti Materi</h2>
      <p>Menyampaikan pendapat dan menanggapi pendapat orang lain.</p>

      <ul>
        <li>Asking for opinions:
          <ul>
            <li>What do you think about…?</li>
            <li>How do you feel about…?</li>
          </ul>
        </li>
        <li>Giving opinions:
          <ul>
            <li>I think…</li>
            <li>In my opinion…</li>
            <li>I believe that…</li>
          </ul>
        </li>
        <li>Agreeing & disagreeing:
          <ul>
            <li>I agree / I disagree.</li>
            <li>That’s true / I don’t think so.</li>
          </ul>
        </li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>