<?php
require 'db.php'; // This defines $pdo

$query = "";
$results = [];

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $sql = "SELECT * FROM clients WHERE full_name LIKE :query"; // or client_name
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['query' => "%$query%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Clients</title>
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
            <h3 class="card-title text-primary"><i class="bi bi-search"></i> Search Clients</h3>
            <p class="card-text mb-4">Find clients by their name using the search field below.</p>
            <form method="GET" class="mb-3">
            <input type="text" name="query" class="form-control me-2" placeholder="Enter client name" required>
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-search"></i> Search
    </button>
            </form>

            <?php if (!empty($results)): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>ID</th><th>Name</th><th>Action</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['full_name']) ?></td>
                                <td><a href="view_client.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif ($query !== ""): ?>
                <p>No results found for "<?= htmlspecialchars($query) ?>".</p>
            <?php endif; ?>

            <div class="mt-4 text-end">
                <a href="index.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
