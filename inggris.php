<?php
session_start();
include 'databasecpnel.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahasa Inggris - ShadowSix</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="index.php">Home</a>
        <a href="tentang.php">Tentang</a>
        <a href="kontak/kontak.php">Kontak</a>
      </nav>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <div class="user-info">
          <span class="username">Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
          <a href="logout.php" class="login-btn logout-btn" style="text-decoration: none">Logout</a>
        </div>
      <?php else: ?>
        <a href="login.php" class="login-btn" style="text-decoration: none">Login</a>
      <?php endif; ?>
   </div>

   <div class="hero">
      <div class="hero-title">Bahasa Inggris</div>
      <div class="hero-desc">Learn English for communication and global knowledge.</div>
      <?php 
        $link_mulai_belajar = (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) ? '#subjects' : 'login.php';
      ?>
      <a href="<?php echo $link_mulai_belajar; ?>" class="hero-btn" style="text-decoration: none;">Mulai Belajar</a>
    </div>

    <main>
      <div class="mata">
        <h2>Daftar Materi Bahasa Inggris</h2>
        <div class="subjects" id="subjects">
          <?php
          $nama_pelajaran_filter = "Bahasa Inggris"; // Filter untuk mata pelajaran Bahasa Inggris
          $stmt_materi = $conn->prepare("SELECT id, judul_materi FROM materi WHERE nama_pelajaran = ? ORDER BY id ASC");
          if ($stmt_materi) {
              $stmt_materi->bind_param("s", $nama_pelajaran_filter);
              $stmt_materi->execute();
              $result_materi = $stmt_materi->get_result();
              $no_bab = 1; // Atau bisa menggunakan ikon sesuai keinginan
              if ($result_materi->num_rows > 0) {
                  while ($row_materi = $result_materi->fetch_assoc()) {
                      echo '<a href="view_materi.php?id=' . $row_materi['id'] . '" class="subject-card">';
                      echo '<div class="subject-icon" style="color: #38bdf8">' . $no_bab . '</div>'; 
                      echo 'Bab ' . $no_bab++ . ' - ' . htmlspecialchars($row_materi['judul_materi']);
                      echo '</a>';
                  }
              } else {
                  echo '<p style="text-align: center; padding: 20px; color: var(--muted);">Belum ada materi untuk mata pelajaran ini.</p>';
              }
              $stmt_materi->close();
          } else {
              echo '<p style="text-align: center; padding: 20px; color: var(--accent-3);">Error: Gagal mengambil data materi.</p>';
          }
          ?>
        </div>
      </div>
    </main>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
</body>
</html>