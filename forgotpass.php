<?php

require 'vendor/autoload.php';

include 'db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoload file

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        // User exists, generate reset token and expiry time
        $token = bin2hex(random_bytes(32)); // Generates a secure random token
        $tokenExpire = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token expires in 1 hour

        // Update token and expiration time in the database
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, token_expire = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $tokenExpire, $email);
        $stmt->execute();

        // Send reset email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'verifyotp7735@gmail.com'; // your Gmail address
            $mail->Password = 'hhhzgxjzzhsmseey'; // your App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('verifyotp7735@gmail.com', 'ICT 360');
            $mail->addAddress($email);

            $resetLink = "http://localhost/ict360/resetpass.php?token=$token"; // Your reset link

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Click the link below to reset your password:<br><a href='$resetLink'>$resetLink</a>";

            $mail->send();
            $success = "A password reset link has been sent to your email.";
        } catch (Exception $e) {
            $error = "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $error = "Email not found in our records.";
    }

    $stmt->close();
}
?>

<!-- HTML Form for Forgot Password -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forgot Password</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>

  <div class="container">
    <div class="left-panel">
      <img src="images/loginpg.png" alt="Teaching Illustration" />
      <p>One Stop Solution For All Your ICT Needs</p>
    </div>
    <div class="right-panel">
      <img src="images/ict_logo-new-removebg.png" alt="ICT360 Logo" class="logo"/>
      <h2>FORGOT PASSWORD</h2>

      <?php if ($success) echo "<p style='color: green;'>$success</p>"; ?>
      <?php if ($error) echo "<p style='color: red;'>$error</p>"; ?>

      <form method="POST" action="">
        <div class="input-box">
          <label for="email">Enter your registered Email</label>
          <input type="email" id="email" name="email" required />
        </div>
        <button type="submit">SEND RESET LINK</button>
        <a href="index.php" class="register-link">Back to <span>Login</span></a>
      </form>
    </div>
  </div>
</body>
</html>
