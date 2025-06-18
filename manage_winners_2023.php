<?php
session_start();
include 'db.php'; // Make sure this file sets up $conn

// Handle Add Winner
if (isset($_POST['add_winner'])) {
    $stmt = $conn->prepare("INSERT INTO winners_2023 (category, level, position, unique_id, region, project_link) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $_POST['category'], $_POST['level'], $_POST['position'], $_POST['unique_id'], $_POST['region'], $_POST['project_link']);
    $stmt->execute();
    $_SESSION['message'] = "Winner added successfully!";
}

// Handle Edit Winner
if (isset($_POST['edit_winner'])) {
    $stmt = $conn->prepare("UPDATE winners_2023 SET category=?, level=?, position=?, unique_id=?, region=?, project_link=? WHERE id=?");
    $stmt->bind_param("ssssssi", $_POST['category'], $_POST['level'], $_POST['position'], $_POST['unique_id'], $_POST['region'], $_POST['project_link'], $_POST['id']);
    $stmt->execute();
    $_SESSION['message'] = "Winner updated successfully!";
}

// Handle Delete Winner
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM winners_2023 WHERE id = $id");
    $_SESSION['message'] = "Winner deleted successfully!";
    header("Location: manage_winners_2023.php");
    exit;
}

// Fetch all winners
$winners = $conn->query("SELECT * FROM winners_2023 ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Winners 2023</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="adminwin.css">
</head>
<body class="p-4">

    <div class="container">
        <h2 class="mb-4">Manage Winners - 2023</h2>
        

        <!-- Add Winner Form -->
        <form method="post" class="mb-4 border p-3 bg-light">
            <h5>Add New Winner</h5>
            <div class="row g-2">
                <div class="col"><input name="category" class="form-control" placeholder="Category" required></div>
                <div class="col"><input name="level" class="form-control" placeholder="Level" required></div>
                <div class="col"><input name="position" class="form-control" placeholder="Position" required></div>
                <div class="col"><input name="unique_id" class="form-control" placeholder="Unique ID" required></div>
                <div class="col"><input name="region" class="form-control" placeholder="Region" required></div>
                <div class="col"><input name="project_link" class="form-control" placeholder="Project Link" required></div>
                <div class="col-auto"><button type="submit" name="add_winner" class="btn btn-success">Add</button></div>
            </div>
        </form>

        <!-- Winners Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Level</th>
                    <th>Position</th>
                    <th>Unique ID</th>
                    <th>Region</th>
                    <th>Project Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $winners->fetch_assoc()): ?>
                    <tr>
                        <form method="post">
                            <td><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
                            <td><input type="text" name="category" class="form-control" value="<?= htmlspecialchars($row['category']) ?>"></td>
                            <td><input type="text" name="level" class="form-control" value="<?= htmlspecialchars($row['level']) ?>"></td>
                            <td><input type="text" name="position" class="form-control" value="<?= htmlspecialchars($row['position']) ?>"></td>
                            <td><input type="text" name="unique_id" class="form-control" value="<?= htmlspecialchars($row['unique_id']) ?>"></td>
                            <td><input type="text" name="region" class="form-control" value="<?= htmlspecialchars($row['region']) ?>"></td>
                            <td><input type="text" name="project_link" class="form-control" value="<?= htmlspecialchars($row['project_link']) ?>"></td>
                            <td class="text-nowrap">
                                <button type="submit" name="edit_winner" class="btn btn-primary btn-sm">Update</button>
                                <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this winner?')">Delete</a>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
