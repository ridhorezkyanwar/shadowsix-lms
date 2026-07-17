<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Kami - ShadowSIx</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="tentang.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSIx</div>
      <nav class="nav">
        <a href="index.php">Home</a>
        <a href="index.php#subjects">Mata Pelajaran</a>
        <a href="tentang.php">Tentang</a>
        <a href="kontak/kontak.php">Kontak</a>
      </nav>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <div class="user-info">
        <span class="username">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
        <a href="logout.php" class="login-btn logout-btn" style="text-decoration: none">Logout</a>
      </div>
      <?php else: ?>
      <a href="login.php" class="login-btn" style="text-decoration: none">Login</a>
      <?php endif; ?>
    </div>

    <main>
    <div class="about-content">
      <h1>Tentang ShadowSIx</h1>
      <p>
        Halo! Selamat datang di <strong>ShadowSIx</strong>. Kami membangun platform ini khusus untuk kalian, para siswa SMK, terutama yang mendalami Rekayasa Perangkat Lunak (RPL). Kami percaya, belajar itu nggak harus ribet. Tujuan kami adalah membuat materi pelajaran jadi lebih mudah diakses, kapan pun dan di mana pun kalian butuh.
      </p>

      <h2>Misi Kami</h2>
      <p>
        Misi kami simpel: menyediakan materi belajar yang <em>to-the-point</em>, gampang dicerna, dan pastinya relevan. Kami ingin bantu kalian biar nggak cuma sekadar hafal materi, tapi benar-benar paham konsepnya, mulai dari pelajaran kejuruan seperti DK RPL dan Informatika, sampai pelajaran umum lainnya.
      </p>

      <h2>Apa yang Kami Tawarkan?</h2>
      <ul>
        <li><strong>Materi Ringkas:</strong> Gak perlu baca buku tebal, kami sudah rangkum per bab biar kalian bisa fokus pada intinya.</li>
        <li><strong>Belajar Fleksibel:</strong> Buka di laptop atau HP, semuanya kami desain agar nyaman di mata dan mudah digunakan.</li>
        <li><strong>Konten Relevan:</strong> Materi yang kami sajikan, khususnya untuk RPL, disesuaikan dengan kebutuhan industri saat ini.</li>
        <li><strong>100% Gratis:</strong> Ilmu itu untuk dibagikan. Semua materi di sini bisa kalian akses tanpa biaya sepeser pun.</li>
      </ul>

      <h2>Tim Kami</h2>
      <p>ShadowSIx dibuat oleh Seorang Siswa Bernama Ridho Rezky Anwar Nomer Absennya 30 yang juga punya semangat di dunia pendidikan dan teknologi. Kami bukan perusahaan besar, hanya sekumpulan orang yang ingin membuat proses belajar jadi lebih baik. Kami akan terus kembangkan platform ini agar bisa jadi teman belajar yang bisa diandalkan.</p>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSIx Project UKK No Absen 30. All Rights Reserved.</p>
    </footer>
    </main>
  </body>
</html>
