<?php
require 'db.php'; // Uses $pdo

if (isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Fetch client info
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
    $stmt->execute([$client_id]);
    $client = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$client) {
        echo "Client not found!";
        exit;
    }

    // Fetch enrolled programs
    $program_stmt = $pdo->prepare("
        SELECT p.name FROM programs p
        JOIN client_programs cp ON p.id = cp.program_id
        WHERE cp.client_id = ?
    ");
    $program_stmt->execute([$client_id]);
    $programs = $program_stmt->fetchAll(PDO::FETCH_COLUMN);
} else {
    echo "Client not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Health Info System</a>
    </div>
</nav>

<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="card-title text-primary"><i class="bi bi-person-circle"></i> Client Profile</h3>
            <ul class="list-group">
                <li class="list-group-item">Name: <?= htmlspecialchars($client['full_name']) ?></li>
                <li class="list-group-item">Age: <?= htmlspecialchars($client['age']) ?></li>
                <li class="list-group-item">Gender: <?= htmlspecialchars($client['gender']) ?></li>
                <li class="list-group-item">Contact: <?= htmlspecialchars($client['contact']) ?></li>
            </ul>

            <h5 class="mt-4 text-primary">Enrolled Programs</h5>
            <?php if (!empty($programs)): ?>
                <ul class="list-group">
                    <?php foreach ($programs as $program): ?>
                        <li class="list-group-item"><?= htmlspecialchars($program) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="text-muted">No enrolled programs found.</p>
            <?php endif; ?>

            <div class="mt-4 text-end">
                <a href="index.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
