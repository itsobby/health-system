<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("No program ID specified.");
}

// Fetch program details
$stmt = $pdo->prepare("SELECT * FROM programs WHERE id = ?");
$stmt->execute([$id]);
$program = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$program) {
    die("Program not found.");
}

// Handle form submission
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = trim($_POST['program_name']);

    if (!empty($newName)) {
        $updateStmt = $pdo->prepare("UPDATE programs SET name = ? WHERE id = ?");
        if ($updateStmt->execute([$newName, $id])) {
            $success = true;
            // Refresh the program name after update
            $program['name'] = $newName;
        } else {
            $error = "Failed to update program.";
        }
    } else {
        $error = "Program name cannot be empty.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Program</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Health Info System</a>
    </div>
</nav>

<div class="container my-5">
    <h2 class="mb-4"><i class="bi bi-pencil-square text-primary"></i> Edit Health Program</h2>

    <?php if ($success): ?>
        <div class="alert alert-success">Program updated successfully.</div>
    <?php elseif ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="program_name" class="form-label">Program Name</label>
            <input type="text" class="form-control" id="program_name" name="program_name" value="<?= htmlspecialchars($program['name']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update Program</button>
        <a href="view_programs.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Back</a>
    </form>
</div>

<footer class="bg-light text-center py-3 mt-5">
    <small>&copy; <?= date('Y') ?> Health Info System</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
