<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendudukan Jepang di Indonesia - ShadowSix</title>
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
      <div class="hero-title">Pendudukan Jepang di Indonesia</div>
      <div class="hero-desc">
        Masa pendudukan Jepang dan dampaknya pada struktur sosial-politik Indonesia.
      </div>
    </div>

    <div class="content">
        <h1>BAB 8</h1>
        <h1>PENDUDUKAN JEPANG DI INDONESIA</h1>

        <h2>Inti Materi</h2>
        <p>Masa pendudukan Jepang dan dampaknya pada struktur sosial-politik Indonesia.</p>

        <ul>
            <li>Kebijakan Jepang: romusha, kerja paksa, pembatasan informasi.</li>
            <li>Pembentukan organisasi semi militer: PETA, Heiho.</li>
            <li>Propaganda & janji kemerdekaan (BPUPKI 1945).</li>
            <li>Dampak sosial: kekurangan pangan, pendidikan militer, perubahan ideologi.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>