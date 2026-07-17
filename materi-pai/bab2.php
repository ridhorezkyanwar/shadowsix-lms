<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jujur, Amanah, dan Istiqamah - ShadowSix</title>
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
      <div class="hero-title">Berperilaku Jujur, Amanah, dan Istiqamah</div>
      <div class="hero-desc">
        Membentuk karakter mulia dalam kehidupan sehari-hari.
      </div>
    </div>

    <div class="content">
        <h1>BAB 2</h1>
        <h1>Berperilaku Jujur, Amanah, dan Istiqamah</h1>

        <h2>Pengertian Jujur</h2>
        <p>Berkata dan bertindak sesuai kenyataan, tidak berbohong atau menipu.</p>

        <h2>Pengertian Amanah</h2>
        <p>Dapat dipercaya dalam menjaga titipan, melaksanakan tugas, dan memegang janji.</p>

        <h2>Pengertian Istiqamah</h2>
        <p>Konsisten dalam kebaikan dan taat pada ajaran agama.</p>

        <h2>Bentuk-Bentuk Perilaku</h2>
        <ul>
            <li>Jujur: berkata benar, tidak curang</li>
            <li>Amanah: menjaga rahasia, tepat waktu</li>
            <li>Istiqamah: ibadah rutin, tidak mudah menyerah</li>
        </ul>

        <h2>Manfaat Perilaku Terpuji</h2>
        <ul>
            <li>Dipercaya orang lain</li>
            <li>Mendapat ketenangan hati</li>
            <li>Meningkatkan kualitas diri</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Belajar RPL SMK</p>
    </footer>
  </body>
</html>