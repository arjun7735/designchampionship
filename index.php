<?php
include 'db.php';
session_start();

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Step 1: Try admin login
    $stmt = $conn->prepare("SELECT id, password FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        // Admin found
        $stmt->bind_result($adminId, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            session_regenerate_id(true);
            $_SESSION['admin_email'] = $email;
            $_SESSION['admin_id'] = $adminId;
            header("Location: admin.php");
            exit();
        } else {
            $error = "Incorrect password.";
        }
        $stmt->close();
    } else {
        // Admin not found, check in users
        $stmt->close();
        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($hashedPassword);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                session_regenerate_id(true);
                $_SESSION['user_email'] = $email;
                header("Location: main.php");
                exit();
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No account found with that email.";
        }

        $stmt->close();
    }
}

// Guest login
if (isset($_GET['guest']) && $_GET['guest'] == 'true') {
    $_SESSION['user_email'] = 'guest_' . uniqid();
    header("Location: main.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>

  <div class="container">
    <div class="left-panel">
      <img src="images/loginpg.png" alt="Login Illustration" />
      <p>One Stop Solution For All Your ICT Needs</p>
    </div>
    <div class="right-panel">
      <img src="images/ict_logo-new-removebg.png" alt="ICT360 Logo" class="logo"/>
      <h2>LOGIN</h2>

      <?php if ($success) echo "<p style='color: green;'>$success</p>"; ?>
      <?php if ($error) echo "<p style='color: red;'>$error</p>"; ?>

      <form method="POST" action="">
        <div class="input-box">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="input-box">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
        </div>
        <button type="submit">LOGIN</button>

        <a href="forgotpass.php" class="forgot-link">Forgot Password?</a>
        <a href="?guest=true" class="register-link">You can also <span>Login as Guest</span></a>
        <a href="register.php" class="register-link">New User? <span>Register now</span></a>
      </form>
    </div>
  </div>

</body>
</html>
