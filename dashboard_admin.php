<?php
session_start();
include 'databasecpnel.php'; 

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

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
                    <a href="hapus_materi.php?id=<?php echo $row['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">Hapus</a>
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