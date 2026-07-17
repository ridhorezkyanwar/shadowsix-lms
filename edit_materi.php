<?php
session_start();
include 'databasecpnel.php';

// Proteksi halaman
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;


if ($id <= 0) {
    header("Location: dashboard_admin.php");
    exit();
}

$message_status = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pelajaran = htmlspecialchars(strip_tags(trim($_POST["nama_pelajaran"])));
    $judul_materi = htmlspecialchars(strip_tags(trim($_POST["judul_materi"])));
    $isi_materi = trim($_POST["isi_materi"]);
    $current_gambar = $_POST['current_gambar'] ?? null; // Ambil nama gambar yang sudah ada
    $current_mapel = $_POST['current_mapel'] ?? null;
    $nama_guru = htmlspecialchars(strip_tags(trim($_POST["nama_guru"])));
    $gambar_materi = $current_gambar; // Defaultnya tetap gambar yang sudah ada
    $gambar_mapel = $current_mapel;

    if (!empty($nama_pelajaran) && !empty($judul_materi) && !empty($isi_materi)) {
        // Handle image upload if a new file is selected
        if (isset($_FILES['gambar_materi']) && $_FILES['gambar_materi']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/materi/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $file_extension = pathinfo($_FILES['gambar_materi']['name'], PATHINFO_EXTENSION);
            $new_file_name = uniqid('materi_') . '.' . $file_extension;
            $target_file = $target_dir . $new_file_name;
            $imageFileType = strtolower($file_extension);

            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowed_types)) {
                $message_status = '<div class="status-msg error">Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.</div>';
            } elseif ($_FILES['gambar_materi']['size'] > 5000000) { // 5MB
                $message_status = '<div class="status-msg error">Maaf, ukuran file terlalu besar (maks 5MB).</div>';
            } elseif (move_uploaded_file($_FILES['gambar_materi']['tmp_name'], $target_file)) {
                // Hapus gambar lama jika ada dan berhasil upload gambar baru
                if ($current_gambar && file_exists($current_gambar)) {
                    unlink($current_gambar);
                }
                $gambar_materi = $target_file;
            } else {
                $message_status = '<div class="status-msg error">Maaf, terjadi kesalahan saat mengunggah gambar baru.</div>';
            }
        }

        // Handle mapel image update
        if (isset($_FILES['gambar_mapel']) && $_FILES['gambar_mapel']['error'] == UPLOAD_ERR_OK) {
            $target_dir_mapel = "uploads/mapel/";
            if (!is_dir($target_dir_mapel)) mkdir($target_dir_mapel, 0777, true);
            
            $ext = pathinfo($_FILES['gambar_mapel']['name'], PATHINFO_EXTENSION);
            $new_name = uniqid('mapel_') . '.' . $ext;
            $target_f = $target_dir_mapel . $new_name;

            if (move_uploaded_file($_FILES['gambar_mapel']['tmp_name'], $target_f)) {
                if ($current_mapel && file_exists($current_mapel)) unlink($current_mapel);
                $gambar_mapel = $target_f;
            }
        }

        // Hanya lanjutkan jika tidak ada error upload atau jika tidak ada gambar yang diupload
        if (empty($message_status)) {
            // Menggunakan Prepared Statement untuk keamanan
            $stmt_update = $conn->prepare("UPDATE materi SET nama_pelajaran = ?, judul_materi = ?, isi_materi = ?, gambar_materi = ?, gambar_mapel = ?, nama_guru = ? WHERE id = ?");
            if ($stmt_update) {
                $stmt_update->bind_param("ssssssi", $nama_pelajaran, $judul_materi, $isi_materi, $gambar_materi, $gambar_mapel, $nama_guru, $id);
                
                if ($stmt_update->execute()) {
                    $message_status = '<div class="status-msg success">Materi Berhasil Diperbarui!</div>';
                } else {
                    $message_status = '<div class="status-msg error">Gagal memperbarui data.</div>';
                }
                $stmt_update->close();
            }
        }
    } else {
        $message_status = '<div style="color: #e74c3c; font-weight: bold; margin-bottom: 15px;">Harap isi semua kolom form.</div>';
    }
}


$stmt_fetch = $conn->prepare("SELECT * FROM materi WHERE id = ?");
$stmt_fetch->bind_param("i", $id); // Re-fetch data after potential update
$stmt_fetch->execute();
$result = $stmt_fetch->get_result();
$data = $result->fetch_assoc();
$stmt_fetch->close();


if (!$data) {
    die("Data materi tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Materi - ShadowSix</title>
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

    <div class="container-materi">
      <h2 style="margin-top: 0; font-weight: 800;">Edit Materi Pembelajaran</h2>
      <p style="margin-bottom: 20px; color: var(--muted);">Perbarui informasi materi di bawah ini.</p>
      
      <?php echo $message_status; ?>

      <form action="edit_materi.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama_pelajaran">Nama Pelajaran</label>
          <input type="text" id="nama_pelajaran" name="nama_pelajaran" value="<?php echo htmlspecialchars($data['nama_pelajaran']); ?>" required />
        </div>

        <div class="form-group">
          <label for="judul_materi">Judul Materi</label>
          <input type="text" id="judul_materi" name="judul_materi" value="<?php echo htmlspecialchars($data['judul_materi']); ?>" required />
        </div>

        <div class="form-group">
          <label for="isi_materi">Isi Materi</label>
          <textarea id="isi_materi" name="isi_materi" required><?php echo htmlspecialchars($data['isi_materi']); ?></textarea>
        </div>
        
        <div class="form-group">
          <label for="gambar_mapel">Gambar Mata Pelajaran (Beranda)</label>
          <?php if (!empty($data['gambar_mapel'])): ?>
            <img src="<?php echo htmlspecialchars($data['gambar_mapel']); ?>" alt="Mapel" style="max-width: 100px; display: block; margin-bottom: 10px;">
            <input type="hidden" name="current_mapel" value="<?php echo htmlspecialchars($data['gambar_mapel']); ?>">
          <?php endif; ?>
          <input type="file" id="gambar_mapel" name="gambar_mapel" accept="image/*" />
        </div>

        <div class="form-group">
          <label for="gambar_materi">Gambar Materi (Opsional)</label>
          <?php if (!empty($data['gambar_materi'])): ?>
            <p style="margin-bottom: 10px;">Gambar saat ini:</p>
            <img src="<?php echo htmlspecialchars($data['gambar_materi']); ?>" alt="Gambar Materi" style="max-width: 200px; height: auto; display: block; margin-bottom: 15px; border: 2px solid var(--line); border-radius: 8px;">
            <input type="hidden" name="current_gambar" value="<?php echo htmlspecialchars($data['gambar_materi']); ?>">
          <?php endif; ?>
          <input type="file" id="gambar_materi" name="gambar_materi" accept="image/*" />
          <small style="color: var(--muted);">Kosongkan jika tidak ingin mengubah gambar. Ukuran maksimal 5MB (JPG, JPEG, PNG, GIF).</small>
        </div>

        <div class="form-group">
          <label for="nama_guru">Nama Guru Pembimbing</label>
          <input type="text" id="nama_guru" name="nama_guru" value="<?php echo htmlspecialchars($data['nama_guru']); ?>" placeholder="Misal: Budi Santoso, S.Pd." />
        </div>

        <button type="submit" class="login-btn" style="width: 100%; display: block; border-radius: 12px;">Perbarui Materi</button>
      </form>
      <a href="dashboard_admin.php" class="back-link">&larr; Kembali ke Dashboard Admin</a>
    </div>
    </main>

    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>