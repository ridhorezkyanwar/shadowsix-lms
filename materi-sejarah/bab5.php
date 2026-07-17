<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuknya Bangsa Eropa ke Indonesia - ShadowSix</title>
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
      <div class="hero-title">Masuknya Bangsa Eropa ke Indonesia</div>
      <div class="hero-desc">
        Menjelaskan kedatangan bangsa Barat dan pengaruh kolonialisme terhadap Nusantara.
      </div>
    </div>

    <div class="content">
        <h1>BAB 5</h1>
        <h1>MASUKNYA BANGSA EROPA KE INDONESIA</h1>

        <h2>Inti Materi</h2>
        <p>Menjelaskan kedatangan bangsa Barat dan pengaruh kolonialisme terhadap Nusantara.</p>

        <ul>
            <li>Motif kedatangan: 3G (gold, glory, gospel).</li>
            <li>Kedatangan Portugis, Spanyol, Belanda, Inggris.</li>
            <li>VOC: monopoli dagang, sistem tanam paksa awal.</li>
            <li>Pertentangan & perlawanan lokal: Aceh, Makassar, Java, Maluku.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>