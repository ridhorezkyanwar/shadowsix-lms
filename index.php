<?php
session_start();
include 'databasecpnel.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Project UKK</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="features.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="index.php">Home</a>
        <a href="#subjects">Mata Pelajaran</a>
        <a href="tentang.php">Tentang</a>
        <a href="kontak/kontak.php">Kontak</a>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          <a href="dashboard_admin.php" style="color: var(--accent-2); font-weight: 800;">Dashboard Admin</a>
        <?php endif; ?>
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
    <div class="hero">
      <div class="hero-title">Selamat Datang <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
          , <?php echo htmlspecialchars($_SESSION['username']); ?>!
        <?php endif; ?> <br> Di Dashboard Website!</div>
      <div class="hero-desc">
        Project Ukk Dibuat Oleh Ridho Rezky Anwar/30 
      </div>
      <?php 
        
        $link_mulai_belajar = (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) ? '#subjects' : 'login.php';
        ?>
      <a href="<?php echo $link_mulai_belajar; ?>" class="hero-btn" style="text-decoration: none;">Mulai Belajar</a>
    </div>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <div class="mata">
        <h2>Mata Pelajaran</h2>
        <div class="subjects" id="subjects">
          <?php
          $query_mapel = "SELECT DISTINCT nama_pelajaran FROM materi ORDER BY nama_pelajaran ASC";
          $result_mapel = $conn->query($query_mapel);
          
          if ($result_mapel && $result_mapel->num_rows > 0) {
              $colors = ['#38bdf8', '#f87171', '#22c55e', '#6366f1', '#0ea5e9', '#fbbf24', '#f472b6', '#a78bfa', '#ef4444', '#3b82f6'];
              $color_index = 0;
              while ($row_mapel = $result_mapel->fetch_assoc()) {
                  $nama_pelajaran_raw = $row_mapel['nama_pelajaran'];
                  $link_mapel = ''; 
                  
                  $image_path = ''; 
                  if ($nama_pelajaran_raw == 'Bahasa Indonesia') {
                      $link_mapel = 'indonesia.php';
                      $image_path = 'img/Bahasa_Indonesia_BG_KLS_X_Rev_Cover.png';
                  } elseif ($nama_pelajaran_raw == 'Bahasa Inggris') {
                      $link_mapel = 'inggris.php';
                      $image_path = 'img/bahasa inggris.jpg'; 
                  } elseif ($nama_pelajaran_raw == 'DK RPL') {
                      $link_mapel = 'dkrpl.php';
                      $image_path = 'img/dk rpl.jpg'; 
                  } elseif ($nama_pelajaran_raw == 'Seni Rupa') {
                      $link_mapel = 'senirupa.php';
                      $image_path = 'img/Seni_Rupa_BG_KLS_X_Rev_Cover.png';
                  } elseif ($nama_pelajaran_raw == 'Coding & AI') {
                      $link_mapel = 'coding-&-ai.php'; 
                      $image_path = 'img/Buku-Koding-Kelas-10-860x1208.jpg';
                  } elseif ($nama_pelajaran_raw == 'Sejarah') {
                      $link_mapel = 'materi-sejarah/sejarah.php';
                      $image_path = 'img/sejarah.jpg';
                  } elseif ($nama_pelajaran_raw == 'PJOK') {
                      $link_mapel = 'materi-pjok/pjok.php';
                      $image_path = 'img/pjok.jpg';
                  } elseif ($nama_pelajaran_raw == 'BK') {
                      $link_mapel = 'materi-bk/bk.php';
                      $image_path = 'img/bk.jpg';
                  } elseif ($nama_pelajaran_raw == 'Pendidikan Agama') {
                      $link_mapel = 'materi-pai/pai.php';
                      $image_path = 'img/pai.jpg';
                  } elseif ($nama_pelajaran_raw == 'PPKN') {
                      $link_mapel = 'materi-ppkn/ppkn.php';
                      $image_path = 'img/ppkn.jpg';
                  } elseif ($nama_pelajaran_raw == 'Matematika') {
                      $link_mapel = 'matematika.php';
                      $image_path = 'img/20200616_105716matematika.jpg';
                  } elseif ($nama_pelajaran_raw == 'IPAS') {
                      $link_mapel = 'ipas.php';
                      $image_path = 'img/Projek-IPAS-untuk-SMK-MAK-Kelas-X.png';
                  } elseif ($nama_pelajaran_raw == 'Informatika') {
                      $link_mapel = 'informatika.php';
                      $image_path = 'img/informatika.jpg';
                  } else {
                      $link_mapel = 'mapel.php?nama=' . urlencode($nama_pelajaran_raw);
                  }

                  if (empty($image_path)) {
                      $stmt_mapel_img = $conn->prepare("SELECT gambar_mapel FROM materi WHERE nama_pelajaran = ? AND gambar_mapel IS NOT NULL LIMIT 1");
                      if ($stmt_mapel_img) {
                          $stmt_mapel_img->bind_param("s", $nama_pelajaran_raw);
                          $stmt_mapel_img->execute();
                          $res_img = $stmt_mapel_img->get_result();
                          if ($res_img->num_rows > 0) {
                              $row_img = $res_img->fetch_assoc();
                              $image_path = $row_img['gambar_mapel'];
                          }
                          $stmt_mapel_img->close();
                      }
                  }

                  $current_color = $colors[$color_index % count($colors)];
                  $color_index++;
                  

                  $nama_pelajaran = htmlspecialchars($nama_pelajaran_raw, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
                  $safe_image_path = is_string($image_path)
                      ? htmlspecialchars($image_path, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
                      : '';
                  $icon_content = $safe_image_path !== ''
                      ? '<img src="' . $safe_image_path . '" alt="' . $nama_pelajaran . '">'
                      : htmlspecialchars(substr($nama_pelajaran_raw, 0, 1), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');


                  $stmt_desc = $conn->prepare("SELECT judul_materi, nama_guru FROM materi WHERE nama_pelajaran = ? ORDER BY id ASC LIMIT 1");
                  $deskripsi_singkat = "Belum ada deskripsi.";
                  $nama_guru_display = "";
                  if ($stmt_desc) {
                      $stmt_desc->bind_param("s", $nama_pelajaran_raw);
                      $stmt_desc->execute();
                      $res_desc = $stmt_desc->get_result();
                      if ($res_desc->num_rows > 0) {
                          $row_desc = $res_desc->fetch_assoc();
                          $deskripsi_singkat = htmlspecialchars($row_desc['judul_materi']);
                          if (!empty($row_desc['nama_guru'])) {
                              $nama_guru_display = '<br>Guru: ' . htmlspecialchars($row_desc['nama_guru']);
                          }
                      }
                      $stmt_desc->close();
                  }

                  echo '<a href="' . htmlspecialchars($link_mapel, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '" class="subject-card">';
                  echo '<div class="subject-icon" style="color: ' . $current_color . ';">' . $icon_content . '</div>'; // Menggunakan gambar atau huruf pertama sebagai ikon
                  echo $nama_pelajaran;
                  echo '<br><span style="font-size: 0.9em; color: var(--muted);">' . $deskripsi_singkat . '</span>'; // Deskripsi singkat (judul materi pertama)
                  echo '<br><span style="font-size: 0.8em; color: var(--muted);">' . $nama_guru_display . '</span>'; // Nama Guru
                  echo '</a>';
              }
          } else {
              echo '<p style="text-align: center; width: 100%; padding: 20px; color: var(--muted);">Belum ada mata pelajaran yang tersedia.</p>';
          }
          ?>
        </div>
      </div>
    <?php else: ?>
           <div class="features">
          <h2>Kenapa Harus ShadowSIx? Level Up Skill Kamu!</h2>
          <div class="feature-list">
              <div class="feature-item">
                  <div class="feature-icon">📚</div>
                  <h3>Materi Super Lengkap</h3>
                  <p>Semua mata pelajaran esensial tersedia. Materi disusun mendalam dan praktis untuk dikuasai.</p>
              </div>
              <div class="feature-item">
                  <div class="feature-icon">💻</div>
                  <h3>Akses Fleksibel & Cepat</h3>
                  <p>Belajar kapan saja, di mana saja. Platform responsif, siap diakses dari desktop atau smartphone Anda.</p>
              </div>
              <div class="feature-item">
                  <div class="feature-icon">💸</div>
                  <h3>Gratis Total!</h3>
                  <p>Tingkatkan skillset Anda tanpa hambatan biaya. Seluruh materi 100% gratis tanpa biaya tersembunyi.</p>
              </div>
          </div>
      </div>
    <?php endif; ?>
    </main>
    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>
