<?php
session_start();
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/databasecpnel.php';

$error_message = '';
$csrfToken = shadowsix_csrf_token();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!shadowsix_verify_csrf_token($_POST['csrf_token'] ?? null)) {
        $error_message = 'Sesi formulir tidak valid. Muat ulang halaman lalu coba lagi.';
    } else {
        $emailValue = $_POST['email'] ?? '';
        $passwordValue = $_POST['password'] ?? '';

        if (
            !is_string($emailValue) || !is_string($passwordValue) ||
            strlen($emailValue) > 191 || !filter_var(trim($emailValue), FILTER_VALIDATE_EMAIL) ||
            $passwordValue === '' || strlen($passwordValue) > 4096
        ) {
            $error_message = 'Email atau Password salah.';
        } else {
            $email = strtolower(trim($emailValue));
            $stmt = null;

            try {
                $stmt = $conn->prepare('SELECT id, fullname, password, role FROM login WHERE email = ? LIMIT 1');
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                if ($user && password_verify($passwordValue, $user['password'])) {
                    session_regenerate_id(true);
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = (int) $user['id'];
                    $_SESSION['username'] = $user['fullname'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

                    header('Location: index.php');
                    exit();
                }

                $error_message = 'Email atau Password salah.';
            } catch (Throwable $e) {
                error_log('ShadowSix: login attempt could not be processed: ' . $e->getMessage());
                $error_message = 'Login tidak dapat diproses saat ini. Silakan coba lagi nanti.';
            } finally {
                if ($stmt instanceof mysqli_stmt) {
                    $stmt->close();
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
    <title>Login - ShadowSix</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <main>
      <div class="login-container">
        <div class="login-title">
          <div class="logo">ShadowSix</div>
          <span>Masuk Akun</span>
        </div>

        <form action="login.php" method="POST">
          <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
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
          <button class="login-btn-main" type="submit">Login</button>

          <?php if (isset($error_message)): ?>
            <p style="color: var(--accent-3); text-align: center; font-weight: 700; margin-top: 15px;">
              <?php echo htmlspecialchars($error_message); ?>
            </p>
          <?php endif; ?>

          <br />
        </form>
        <p>
          Belum Punya Akun ? 
          <a class="register" href="register.php">Register disini</a>
          <br>
          Gajadi Login? 
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
