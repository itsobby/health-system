<?php
require '../db.php'; // Adjust the path based on your folder structure
header('Content-Type: application/json');

// Check if client ID is provided
if (!isset($_GET['id'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Client ID is required"
    ]);
    exit;
}

$client_id = (int) $_GET['id'];

// Fetch client data
$sql = "SELECT * FROM clients WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$client_id]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$client) {
    echo json_encode([
        "status" => "error",
        "message" => "Client not found"
    ]);
    exit;
}

// Fetch enrolled programs
$program_sql = "
    SELECT p.name 
    FROM programs p 
    JOIN client_programs cp ON cp.program_id = p.id 
    WHERE cp.client_id = ?
";
$program_stmt = $pdo->prepare($program_sql);
$program_stmt->execute([$client_id]);
$programs = $program_stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode([
    "status" => "success",
    "client" => [
        "id" => $client['id'],
        "full_name" => $client['full_name'],
        "age" => $client['age'],
        "gender" => $client['gender'],
        "contact" => $client['contact'],
        "enrolled_programs" => $programs
    ]
]);
?>
