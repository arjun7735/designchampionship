<?php
include 'db.php';

$success = $error = "";

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists and is not expired
    $stmt = $conn->prepare("SELECT id, reset_token, token_expire FROM users WHERE reset_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        // Token exists, now check if it's expired
        $stmt->bind_result($userId, $resetToken, $tokenExpire);
        $stmt->fetch();

        if (strtotime($tokenExpire) > time()) {
            // Token is valid (not expired)

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $newPassword = $_POST['password'];
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password and reset the token
                $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, token_expire = NULL WHERE id = ?");
                $stmt->bind_param("si", $hashedPassword, $userId);
                $stmt->execute();

                $success = "Your password has been successfully updated!";
            }
        } else {
            // Token is expired
            $error = "This reset link has expired.";
        }
    } else {
        // Token doesn't exist in the database
        $error = "Invalid or expired token.";
    }

    $stmt->close();
} else {
    $error = "No token provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
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
            <h2>RESET PASSWORD</h2>

            <?php if ($success) echo "<p style='color: green;'>$success</p>"; ?>
            <?php if ($error) echo "<p style='color: red;'>$error</p>"; ?>

            <form method="POST" action="">
                <div class="input-box">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" required />
                </div>
                <button type="submit">UPDATE PASSWORD</button>
                <a href="index.php" class="register-link">Back to <span>Login</span></a>
            </form>
        </div>
    </div>
</body>
</html>
