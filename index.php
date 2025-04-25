<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Health Info System - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Health Info System</a>
    </div>
  </nav>

  <div class="container my-5">
    <h2 class="text-center mb-4">Welcome! Choose an action below</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-plus-square display-4 text-primary"></i>
            <h5 class="card-title mt-3">Add Program</h5>
            <p class="card-text">Create a new health program like TB, HIV, Malaria.</p>
            <a href="add_program.php" class="btn btn-outline-primary">Go</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-list-ul display-4 text-success"></i>
            <h5 class="card-title mt-3">View Programs</h5>
            <p class="card-text">Browse all existing health programs.</p>
            <a href="view_programs.php" class="btn btn-outline-success">Go</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-person-plus-fill display-4 text-info"></i>
            <h5 class="card-title mt-3">Register Client</h5>
            <p class="card-text">Add a new client into the system.</p>
            <a href="add_client.php" class="btn btn-outline-info">Go</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-people-fill display-4 text-warning"></i>
            <h5 class="card-title mt-3">Enroll Client</h5>
            <p class="card-text">Enroll clients in one or more programs.</p>
            <a href="enroll_client.php" class="btn btn-outline-warning">Go</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-search display-4 text-danger"></i>
            <h5 class="card-title mt-3">Search Client</h5>
            <p class="card-text">Find a client by name and view details.</p>
            <a href="search_client.php" class="btn btn-outline-danger">Go</a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <footer class="bg-light text-center py-3 mt-5">
    <small>&copy; <?php echo date('Y'); ?> Health Info System. All rights reserved.</small>
  </footer>
</body>
</html>
