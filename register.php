<?php
include 'db.php';

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($password !== $confirmPassword) {

        $error = "Passwords do not match.";
        
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword);

        if ($stmt->execute()) {

            $success = "Registration successful!";
            
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Registration</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>

<body>

  <div class="container">
    <div class="left-panel">
      <img src="images\login-02.png" alt="Registration Illustration" />
      <p>Join Us and Access the Best ICT Services</p>
    </div>
    <div class="right-panel">
      <img src="images/ict_logo-new-removebg.png" alt="ICT360 Logo" class="logo"/>
      <h2>USER REGISTRATION</h2>

      <?php if ($success) echo "<p style='color: green;'>$success</p>"; ?>
      <?php if ($error) echo "<p style='color: red;'>$error</p>"; ?>

      <form method="POST" action="">
        <div class="input-box">
          <label for="username">User Name</label>
          <input type="text" id="username" name="username" required />
        </div>
        <div class="input-box">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="input-box">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
        </div>
        <div class="input-box">
          <label for="confirm-password">Confirm Password</label>
          <input type="password" id="confirm-password" name="confirm-password" required />
        </div>
        <button type="submit">REGISTER</button>
        <a href="index.php" class="register-link">Already a user? <span>Login now</span></a>
      </form>
    </div>
  </div>
</body>
</html>
