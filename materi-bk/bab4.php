<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perencanaan Karir - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="bk.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="bk.php">Kembali ke Materi BK</a>
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
      <div class="hero-title">Perencanaan Karir di SMK</div>
      <div class="hero-desc">
        Setelah Selesai di SMK tentukan Karir Mu mau kerja atau kuliah
      </div>
    </div>

    <div class="content chapter">
        <h1>BAB 4</h1>

        <h2>Memahami Kurikulum SMK</h2>
        <p>Mengenal kompetensi keahlian yang diambil, prospek kerja, dan peluang untuk melanjutkan pendidikan tinggi setelah lulus SMK.</p>

        <h2>Menyusun Rencana Karir</h2>
        <ul>
            <li>Menyelaraskan minat dengan jurusan.</li>
            <li>Menentukan target jangka pendek (lulus dengan baik) dan jangka panjang (pekerjaan impian).</li>
            <li>Mencari informasi tentang dunia industri.</li>
        </ul>

        <h2>Pentingnya Praktik Kerja Lapangan (PKL)</h2>
        <ul>
            <li>Mendapatkan pengalaman kerja nyata.</li>
            <li>Membangun jaringan profesional.</li>
            <li>Mengaplikasikan ilmu yang dipelajari di sekolah.</li>
        </ul>

        <h2>Penerapan dalam Kehidupan Sehari-hari</h2>
        <p>Serius mengikuti pembelajaran praktik, aktif mencari informasi magang, dan mempersiapkan portofolio hasil karya selama di sekolah.</p>
    </div>

    <footer class="site-footer">
        <p>&copy; 2026 ShadowSix Project UKK No Absen 30. All Rights Reserved.</p>
    </footer>
  </body>
</html>