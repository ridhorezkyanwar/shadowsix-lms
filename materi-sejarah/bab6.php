<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Tanam Paksa & Pemerintahan Kolonial - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="sejarah.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="sejarah.php">kembali ke materi Sejarah</a>
        <a href="#">Tentang</a>
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
      <div class="hero-title">Sistem Tanam Paksa & Pemerintahan Kolonial</div>
      <div class="hero-desc">
        Mempelajari kebijakan kolonial Belanda yang memengaruhi ekonomi dan kehidupan rakyat.
      </div>
    </div>

    <div class="content">
        <h1>BAB 6</h1>
        <h1>SISTEM TANAM PAKSA & PEMERINTAHAN KOLONIAL</h1>

        <h2>Inti Materi</h2>
        <p>Mempelajari kebijakan kolonial Belanda yang memengaruhi ekonomi dan kehidupan rakyat.</p>

        <ul>
            <li>Cultuurstelsel (Tanam Paksa) oleh van den Bosch.</li>
            <li>Dampak: penderitaan rakyat, kelaparan, kemiskinan.</li>
            <li>Politik Etis: irigasi, edukasi, transmigrasi.</li>
            <li>Lahirnya kaum terpelajar dan kesadaran kebangsaan.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>