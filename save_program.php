<?php
require 'db.php';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['program_name']);

    if (!empty($name)) {
        $stmt = $pdo->prepare("INSERT INTO programs (name) VALUES (?)");
        if ($stmt->execute([$name])) {
            $success = true;
        } else {
            $error = "Error adding program.";
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
  <title>Program Saved</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <div class="card shadow-sm">
    <div class="card-body text-center">
      <?php if ($success): ?>
        <h4 class="text-success"><i class="bi bi-check-circle-fill"></i> Program Added Successfully</h4>
        <p class="mb-4">The new health program has been saved into the system.</p>
      <?php else: ?>
        <h4 class="text-danger"><i class="bi bi-exclamation-triangle-fill"></i> Error</h4>
        <p class="mb-4"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>
      <a href="add_program.php" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Add Another</a>
      <a href="index.php" class="btn btn-outline-secondary"><i class="bi bi-house-door-fill"></i> Back to Dashboard</a>
    </div>
  </div>
</div>

<footer class="bg-light text-center py-3 mt-5">
  <small>&copy; <?= date('Y') ?> Health Info System</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
