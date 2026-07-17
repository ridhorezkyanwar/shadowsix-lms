<?php
session_start();
include 'databasecpnel.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT email FROM login WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0){
    $message = "Email sudah terdaftar, silakan gunakan email lain.";
  } else {
    // Hanya insert jika email belum ada
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Gunakan prepared statement untuk insert
    $stmt_insert = $conn->prepare("INSERT INTO login (fullname, email, password) VALUES (?, ?, ?)");
    $stmt_insert->bind_param("sss", $fullname, $email, $hashed_password);

    if($stmt_insert->execute()){
      // Redirect ke halaman login setelah berhasil registrasi
      header("Location: login.php");
      exit();
    } else {
      $message = "Error: " . $stmt_insert->error;
    }
    $stmt_insert->close();
  }
  $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - ShadowSix</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="register.css" />
  </head>
  <body>
    <main>
      <div class="login-container">
        <div class="login-title">
          <div class="logo">ShadowSix</div>
          <span>Daftar Akun</span>
        </div>

        <form action="register.php" method="POST">
          <label class="login-label" for="username">Username</label>
          <input
            class="login-input"
            type="text"
            id="username"
            name="fullname"
            placeholder="Enter your username"
            required
          />
          <label class="login-label" for="email">Email</label>
          <input
            class="login-input"
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email"
            required
          />
          <label class="login-label" for="password">Password</label>
          <div class="password-wrapper">
            <input
              class="login-input"
              type="password"
              id="password"
              name="password"
              placeholder="Enter your password"
              required
            />
            <button
              type="button"
              class="toggle-password"
              onclick="togglePassword()"
              tabindex="-1"
              aria-label="Show password"
            >
              &#128065;
            </button>
          </div>
          <button class="login-btn-main" type="submit">Register</button>
        </form>
        <?php
          if (!empty($message)) {
              echo '<p style="color: red; text-align: center; margin-top: 15px;">' . htmlspecialchars($message) . '</p>';
          }
        ?>
        <p>
          Sudah Punya Akun ?
          <a class="register" href="login.php">Login disini</a>
          <br>
          Gajadi Daftar? 
          <a class="gajadi" href="index.php">Kembali Ke Home</a>
        </p>
      </div>
    </main>
    <script>
      function togglePassword() {
        const pwd = document.getElementById("password");
        if (pwd.type === "password") {
          pwd.type = "text";
        } else {
          pwd.type = "password";
        }
      }
    </script>
  </body>
</html>
