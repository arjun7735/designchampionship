<?php
// Start the session
session_start();

// Check if the admin is logged in
if (isset($_SESSION['admin_email'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();
}

// Prevent caching of the page in the browser
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");

// Redirect to the admin login page
header("Location: adminlogin.php");
exit();  // Ensure that the script stops executing after redirection
?>
