<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gambar Teknik - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="seni.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../senirupa.php">kembali ke materi seni rupa</a>
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
      <div class="hero-title">Gambar Teknik</div>
      <div class="hero-desc">
        Pelajari dasar-dasar, peralatan, dan proyeksi dalam gambar teknik.
      </div>
    </div>

    <div class="content">
      <h1>BAB 2</h1>
      <h2>Pengertian Gambar Teknik</h2>
      <p>
        Gambar teknik adalah gambar yang digunakan untuk menyampaikan informasi
        teknis secara akurat, jelas, dan universal. Gambar ini biasanya dipakai
        dalam arsitektur, rekayasa, desain produk, dan bidang teknis lainnya
        untuk menggambarkan bentuk, ukuran, serta detail suatu objek.
      </p>

      <h2>Peralatan Gambar Teknik</h2>
      <p>
        Dalam membuat gambar teknik, digunakan alat-alat khusus untuk
        menghasilkan garis yang presisi dan akurat, seperti:
      </p>
      <ul>
        <li>Pensil mekanik</li>
        <li>Penggaris lurus</li>
        <li>Penggaris segitiga</li>
        <li>Jangka</li>
        <li>Pena teknik (rapidograph)</li>
        <li>Penghapus presisi</li>
      </ul>

      <h2>Jenis Proyeksi dalam Gambar Teknik</h2>
      <p>
        Proyeksi digunakan untuk menggambarkan objek tiga dimensi ke bidang dua
        dimensi.
      </p>

      <h3>Proyeksi Ortogonal</h3>
      <ul>
        <li>Tampak depan</li>
        <li>Tampak samping</li>
        <li>Tampak atas</li>
        <li>Digambar tanpa perspektif sehingga ukuran tetap akurat</li>
      </ul>

      <h3>Proyeksi Perspektif</h3>
      <ul>
        <li>
          <strong>Satu titik hilang</strong>: digunakan untuk objek yang dilihat
          dari depan.
        </li>
        <li>
          <strong>Dua titik hilang</strong>: digunakan untuk menggambar sudut
          bangunan atau benda.
        </li>
        <li>
          <strong>Tiga titik hilang</strong>: digunakan untuk menggambarkan objek
          dari sudut ekstrem (mata burung/mata cacing).
        </li>
      </ul>

      <h2>Sudut Pandang (Eye Level)</h2>
      <p>
        Dalam gambar teknik, sudut pandang berpengaruh pada hasil perspektif.
        Beberapa contoh sudut pandang:
      </p>
      <ul>
        <li>
          <strong>Mata cacing</strong>: objek terlihat dominan dan tinggi, karena
          dilihat dari bawah.
        </li>
        <li><strong>Mata normal</strong>: pandangan sejajar, paling umum digunakan.</li>
        <li>
          <strong>Mata burung</strong>: objek terlihat kecil dan menyeluruh karena
          dilihat dari atas.
        </li>
      </ul>

      <h2>Fungsi Gambar Teknik</h2>
      <p>
        Gambar teknik berfungsi sebagai media komunikasi untuk menjelaskan
        bentuk, ukuran, detail, dan cara kerja suatu objek. Gambar ini menjadi
        pedoman dalam proses pembuatan, pembangunan, perakitan, hingga
        perencanaan.
      </p>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>
