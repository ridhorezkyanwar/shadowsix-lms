<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teladan Nabi Muhammad Saw. - ShadowSix</title>
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
      <div class="hero-title">Teladan Nabi Muhammad Saw. dalam Kepemimpinan</div>
      <div class="hero-desc">
        Meneladani sifat-sifat mulia Nabi Muhammad dalam memimpin.
      </div>
    </div>

    <div class="content">
        <h1>BAB 5</h1>
        <h1>Teladan Nabi Muhammad Saw. dalam Kepemimpinan</h1>

        <h2>Sifat-Sifat Nabi Muhammad</h2>
        <ul>
            <li>Shiddiq (jujur)</li>
            <li>Amanah (dapat dipercaya)</li>
            <li>Tabligh (menyampaikan kebenaran)</li>
            <li>Fathanah (cerdas)</li>
        </ul>

        <h2>Keteladanan Nabi sebagai Pemimpin</h2>
        <ul>
            <li>Memimpin dengan keadilan</li>
            <li>Mengutamakan musyawarah</li>
            <li>Bersikap lembut dan sabar</li>
            <li>Berani mengambil keputusan</li>
        </ul>

        <h2>Penerapan dalam Kehidupan Pelajar</h2>
        <ul>
            <li>Menjadi ketua kelas yang bertanggung jawab</li>
            <li>Memberi contoh perilaku baik</li>
            <li>Memutuskan masalah secara musyawarah</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Belajar RPL SMK</p>
    </footer>
  </body>
</html>