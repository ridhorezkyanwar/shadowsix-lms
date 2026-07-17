<?php
session_start();
include 'databasecpnel.php';

// Proteksi halaman jika perluuu
// if (!isset($_SESSION['loggedin'])) {
//     header("Location: login.php");
//     exit();
// }

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    header("Location: index.php"); 
    exit();
}

$stmt = $conn->prepare("SELECT nama_pelajaran, judul_materi, isi_materi, gambar_materi, nama_guru FROM materi WHERE id = ?");
if ($stmt) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $materi = $result->fetch_assoc();
    $stmt->close();
} else {
    die("Kesalahan sistem saat mengambil materi.");
}

if (!$materi) {
    die("Materi tidak ditemukan.");
}

$back_link = 'index.php#subjects';


$nama_pelajaran_raw = $materi['nama_pelajaran'];

if ($nama_pelajaran_raw == 'Bahasa Indonesia') {
    $back_link = 'indonesia.php';
} elseif ($nama_pelajaran_raw == 'Bahasa Inggris') {
    $back_link = 'inggris.php';
} elseif ($nama_pelajaran_raw == 'DK RPL') {
    $back_link = 'dkrpl.php';
} elseif ($nama_pelajaran_raw == 'Seni Rupa') {
    $back_link = 'senirupa.php';
} elseif ($nama_pelajaran_raw == 'Coding & AI') { 
    $back_link = 'coding-&-ai.php';
} elseif ($nama_pelajaran_raw == 'Sejarah') {
    $back_link = 'materi-sejarah/sejarah.php';
} elseif ($nama_pelajaran_raw == 'PJOK') {
    $back_link = 'materi-pjok/pjok.php';
} elseif ($nama_pelajaran_raw == 'BK') {
    $back_link = 'materi-bk/bk.php';
} elseif ($nama_pelajaran_raw == 'Pendidikan Agama') {
    $back_link = 'materi-pai/pai.php';
} elseif ($nama_pelajaran_raw == 'PPKN') {
    $back_link = 'materi-ppkn/ppkn.php';
} elseif ($nama_pelajaran_raw == 'Matematika') {
    $back_link = 'matematika.php';
} elseif ($nama_pelajaran_raw == 'IPAS') {
    $back_link = 'ipas.php';
} elseif ($nama_pelajaran_raw == 'Informatika') {
    $back_link = 'informatika.php';
} else {
    $back_link = 'mapel.php?nama=' . urlencode($nama_pelajaran_raw);
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($materi['judul_materi']); ?> - ShadowSix</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin.css"> <!-- Untuk gaya container dan footer -->
    <style>
        /* Gaya khusus untuk konten materi */
        .materi-content {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background: var(--surface-strong);
            border: 4px solid var(--line);
            border-radius: 24px;
            box-shadow: var(--shadow);
        }
        .materi-content h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--line);
            margin-bottom: 1rem;
        }
        .materi-content h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--line);
            margin-top: 2rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid var(--muted);
            padding-bottom: 0.5rem;
        }
        .materi-content p {
            margin-bottom: 1rem;
            line-height: 1.7;
            color: var(--text);
        }
        .materi-content ul, .materi-content ol {
            margin-left: 20px;
            margin-bottom: 1rem;
        }
        .materi-content li {
            margin-bottom: 0.5rem;
            color: var(--text);
        }
        .materi-content pre {
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            overflow-x: auto;
            font-family: 'Courier New', Courier, monospace;
            margin-bottom: 1rem;
        }
        .materi-content img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 1.5rem auto;
            border: 3px solid var(--line);
            border-radius: 12px;
            box-shadow: 4px 4px 0 var(--line);
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">ShadowSix</div>
        <nav class="nav">
            <a href="index.php">Home</a>
            <a href="index.php#subjects">Mata Pelajaran</a>
            <a href="tentang.php">Tentang</a>
            <a href="kontak/kontak.php">Kontak</a>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <a href="dashboard_admin.php">Dashboard Admin</a>
            <?php endif; ?>
        </nav>
        <div class="user-info">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <span class="username">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <a href="logout.php" class="login-btn logout-btn" style="text-decoration: none">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login-btn" style="text-decoration: none">Login</a>
            <?php endif; ?>
        </div>
    </div>

    <main>
        <div class="materi-content">
            <p style="color: var(--muted); font-weight: 600; margin-bottom: 0.5rem;">
                <a href="<?php echo htmlspecialchars($back_link); ?>" class="back-link" style="display: inline;">&larr; Kembali ke Daftar Materi</a>
            </p>
            <h1 style="margin-top: 0;"><?php echo htmlspecialchars($materi['judul_materi']); ?></h1>
            <p style="color: var(--muted); font-style: italic;">Mata Pelajaran: <?php echo htmlspecialchars($materi['nama_pelajaran']); ?></p>
            <?php if (!empty($materi['nama_guru'])): ?>
                <p style="color: var(--muted); font-style: italic;">Guru Pembimbing: <?php echo htmlspecialchars($materi['nama_guru']); ?></p>
            <?php endif; ?>
            <hr style="border: none; border-top: 2px solid var(--line); margin: 1.5rem 0;">
            <div class="isi-materi">
                <?php if (!empty($materi['gambar_materi'])): ?>
                    <img src="<?php echo htmlspecialchars($materi['gambar_materi']); ?>" alt="<?php echo htmlspecialchars($materi['judul_materi']); ?>">
                <?php endif; ?>
                <?php echo $materi['isi_materi']; ?>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
</body>
</html>