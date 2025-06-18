<?php
// --------------------
// HTTP Basic Auth Setup
// --------------------
$AUTH_USER = 'admin'; // Change this
$AUTH_PASS = 'yourStrongPassword'; // Change this
$has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
$is_authenticated = (
    $has_supplied_credentials &&
    $_SERVER['PHP_AUTH_USER'] === $AUTH_USER &&
    $_SERVER['PHP_AUTH_PW'] === $AUTH_PASS
);

if (!$is_authenticated) {
    header('HTTP/1.1 401 Authorization Required');
    header('WWW-Authenticate: Basic realm="Admin Registration"');
    exit('Access Denied');
}

// --------------------
// Include DB Connection
// --------------------
include 'db.php'; // Ensure this file contains a valid $conn object

$success = $error = "";

// --------------------
// Handle POST Request
// --------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate email and password
    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, '@dcadmin.in')) {
        $error = "Not a Admin go back to User Registration page";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM admins WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Admin with this email already exists.";
        } else {
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Insert admin
            $stmt = $conn->prepare("INSERT INTO admins (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $hashedPassword);

            if ($stmt->execute()) {
                $success = "Admin registered successfully!";
                header("Location: adminlogin.php");
                exit();
            } else {
                $error = "There was an error registering the admin.";
            }
        }
        $stmt->close();
    }
}

// Compatibility for older PHP versions (pre-8.0)
if (!function_exists('str_ends_with')) {
    function str_ends_with($haystack, $needle) {
        return substr($haystack, -strlen($needle)) === $needle;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Registration</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>

  <div class="container">
    <div class="left-panel">
      <img src="images\login-03.png" alt="Admin Illustration" />
      <p>Admin Registration Portal</p>
    </div>
    <div class="right-panel">
      <img src="images/ict_logo-new-removebg.png" alt="ICT360 Logo" class="logo"/>
      <h2>ADMIN REGISTRATION</h2>

      <?php if ($success): ?>
        <p style='color: green;'><?= $success ?></p>
      <?php endif; ?>
      <?php if ($error): ?>
        <p style='color: red;'><?= $error ?></p>
      <?php endif; ?>

      <form method="POST" action="">
        <div class="input-box">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="input-box">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
        </div>
        <button type="submit">REGISTER ADMIN</button>
      </form>
    </div>
  </div>

</body>
</html>
