<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengenalan Deep Learning & Computer Vision - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="koding.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../kodingdanai.php">kembali ke materi Coding & AI</a>
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
      <div class="hero-title">Pengenalan Deep Learning & Computer Vision</div>
      <div class="hero-desc">
        Gambaran singkat tentang neural network, deep learning, dan aplikasi pengolahan citra (computer vision).
      </div>
    </div>

    <div class="content">
        <h1>BAB 8</h1>
        <h1>PENGENALAN DEEP LEARNING & COMPUTER VISION</h1>

        <h2>Inti Materi</h2>
        <p>Gambaran singkat tentang neural network, deep learning, dan aplikasi pengolahan citra (computer vision).</p>

        <ul>
          <li>Konsep neuron, lapisan (layer), activation function (ReLU, Sigmoid).</li>
          <li>Arsitektur dasar: multilayer perceptron (MLP) dan CNN (overview).</li>
          <li>Aplikasi: klasifikasi gambar sederhana, deteksi objek (penjelasan non-teknis).</li>
          <li>Peran dataset besar dan GPU untuk pelatihan model kompleks.</li>
        </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>
