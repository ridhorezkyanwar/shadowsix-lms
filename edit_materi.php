<?php
session_start();
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/databasecpnel.php';

shadowsix_require_admin();

$idValue = $_GET['id'] ?? '';
$id = is_scalar($idValue) && ctype_digit((string) $idValue) ? (int) $idValue : 0;
if ($id <= 0) {
    header('Location: dashboard_admin.php');
    exit();
}

$stmtFetch = $conn->prepare('SELECT id, nama_pelajaran, judul_materi, isi_materi, gambar_materi, gambar_mapel, nama_guru FROM materi WHERE id = ?');
$stmtFetch->bind_param('i', $id);
$stmtFetch->execute();
$result = $stmtFetch->get_result();
$data = $result->fetch_assoc();
$stmtFetch->close();

if (!$data) {
    http_response_code(404);
    exit('Materi tidak ditemukan.');
}

$message_status = '';
$csrfToken = shadowsix_csrf_token();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!shadowsix_verify_csrf_token($_POST['csrf_token'] ?? null)) {
        $message_status = '<div class="status-msg error">Sesi formulir tidak valid. Muat ulang halaman lalu coba lagi.</div>';
    } else {
        $nama_pelajaran = trim((string) ($_POST['nama_pelajaran'] ?? ''));
        $judul_materi = trim((string) ($_POST['judul_materi'] ?? ''));
        $isi_materi = trim((string) ($_POST['isi_materi'] ?? ''));
        $nama_guru = trim((string) ($_POST['nama_guru'] ?? ''));

        if (
            $nama_pelajaran === '' || strlen($nama_pelajaran) > 100 ||
            $judul_materi === '' || strlen($judul_materi) > 191 ||
            $isi_materi === '' || strlen($isi_materi) > 60000 ||
            strlen($nama_guru) > 100
        ) {
            $message_status = '<div class="status-msg error">Periksa kembali isian. Nama pelajaran maksimal 100 karakter, judul 191 karakter, nama guru 100 karakter, dan isi materi maksimal 60.000 byte.</div>';
        } else {
            $materiUpload = shadowsix_store_uploaded_image($_FILES['gambar_materi'] ?? null, 'materi');
            $mapelUpload = shadowsix_store_uploaded_image($_FILES['gambar_mapel'] ?? null, 'mapel');

            if ($materiUpload['error'] !== null || $mapelUpload['error'] !== null) {
                shadowsix_delete_uploaded_image($materiUpload['path'], 'materi');
                shadowsix_delete_uploaded_image($mapelUpload['path'], 'mapel');
                $uploadError = $materiUpload['error'] ?? $mapelUpload['error'];
                $message_status = '<div class="status-msg error">' . htmlspecialchars((string) $uploadError, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</div>';
            } else {
                // Keep the existing database paths; never trust hidden form values for filesystem operations.
                $gambar_materi = $materiUpload['path'] !== null ? $materiUpload['path'] : $data['gambar_materi'];
                $gambar_mapel = $mapelUpload['path'] !== null ? $mapelUpload['path'] : $data['gambar_mapel'];
                $stmtUpdate = null;

                try {
                    $stmtUpdate = $conn->prepare(
                        'UPDATE materi SET nama_pelajaran = ?, judul_materi = ?, isi_materi = ?, gambar_materi = ?, gambar_mapel = ?, nama_guru = ? WHERE id = ?'
                    );
                    $stmtUpdate->bind_param('ssssssi', $nama_pelajaran, $judul_materi, $isi_materi, $gambar_materi, $gambar_mapel, $nama_guru, $id);
                    $stmtUpdate->execute();

                    if ($materiUpload['path'] !== null && $data['gambar_materi'] !== $gambar_materi) {
                        shadowsix_delete_uploaded_image($data['gambar_materi'], 'materi');
                    }
                    if ($mapelUpload['path'] !== null && $data['gambar_mapel'] !== $gambar_mapel) {
                        shadowsix_delete_uploaded_image($data['gambar_mapel'], 'mapel');
                    }

                    $data['nama_pelajaran'] = $nama_pelajaran;
                    $data['judul_materi'] = $judul_materi;
                    $data['isi_materi'] = $isi_materi;
                    $data['gambar_materi'] = $gambar_materi;
                    $data['gambar_mapel'] = $gambar_mapel;
                    $data['nama_guru'] = $nama_guru;
                    $message_status = '<div class="status-msg success">Materi berhasil diperbarui.</div>';
                } catch (Throwable $e) {
                    error_log('ShadowSix: failed to update material: ' . $e->getMessage());
                    shadowsix_delete_uploaded_image($materiUpload['path'], 'materi');
                    shadowsix_delete_uploaded_image($mapelUpload['path'], 'mapel');
                    $message_status = '<div class="status-msg error">Materi tidak dapat diperbarui. Periksa konfigurasi dan coba lagi.</div>';
                } finally {
                    if ($stmtUpdate instanceof mysqli_stmt) {
                        $stmtUpdate->close();
                    }
                }
            }
        }
    }
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
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
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

          <?php endif; ?>
          <input type="file" id="gambar_mapel" name="gambar_mapel" accept="image/*" />
        </div>

        <div class="form-group">
          <label for="gambar_materi">Gambar Materi (Opsional)</label>
          <?php if (!empty($data['gambar_materi'])): ?>
            <p style="margin-bottom: 10px;">Gambar saat ini:</p>
            <img src="<?php echo htmlspecialchars($data['gambar_materi']); ?>" alt="Gambar Materi" style="max-width: 200px; height: auto; display: block; margin-bottom: 15px; border: 2px solid var(--line); border-radius: 8px;">

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