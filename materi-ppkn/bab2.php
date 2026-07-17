<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Konstitusi dan Norma - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="ppkn.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="ppkn.php">kembali ke materi PKN</a>
        <a href="../tentang.php">Tentang</a>
        <a href="../kontak/kontak.php">Kontak</a>
      </nav>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <div class="user-info">
        <span class="username">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
        <a href="../logout.php" class="login-btn logout-btn" style="text-decoration: none">Logout</a>
      </div>
      <?php else: ?>
      <a href="../login.php" class="login-btn" style="text-decoration: none">Login</a>
      <?php endif; ?>
    </div>

    <div class="hero">
      <div class="hero-title">Konstitusi dan Norma di Indonesia</div>
      <div class="hero-desc">
        Memahami hukum dasar dan aturan yang berlaku dalam masyarakat Indonesia.
      </div>
    </div>

    <div class="content">
        <h1>BAB 2</h1>
        <h1>Konstitusi dan Norma di Indonesia</h1>

        <h2>Pengertian Konstitusi</h2>
        <p>Konstitusi adalah hukum dasar tertinggi negara yang menjadi landasan penyelenggaraan pemerintahan. Di Indonesia, konstitusi utama adalah <a href="https://www.mahkamahkonstitusi.go.id" target="_blank">Undang-Undang Dasar Negara Republik Indonesia Tahun 1945</a> (UUD NRI 1945).</p>

        <h2>Fungsi Konstitusi</h2>
        <ul>
            <li>Membatasi kekuasaan pemerintah.</li>
            <li>Menjamin hak asasi warga negara.</li>
            <li>Menjadi landasan hukum tertinggi.</li>
            <li>Mengatur jalannya roda pemerintahan.</li>
        </ul>

        <h2>Pengertian Norma</h2>
        <p>Norma adalah aturan atau kaidah yang berlaku dalam kehidupan bermasyarakat untuk menciptakan ketertiban dan keteraturan.</p>

        <h2>Macam-Macam Norma</h2>
        <ul>
            <li>Norma Agama: Aturan yang bersumber dari ajaran agama.</li>
            <li>Norma Kesusilaan: Aturan yang bersumber dari hati nurani manusia.</li>
            <li>Norma Kesopanan: Aturan yang bersumber dari pergaulan atau budaya masyarakat.</li>
            <li>Norma Hukum: Aturan yang dibuat oleh badan berwenang dan bersifat memaksa, contohnya peraturan yang tersedia di situs resmi <a href="https://jdihn.go.id" target="_blank">Jaringan Dokumentasi dan Informasi Hukum (JDIH) Nasional</a>.</li>
        </ul>

        <h2>Pentingnya Menaati Norma</h2>
        <p>Ketaatan terhadap norma dan konstitusi diperlukan untuk mewujudkan kehidupan berbangsa dan bernegara yang harmonis, adil, dan damai, serta mencegah konflik dan kekacauan.</p>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>