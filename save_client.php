<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['full_name']);
    $age = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    $contact = trim($_POST['contact']);

    if ($name && $age && $gender && $contact) {
        $stmt = $pdo->prepare("INSERT INTO clients (full_name, age, gender, contact) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $age, $gender, $contact]);
        $success = true;
    } else {
        $success = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client Saved</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
  <div class="card shadow text-center">
    <div class="card-body">
      <?php if (isset($success) && $success): ?>
        <h3 class="text-success"><i class="bi bi-check-circle-fill"></i> Client Saved Successfully!</h3>
        <p class="mt-3">You can now enroll the client in a health program or return to the dashboard.</p>
      <?php else: ?>
        <h3 class="text-danger"><i class="bi bi-x-circle-fill"></i> Error Saving Client</h3>
        <p class="mt-3">Please ensure all fields are correctly filled and try again.</p>
      <?php endif; ?>

      <div class="mt-4">
        <a href="add_client.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back to Add Client</a>
        <a href="index.php" class="btn btn-primary"><i class="bi bi-house"></i> Go to Dashboard</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>
