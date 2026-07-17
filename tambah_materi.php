<?php
session_start();
include 'databasecpnel.php'; 

// Proteksi halaman
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$message_status = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pelajaran = htmlspecialchars(strip_tags(trim($_POST["nama_pelajaran"])));
    $judul_materi = htmlspecialchars(strip_tags(trim($_POST["judul_materi"])));
    $isi_materi = trim($_POST["isi_materi"]); 
    $gambar_materi = null; // Default null, akan diisi jika ada upload
    $gambar_mapel = null;
    $nama_guru = htmlspecialchars(strip_tags(trim($_POST["nama_guru"])));

    if (!empty($nama_pelajaran) && !empty($judul_materi) && !empty($isi_materi)) {
        // Handle image upload
        if (isset($_FILES['gambar_materi']) && $_FILES['gambar_materi']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/materi/";
            // Pastikan direktori ada
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $file_extension = pathinfo($_FILES['gambar_materi']['name'], PATHINFO_EXTENSION);
            $new_file_name = uniqid('materi_') . '.' . $file_extension;
            $target_file = $target_dir . $new_file_name;
            $imageFileType = strtolower($file_extension);

            // Validasi tipe file
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowed_types)) {
                $message_status = '<div class="status-msg error">Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.</div>';
            } elseif ($_FILES['gambar_materi']['size'] > 5000000) { // 5MB
                $message_status = '<div class="status-msg error">Maaf, ukuran file terlalu besar (maks 5MB).</div>';
            } elseif (move_uploaded_file($_FILES['gambar_materi']['tmp_name'], $target_file)) {
                $gambar_materi = $target_file;
            } else {
                $message_status = '<div class="status-msg error">Maaf, terjadi kesalahan saat mengunggah gambar.</div>';
            }
        }

        // Handle image mapel upload
        if (isset($_FILES['gambar_mapel']) && $_FILES['gambar_mapel']['error'] == UPLOAD_ERR_OK) {
            $target_dir_mapel = "uploads/mapel/";
            if (!is_dir($target_dir_mapel)) {
                mkdir($target_dir_mapel, 0777, true);
            }

            $ext = pathinfo($_FILES['gambar_mapel']['name'], PATHINFO_EXTENSION);
            $new_name = uniqid('mapel_') . '.' . $ext;
            $target_f = $target_dir_mapel . $new_name;

            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array(strtolower($ext), $allowed) && $_FILES['gambar_mapel']['size'] <= 5000000) {
                if (move_uploaded_file($_FILES['gambar_mapel']['tmp_name'], $target_f)) {
                    $gambar_mapel = $target_f;
                }
            }
        }

        // Hanya lanjutkan jika tidak ada error upload atau jika tidak ada gambar yang diupload
        if (empty($message_status)) {
            $stmt = $conn->prepare("INSERT INTO materi (nama_pelajaran, judul_materi, isi_materi, gambar_materi, gambar_mapel, nama_guru) VALUES (?, ?, ?, ?, ?, ?)");
        
            if ($stmt) {
                $stmt->bind_param("ssssss", $nama_pelajaran, $judul_materi, $isi_materi, $gambar_materi, $gambar_mapel, $nama_guru);
                if ($stmt->execute()) {
                    $message_status = '<div class="status-msg success">Materi Berhasil Ditambahkan ke Database!</div>';
                } else {
                    $message_status = '<div class="status-msg error">Gagal menyimpan data ke database.</div>';
                }
            }
            $stmt->close();
        } else {
            $message_status = '<div class="status-msg error">Kesalahan Sistem: ' . $conn->error . '</div>';
        }
    } else {
        $message_status = '<div class="status-msg error">Harap isi semua kolom form.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Materi - ShadowSix</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix Admin</div>
      <nav class="nav">
        <a href="index.php">Home</a>
        <a href="dashboard_admin.php">Dashboard</a>
      </nav>
      <div class="user-info">
        <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
        <a href="logout.php" class="login-btn logout-btn" style="text-decoration: none">Logout</a>
      </div>
    </div>

    <main>
    <div class="container-materi">
      <h2 style="margin-top: 0; font-weight: 800;">Tambah Materi Pembelajaran</h2>
      <p style="margin-bottom: 20px; color: var(--muted);">Isi formulir di bawah ini untuk menambahkan materi baru ke dalam sistem.</p>
      
      <?php echo $message_status; ?>

      <form action="tambah_materi.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama_pelajaran">Nama Pelajaran</label>
          <input type="text" id="nama_pelajaran" name="nama_pelajaran" placeholder="Misal: Pemrograman Web" required />
        </div>

        <div class="form-group">
          <label for="judul_materi">Judul Materi</label>
          <input type="text" id="judul_materi" name="judul_materi" placeholder="Misal: Pengenalan PHP & MySQL" required />
        </div>

        <div class="form-group">
          <label for="isi_materi">Isi Materi</label>
          <textarea id="isi_materi" name="isi_materi" placeholder="Masukkan konten materi di sini..." required></textarea>
        </div>
        
        <div class="form-group">
          <label for="gambar_mapel">Gambar/Foto Mata Pelajaran (Tampil di Beranda)</label>
          <input type="file" id="gambar_mapel" name="gambar_mapel" accept="image/*" />
          <small style="color: var(--muted);">Ini foto yang akan muncul di kotak mata pelajaran di Home.</small>
        </div>

        <div class="form-group">
          <label for="gambar_materi">Gambar Materi (Opsional)</label>
          <input type="file" id="gambar_materi" name="gambar_materi" accept="image/*" />
          <small style="color: var(--muted);">Ukuran maksimal 5MB (JPG, JPEG, PNG, GIF).</small>
        </div>

        <div class="form-group">
          <label for="nama_guru">Nama Guru Pembimbing</label>
          <input type="text" id="nama_guru" name="nama_guru" placeholder="Misal: Budi Santoso, S.Pd." />
        </div>
        
        <button type="submit" class="login-btn" style="width: 100%; display: block; border-radius: 12px;">Simpan Materi</button>
      </form>

      <a href="index.php" class="back-link">&larr; Kembali ke Beranda</a>
    </div>
    </main>

    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>