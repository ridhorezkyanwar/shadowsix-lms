<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beriman kepada Kitab-Kitab Allah - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="pai.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="pai.php">kembali ke materi PAI</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
      </nav>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <div class="user-info">
        <span class="username"
          >Halo,
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
      <div class="hero-title">Beriman kepada Kitab-Kitab Allah</div>
      <div class="hero-desc">
        Meyakini bahwa Allah menurunkan kitab sebagai petunjuk hidup.
      </div>
    </div>

    <div class="content">
        <h1>BAB 3</h1>
        <h1>Beriman kepada Kitab-Kitab Allah</h1>

        <h2>Pengertian Iman kepada Kitab</h2>
        <p>Meyakini bahwa Allah menurunkan kitab kepada para rasul sebagai petunjuk hidup manusia.</p>

        <h2>Kitab-Kitab Allah</h2>
        <ul>
            <li>Taurat – diturunkan kepada Nabi Musa</li>
            <li>Zabur – diturunkan kepada Nabi Daud</li>
            <li>Injil – diturunkan kepada Nabi Isa</li>
            <li>Al-Qur’an – diturunkan kepada Nabi Muhammad</li>
        </ul>

        <h2>Fungsi Kitab Allah</h2>
        <ul>
            <li>Sebagai pedoman hidup</li>
            <li>Sumber hukum dan petunjuk</li>
            <li>Penerang kebenaran</li>
        </ul>

        <h2>Keistimewaan Al-Qur'an</h2>
        <ul>
            <li>Terpelihara keasliannya</li>
            <li>Berlaku sepanjang masa</li>
            <li>Petunjuk bagi seluruh umat manusia</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Belajar RPL SMK</p>
    </footer>
  </body>
</html>