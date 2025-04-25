<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // First check if the program exists
    $stmt = $pdo->prepare("SELECT * FROM programs WHERE id = ?");
    $stmt->execute([$id]);
    $program = $stmt->fetch();

    if ($program) {
        // Delete the program
        $deleteStmt = $pdo->prepare("DELETE FROM programs WHERE id = ?");
        $deleteStmt->execute([$id]);
    }
}

header("Location: view_programs.php");
exit;
