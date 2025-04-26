<?php
// save_enrollment.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'db.php'; // Include your DB connection file

    $client_id = $_POST['client_id'];
    $program_ids = $_POST['program_id'];

    // Split program IDs by commas and insert them into the database
    $program_ids_array = explode(',', $program_ids);

    foreach ($program_ids_array as $program_id) {
        $program_id = trim($program_id); // Clean the program ID
        $sql = "INSERT INTO client_programs (client_id, program_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $client_id, $program_id);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();
    header("Location: enrollment_success.php"); // Redirect to a success page
    exit;
}
?>

<!-- enroll_client.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enroll Client</title>
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
            <h3 class="card-title text-primary"><i class="bi bi-person-plus-fill"></i> Enroll Client in Program</h3>
            <p class="card-text mb-4">Assign existing clients to health programs using their IDs.</p>
            <form action="save_enrollment.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Client ID</label>
                    <input type="text" name="client_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Program ID(s) (comma-separated)</label>
                    <input type="text" name="program_ids" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save2"></i> Enroll</button>
            </form>

            <div class="mt-4 text-end">
                <a href="index.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
