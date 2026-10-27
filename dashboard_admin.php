<?php
session_start();
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/databasecpnel.php';

shadowsix_require_admin();
$csrfToken = shadowsix_csrf_token();

$query = "SELECT id, nama_pelajaran, judul_materi, nama_guru, created_at FROM materi ORDER BY id DESC";
$result = $conn->query($query);


$status_msg = '';
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'hapus_berhasil') {
        $status_msg = '<div class="status-msg success">Materi berhasil dihapus secara permanen!</div>';
    } elseif ($_GET['pesan'] == 'hapus_gagal') {
        $status_msg = '<div class="status-msg error">Gagal menghapus materi. Silakan coba lagi.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin - ShadowSix</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix Admin</div>
      <nav class="nav">
        <a href="index.php">Home</a>
        <a href="tambah_materi.php" class="login-btn" style="padding: 0.5rem 1rem;">+ Tambah Materi</a>
      </nav>
      <div class="user-info">
        <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
        <a href="logout.php" class="login-btn logout-btn" style="text-decoration: none">Logout</a>
      </div>
    </div>

    <main>
    <div class="admin-container">
      <div class="admin-title-area" style="border-bottom: 4px solid var(--line); padding-bottom: 10px;">
        <h2 style="font-size: 2rem; font-weight: 800; text-transform: uppercase;">Daftar Materi</h2>
      </div>

      <?php echo $status_msg; ?>

      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th style="width: 25%;">Nama Pelajaran</th>
              <th style="width: 35%;">Judul Materi</th>
              <th style="width: 15%;">Guru Pembimbing</th>
              <th style="width: 15%;">Tanggal</th>
              <th style="width: 20%;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
              <?php $no = 1; while($row = $result->fetch_assoc()): ?>
                <tr>
                  <td style="font-weight: 800; text-align: center;"><?php echo $no++; ?></td>
                  <td><?php echo htmlspecialchars($row['nama_pelajaran']); ?></td>
                  <td style="font-weight: 600;"><?php echo htmlspecialchars($row['judul_materi']); ?></td>
                  <td><?php echo htmlspecialchars($row['nama_guru']); ?></td>
                  <td><?php echo date('d/m/Y', strtotime($row['created_at'])); ?></td>
                  <td>
                    <a href="edit_materi.php?id=<?php echo $row['id']; ?>" class="btn-action btn-edit">Edit</a>
                    <form action="hapus_materi.php" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">
                      <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
                      <input type="hidden" name="id" value="<?php echo (int) $row['id']; ?>">
                      <button type="submit" class="btn-action btn-delete" style="font: inherit; border: 0; cursor: pointer;">Hapus</button>
                    </form>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" style="text-align: center; padding: 40px; color: var(--muted);">Belum ada data materi yang tersedia.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    </main>

    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>