<?php
$host = "localhost";
$dbname = "user_auth";
$user = "root";
$pass = ""; // default password is empty in XAMPP

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
