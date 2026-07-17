<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menulis Teks Deskripsi & Prosedur - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="bahasa.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../indonesia.php">kembali ke materi Bahasa Indonesia</a>
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
      <div class="hero-title">Menulis Teks Deskripsi & Prosedur</div>
      <div class="hero-desc">
        Mengembangkan kemampuan menggambarkan objek secara detail dan menulis langkah sistematis.
      </div>
    </div>

    <div class="content">
      <h1>BAB 2</h1>
      <h1>MENULIS TEKS DESKRIPSI & PROSEDUR</h1>

      <h2>Inti Materi</h2>
      <p>Mengembangkan kemampuan menggambarkan objek secara detail (deskripsi) dan menulis langkah sistematis (prosedur).</p>

      <ul>
        <li>Teks deskripsi memakai kata-kata pancaindra.</li>
        <li>Teks prosedur memiliki tujuan, bahan, dan langkah berurutan.</li>
        <li>Menggunakan bahasa imperatif & penanda urutan.</li>
        <li>Diksi tepat dan kohesi antar-paragraf.</li>
        <li>Latihan: membuat deskripsi produk & SOP sederhana.</li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>