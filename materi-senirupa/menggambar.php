<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menggambar - ShadowSix</title>
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
      <div class="hero-title">Dasar-Dasar Menggambar</div>
      <div class="hero-desc">
        Pelajari dasar-dasar menggambar dan teknik-teknik yang digunakan.
      </div>
    </div>

    <div class="content">
      <h1>BAB 1</h1>
      <h2>Pengertian menggambar</h2>
      <p>
        Menggambar adalah seni menciptakan gambar atau ilustrasi menggunakan
        berbagai alat dan teknik. Menggambar dapat dilakukan dengan tangan bebas
        atau menggunakan alat bantu seperti pensil, pena, kuas, dan lain-lain.
      </p>
      <h2>Identifikasi bentuk</h2>
      <p>
        Dalam menggambar, penting untuk mengidentifikasi bentuk dasar dari objek
        yang akan digambar. Bentuk dasar ini meliputi lingkaran, persegi,
        segitiga, dan oval. Dengan memahami bentuk dasar, kita dapat lebih mudah
        menggambar objek yang kompleks.
      </p>
      <h2>Alat & bahan menggambar</h2>
      <p>
        Beberapa alat dan bahan yang umum digunakan dalam menggambar antara
        lain:
      </p>
      <h3>Media kering</h3>
      <ul>
        <li>Pensil</li>
        <li>Arang</li>
        <li>Spidol</li>
        <li>Crayon</li>
        <li>Pulpen</li>
      </ul>
      <h3>Media basah</h3>
      <ul>
        <li>Cat air</li>
        <li>Cat minyak</li>
        <li>Cat akrilik</li>
        <li>Tinta</li>
      </ul>
      <h2>Teknik menggambar</h2>
      <p>Beberapa teknik dasar dalam menggambar antara lain:</p>
      <ul>
        <li>Garis: Menggunakan garis untuk membuat bentuk dan detail.</li>
        <li>
          Bayangan: Menambahkan bayangan untuk memberikan dimensi pada gambar.
        </li>
        <li>
          Tekstur: Menciptakan tekstur untuk menambah realisme pada gambar.
        </li>
        <li>
          Komposisi: Menyusun elemen-elemen dalam gambar agar terlihat seimbang
          dan menarik.
        </li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2025 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>
