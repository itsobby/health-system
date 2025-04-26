<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'db.php'; // Uses $pdo from your db.php

    $client_id = $_POST['client_id'];
    $program_ids = $_POST['program_ids']; // corrected field name

    $program_ids_array = explode(',', $program_ids);

    $sql = "INSERT INTO client_programs (client_id, program_id) VALUES (:client_id, :program_id)";
    $stmt = $pdo->prepare($sql);

    foreach ($program_ids_array as $program_id) {
        $program_id = trim($program_id);
        $stmt->execute([
            'client_id' => $client_id,
            'program_id' => $program_id
        ]);
    }

    header("Location: enrollment_success.php"); // Redirect after saving
    exit;
}
?>
