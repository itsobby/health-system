<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM programs");
$programs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Programs</title>
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
  <h2 class="mb-4 text-center"><i class="bi bi-list-check text-primary"></i> List of Health Programs</h2>

  <?php if (count($programs) > 0): ?>
    <table class="table table-hover table-striped shadow-sm">
      <thead class="table-primary">
        <tr>
          <th>#</th>
          <th>Program Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($programs as $program): ?>
          <tr>
            <td><?= htmlspecialchars($program['id']) ?></td>
            <td><?= htmlspecialchars($program['name']) ?></td>
            <td>
                <a href="edit_program.php?id=<?= $program['id'] ?>" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
                <a href="delete_program.php?id=<?= $program['id'] ?>" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this program?');">
                    <i class="bi bi-trash"></i> Delete
                </a>
</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-info text-center">No programs found.</div>
  <?php endif; ?>

  <div class="text-center mt-4">
    <a href="add_program.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add New Program</a>
    <a href="index.php" class="btn btn-outline-secondary"><i class="bi bi-house"></i> Back to Dashboard</a>
  </div>
</div>

<footer class="bg-light text-center py-3 mt-5">
  <small>&copy; <?= date('Y') ?> Health Info System</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
