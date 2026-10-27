<?php
session_start();
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/databasecpnel.php';

$message = '';
$csrfToken = shadowsix_csrf_token();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!shadowsix_verify_csrf_token($_POST['csrf_token'] ?? null)) {
        $message = 'Sesi formulir tidak valid. Muat ulang halaman lalu coba lagi.';
    } else {
        $fullnameValue = $_POST['fullname'] ?? '';
        $emailValue = $_POST['email'] ?? '';
        $passwordValue = $_POST['password'] ?? '';

        if (!is_string($fullnameValue) || !is_string($emailValue) || !is_string($passwordValue)) {
            $message = 'Data pendaftaran tidak valid.';
        } else {
            $fullname = trim(strip_tags($fullnameValue));
            $email = strtolower(trim($emailValue));
            $password = $passwordValue;

            if (
                $fullname === '' || strlen($fullname) > 100 ||
                strlen($email) > 191 || !filter_var($email, FILTER_VALIDATE_EMAIL) ||
                strlen($password) < 12 || strlen($password) > 72
            ) {
                $message = 'Isi nama dan email yang valid. Kata sandi harus 12–72 byte.';
            } else {
                $stmt = null;
                try {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    if ($hashedPassword === false) {
                        throw new RuntimeException('Password hashing failed.');
                    }

                    $stmt = $conn->prepare('INSERT INTO login (fullname, email, password) VALUES (?, ?, ?)');
                    $stmt->bind_param('sss', $fullname, $email, $hashedPassword);
                    $stmt->execute();
                    header('Location: login.php?registered=1');
                    exit();
                } catch (mysqli_sql_exception $e) {
                    if ((int) $e->getCode() === 1062) {
                        $message = 'Email sudah terdaftar, silakan gunakan email lain.';
                    } else {
                        error_log('ShadowSix: registration failed with database error code ' . (int) $e->getCode() . '.');
                        $message = 'Pendaftaran tidak dapat diproses saat ini. Silakan coba lagi nanti.';
                    }
                } catch (Throwable $e) {
                    error_log('ShadowSix: registration failed: ' . get_class($e));
                    $message = 'Pendaftaran tidak dapat diproses saat ini. Silakan coba lagi nanti.';
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
          <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
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
              placeholder="Use 12–72 bytes" minlength="12" maxlength="72"
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
