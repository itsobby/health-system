<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Health Program</title>
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
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title text-center mb-4">
              <i class="bi bi-hospital text-primary"></i> Add New Health Program
            </h4>
            <form method="POST" action="save_program.php">
              <div class="mb-3">
                <label for="program_name" class="form-label">Program Name</label>
                <input type="text" class="form-control" id="program_name" name="program_name" required placeholder="e.g. Malaria, TB, HIV">
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-save"></i> Save Program
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="text-center mt-3">
        <a href="index.php" class="btn btn-outline-secondary"><i class="bi bi-house"></i> Back to Dashboard</a>
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-light text-center py-3 mt-5">
    <small>&copy; <?php echo date('Y'); ?> Health Info System. All rights reserved.</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
