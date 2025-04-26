<?php
// Include the database connection
require 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values and sanitize them
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];

    // Prepare SQL query to insert data into the database
    $sql = "INSERT INTO clients (full_name, age, gender, contact) VALUES (:full_name, :age, :gender, :contact)";
    
    try {
        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind the parameters to the SQL query
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':contact', $contact);

        // Execute the query
        $stmt->execute();

        // Redirect to a confirmation page or display success message
        echo '<!DOCTYPE html>
        <html lang="en">
        <head><meta charset="UTF-8"><title>Client Saved</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"></head>
        <body><div class="container my-5"><h2>Client Saved Successfully!</h2>
        <a href="add_client.php" class="btn btn-secondary mt-3">Back to Add Client</a></div></body></html>';
    } catch (PDOException $e) {
        // Handle errors (e.g., display message if insertion fails)
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register New Client</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Health Info System</a>
  </div>
</nav>

<div class="container my-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4><i class="bi bi-person-plus"></i> Register New Client</h4>
      <p class="mb-0 small">Fill in the details below to add a new client to the system</p>
    </div>
    <div class="card-body">
      <form method="POST" action="save_client.php">
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-control" name="full_name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Age</label>
          <input type="number" class="form-control" name="age" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Gender</label>
          <select class="form-select" name="gender" required>
            <option selected disabled>Select gender</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Contact</label>
          <input type="text" class="form-control" name="contact" required>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save Client</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>

<footer class="bg-light text-center py-3 mt-5">
  <small>&copy; <?= date('Y') ?> Health Info System</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
