<?php
include 'db.php';
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header("Location: index.php"); // Redirect to login if not logged in
    exit();
}

// Get admin info from session
$adminEmail = $_SESSION['admin_email'];

// Fetch some admin details if needed (optional)
$stmt = $conn->prepare("SELECT id, email FROM admins WHERE email = ?");
$stmt->bind_param("s", $adminEmail);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($adminId, $adminEmail);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="admin.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For icons -->
</head>
<body>

  <div class="sidebar">
    <div class="logo">
      <img src="images/ict_logo-new-removebg.png" alt="ICT360 Logo" />
    </div>
    <ul class="nav-links">
      <li><a href="admin.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>

      <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
  </div>

  <div class="main-content">
    <header>
      <div class="welcome">
        <h2>Welcome, <?php echo $adminEmail; ?></h2>
      </div>
    </header>

    <section class="content">
      <div class="dashboard-cards">
        <div class="card">
          <div class="card-icon"><i class="fas fa-trophy"></i></div>
          <div class="card-info">
            <h3>Winners</h3>
            <p>Manage winners' details and projects.</p>
            <a href="manage_winners.php" class="btn">Manage</a>
          </div>
        </div>

        <div class="card">
          <div class="card-icon"><i class="fas fa-pen"></i></div>
          <div class="card-info">
            <h3>Results</h3>
            <p>Edit competition results.</p>
            <a href="edit_results.php" class="btn">Edit</a>
          </div>
        </div>
      </div>
    </section>
  </div>

</body>
</html>
