<?php
session_start();
include 'databasecpnel.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, fullname, password, role FROM login WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['fullname'];
                $_SESSION['role'] = $user['role'];

                header("Location: index.php");
                exit();
            } else {
                $error_message = "Email atau Password salah.";
            }
        } else {
            $error_message = "Email atau Password salah.";
        }
        $stmt->close();
    } else {
        $error_message = "Kesalahan Sistem: Gagal memproses data.";
    }

    $conn->close();
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
