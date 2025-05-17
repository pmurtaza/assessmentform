<?php
header('Content-Type: application/json');
require 'db.php';

$input = json_decode(file_get_contents('php://input'), true);

// Prepare insert
$stmt = $pdo->prepare("INSERT INTO applications
  (name, age, contactNumber, email, /* ... other columns ... */)
  VALUES (:name, :age, :contactNumber, :email /* ... */)");

// Bind values
$stmt->execute([
  ':name' => $input['name'],
  ':age' => $input['age'],
  ':contactNumber' => $input['contactNumber'],
  ':email' => $input['email']
  // ... other fields
]);

echo json_encode(['status' => 'success']);