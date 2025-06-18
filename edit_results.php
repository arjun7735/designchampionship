<?php
include 'db.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: adminlogin.php");
    exit();
}

// Update result if submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];
    $result = $_POST['result'];

    $stmt = $conn->prepare("UPDATE users SET result = ? WHERE id = ?");
    $stmt->bind_param("si", $result, $userId);
    $stmt->execute();
    $stmt->close();
}

// Fetch all users
$users = $conn->query("SELECT id, name, result FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Results</title>
    <link rel="stylesheet" href="admin.css" />
</head>
<body>
    <h2>Edit Results</h2>
    <table>
        <tr><th>Name</th><th>Result</th><th>Action</th></tr>
        <?php while ($row = $users->fetch_assoc()): ?>
        <tr>
            <form method="POST">
                <td><?php echo $row['name']; ?></td>
                <td>
                    <input type="text" name="result" value="<?php echo $row['result']; ?>" />
                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>" />
                </td>
                <td><button type="submit">Update</button></td>
            </form>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
