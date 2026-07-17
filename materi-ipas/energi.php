<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Energi dan Perubahannya - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="ipas.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../ipas.php">kembali ke materi IPAS</a>
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
      <div class="hero-title">Energi dan Perubahannya</div>
      <div class="hero-desc">
        Pelajari tentang berbagai bentuk energi, perubahannya, dan dampaknya bagi kehidupan.
      </div>
    </div>

    <div class="content">
<h1>BAB 2</h1>
<h1>Energi dan Perubahannya</h1>

<h2>Pengertian energi</h2>
<p>Energi adalah kemampuan untuk melakukan usaha atau menyebabkan perubahan pada suatu benda atau sistem.</p>

<h2>Macam-macam energi</h2>
<ul>
    <li>Energi panas</li>
    <li>Energi cahaya</li>
    <li>Energi kimia</li>
    <li>Energi listrik</li>
    <li>Energi gerak</li>
</ul>

<h2>Transformasi energi</h2>
<p>Energi dapat berubah dari satu bentuk ke bentuk lainnya, misalnya energi kimia pada makanan berubah menjadi energi gerak pada tubuh.</p>

<h2>Sumber energi</h2>
<ul>
    <li>Energi terbarukan: matahari, angin, air</li>
    <li>Energi tak terbarukan: batu bara, minyak bumi</li>
</ul>

<h2>Dampak penggunaan energi</h2>
<p>Penggunaan energi fosil berlebihan menyebabkan emisi gas rumah kaca dan pencemaran.</p>

<h2>Projek peserta didik</h2>
<p>Peserta didik merancang alat sederhana yang menunjukkan perubahan energi, seperti panel surya mini atau kincir angin.</p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>
