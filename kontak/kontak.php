<?php
session_start();
require_once __DIR__ . '/../security.php';
require_once __DIR__ . '/../databasecpnel.php';

$message_status = '';
$csrfToken = shadowsix_csrf_token();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!shadowsix_verify_csrf_token($_POST['csrf_token'] ?? null)) {
        $message_status = '<div class="status-error">Sesi formulir tidak valid. Muat ulang halaman lalu coba lagi.</div>';
    } else {
        $nameValue = $_POST['name'] ?? '';
        $emailValue = $_POST['email'] ?? '';
        $messageValue = $_POST['message'] ?? '';

        if (!is_string($nameValue) || !is_string($emailValue) || !is_string($messageValue)) {
            $message_status = '<div class="status-error">Data formulir tidak valid.</div>';
        } else {
            $name = trim($nameValue);
            $email = strtolower(trim($emailValue));
            $message = trim($messageValue);

            if (
                $name === '' || strlen($name) > 100 ||
                strlen($email) > 191 || !filter_var($email, FILTER_VALIDATE_EMAIL) ||
                $message === '' || strlen($message) > 5000
            ) {
                $message_status = '<div class="status-error">Isi nama, email yang valid, dan pesan maksimal 5.000 byte.</div>';
            } else {
                $stmt = null;
                try {
                    $stmt = $conn->prepare('INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)');
                    $stmt->bind_param('sss', $name, $email, $message);
                    $stmt->execute();

                    $contactTo = getenv('CONTACT_EMAIL');
                    $mailFrom = getenv('MAIL_FROM');
                    if (
                        is_string($contactTo) && filter_var($contactTo, FILTER_VALIDATE_EMAIL) &&
                        is_string($mailFrom) && filter_var($mailFrom, FILTER_VALIDATE_EMAIL)
                    ) {
                        $safeReplyEmail = str_replace(["\\r", "\\n"], '', $email);
                        $body = "Nama: " . $name . "\\nEmail: " . $safeReplyEmail . "\\n\\nPesan:\\n" . $message;
                        $headers = "From: " . $mailFrom . "\\r\\nReply-To: " . $safeReplyEmail;
                        if (@mail($contactTo, 'Pesan baru dari formulir ShadowSix', $body, $headers)) {
                            $message_status = '<div class="status-success">Pesan tersimpan dan notifikasi email telah diserahkan ke server email.</div>';
                        } else {
                            $message_status = '<div class="status-success">Pesan tersimpan, tetapi notifikasi email gagal dikirim. Administrator perlu memeriksa konfigurasi email.</div>';
                        }
                    } else {
                        $message_status = '<div class="status-success">Pesan tersimpan. Notifikasi email belum dikonfigurasi oleh administrator.</div>';
                    }
                } catch (Throwable $e) {
                    error_log('ShadowSix: contact form submission failed: ' . get_class($e));
                    $message_status = '<div class="status-error">Pesan tidak dapat disimpan saat ini. Silakan coba lagi nanti.</div>';
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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kontak - ShadowSix</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="kontak.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">ShadowSix</div>
      <nav class="nav">
        <a href="../index.php">Home</a>
        <a href="../index.php#subjects">Mata Pelajaran</a>
        <a href="../tentang.php">Tentang</a>
        <a href="kontak.php">Kontak</a>
      </nav>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <div class="user-info">
        <span class="username"
          >Selamat Datang,
          <?php echo htmlspecialchars($_SESSION['username']); ?>!</span
        >
        <a
          href="../logout.php"
          class="login-btn logout-btn"
          style="text-decoration: none"
          >Logout</a
        >
      </div>
      <?php else: ?>
      <a href="../login.php" class="login-btn" style="text-decoration: none"
        >Login</a
      >
      <?php endif; ?>
    </div>

    <main>
    <div class="content">
      <h1>Hubungi Kami</h1>
      <p>
        Punya pertanyaan, masukan, atau ingin bekerja sama? Jangan ragu untuk
        menghubungi kami!
      </p>

      <div class="contact-wrapper">
        <!-- nampilin pesan statusnya bro -->
        <?php echo $message_status; ?>

        <form class="contact-form" action="kontak.php" method="POST">
          <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
          <label for="name">Nama</label>
          <input type="text" id="name" name="name" required />

          <label for="email">Email</label>
          <input type="email" id="email" name="email" required />

          <label for="message">Pesan</label>
          <textarea id="message" name="message" rows="5" required></textarea>

          <button type="submit" class="hero-btn">Kirim Pesan</button>
        </form>
      </div>
    </div>
    </main>

    <footer>
      <p>&copy; 2026 ShadowSix Project UKK No Absen 30</p>
    </footer>
  </body>
</html>