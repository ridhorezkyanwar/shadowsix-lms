<?php
session_start();
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/databasecpnel.php';

shadowsix_require_admin();

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
                $gambar_materi = $materiUpload['path'];
                $gambar_mapel = $mapelUpload['path'];
                $stmt = null;

                try {
                    $stmt = $conn->prepare(
                        'INSERT INTO materi (nama_pelajaran, judul_materi, isi_materi, gambar_materi, gambar_mapel, nama_guru) VALUES (?, ?, ?, ?, ?, ?)'
                    );
                    $stmt->bind_param('ssssss', $nama_pelajaran, $judul_materi, $isi_materi, $gambar_materi, $gambar_mapel, $nama_guru);
                    $stmt->execute();
                    $message_status = '<div class="status-msg success">Materi berhasil ditambahkan.</div>';
                } catch (Throwable $e) {
                    error_log('ShadowSix: failed to add material: ' . $e->getMessage());
                    shadowsix_delete_uploaded_image($gambar_materi, 'materi');
                    shadowsix_delete_uploaded_image($gambar_mapel, 'mapel');
                    $message_status = '<div class="status-msg error">Materi tidak dapat disimpan. Periksa konfigurasi dan coba lagi.</div>';
                } finally {
                    if ($stmt instanceof mysqli_stmt) {
                        $stmt->close();
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
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
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