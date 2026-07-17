<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Model & Evaluasi - ShadowSix</title>
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
      <div class="hero-title">Model & Evaluasi</div>
      <div class="hero-desc">
        Memahami cara memilih model sederhana, melatihnya, dan mengevaluasi
        hasil menggunakan metrik dasar.
      </div>
    </div>

    <div class="content">
      <h1>BAB 7</h1>
      <h1>MODEL & EVALUASI</h1>

      <h2>Inti Materi</h2>
      <p>
        Memahami cara memilih model sederhana, melatihnya, dan mengevaluasi
        hasil menggunakan metrik dasar.
      </p>

      <ul>
        <li>
          Metrik evaluasi: akurasi, presisi, recall, F1-score untuk klasifikasi;
          MSE/RMSE untuk regresi.
        </li>
        <li>Konsep train/test split dan cross-validation sederhana.</li>
        <li>Perbandingan model: kapan pakai regresi vs decision tree vs KNN.</li>
        <li>
          Visualisasi hasil: confusion matrix dan plot prediksi vs aktual.
        </li>
      </ul>
    </div>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>