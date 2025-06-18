<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to login page (index.php)
header("Location: index.php");
exit();  // Make sure to exit after header to stop further execution
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logging Out</title>
    <!-- Redirect after 1 second -->
    <meta http-equiv="refresh" content="1;url=index.php">
    <link rel="stylesheet" href="logout.css"> <!-- Link to external CSS file -->
</head>
<body>
    <div class="message">Logging out...</div>
    <div class="loader"></div>
</body>
</html>
