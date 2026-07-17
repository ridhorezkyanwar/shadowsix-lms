<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keberlanjutan Lingkungan - ShadowSix</title>
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
      <div class="hero-title">Keberlanjutan Lingkungan</div>
      <div class="hero-desc">
        Pelajari cara menjaga keseimbangan antara kebutuhan manusia dan kelestarian lingkungan.
      </div>
    </div>

    <div class="content">
      <h1>BAB 1</h1>
<h1>Keberlanjutan Lingkungan</h1>

<h2>Pengertian keberlanjutan</h2>
<p>Keberlanjutan adalah upaya menjaga keseimbangan antara kebutuhan manusia dengan kelestarian lingkungan agar tetap dapat mendukung kehidupan di masa depan.</p>

<h2>Komponen lingkungan</h2>
<p>Lingkungan terdiri dari komponen biotik (makhluk hidup) dan abiotik (benda tak hidup) yang saling memengaruhi.</p>

<h2>Isu-isu lingkungan</h2>
<ul>
    <li>Pencemaran air dan udara</li>
    <li>Penurunan kualitas tanah</li>
    <li>Kepunahan keanekaragaman hayati</li>
    <li>Perubahan iklim</li>
</ul>

<h2>Upaya menjaga keberlanjutan</h2>
<p>Beberapa langkah untuk mendukung keberlanjutan lingkungan adalah:</p>
<ul>
    <li>Reduce, Reuse, Recycle (3R)</li>
    <li>Konservasi sumber daya alam</li>
    <li>Pengelolaan limbah yang baik</li>
    <li>Edukasi dan kampanye lingkungan</li>
</ul>

<h2>Projek peserta didik</h2>
<p>Peserta didik melakukan identifikasi masalah lingkungan di sekitar, merancang solusi, dan membuat aksi nyata dalam bentuk kampanye atau inovasi sederhana.</p>

    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>
