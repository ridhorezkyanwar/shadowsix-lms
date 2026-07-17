<?php
session_start();
include '../databasecpnel.php'; 
$message_status = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"]))); 

    if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $message);

            if ($stmt->execute()) {
                $message_status = '<div class="status-success">Pesan Anda berhasil terkirim.</div>';
                
                $to = "admin@situsanda.com"; 
                $subject = "Pesan Baru dari $name";
                $body = "Nama: $name\nEmail: $email\nPesan: $message";
                $headers = "From: no-reply@ridho10.ukk-rpl.site";
                
                @mail($to, $subject, $body, $headers);

            } else {
                $message_status = '<div class="status-error">Gagal menyimpan pesan ke database.</div>';
            }
            $stmt->close();
        } else {
            $message_status = '<div class="status-error">Kesalahan Database: ' . $conn->error . '</div>';
        }
    } else {
        $message_status = '<div class="status-error">Harap isi semua kolom dengan benar.</div>';
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