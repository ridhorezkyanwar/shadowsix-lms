<?php
session_start();
require_once __DIR__ . '/security.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit();
}

$username = (string) ($_SESSION['username'] ?? 'pengguna');
$csrfToken = shadowsix_csrf_token();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Keluar - ShadowSix</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="logout.css"> 
</head>
<body>

    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="index.php">Home</a>
        <a href="tentang.php">Tentang</a>
        <a href="kontak/kontak.php">Kontak</a>
      </nav>
      <div class="user-info">
        <span class="username">Konfirmasi Keluar</span>
      </div>
    </div>

    <main>
    <div class="logout-wrapper">
    <div class="logout-container">
        <div class="logo" style="margin-bottom: 1rem;">ShadowSix</div>
        <h2>Halo, <?php echo htmlspecialchars($username); ?>👋</h2>
        
        <p>
            Serius nih mau logout? 🧐<br> 
            Yakin gak mau lanjut belajar materi lainnya?
        </p>
        
        <div class="logout-actions">
            <a href="index.php" class="login-btn" style="text-decoration: none; width: 100%; margin-bottom: 12px;">Gajadi, Lanjut Belajar!</a>
            <form action="konfirmlogout.php" method="POST" style="width: 100%;">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" class="login-btn logout-btn" style="text-decoration: none; width: 100%; border: 0; cursor: pointer;">Iya, Keluar Aja</button>
            </form>
        </div>
    </div>
    </div>
    </main>

    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
</body>
</html>