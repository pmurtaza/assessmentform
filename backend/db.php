<?php
$host = 'YOUR_RDS_ENDPOINT';
$db   = 'your_database';
$user = 'db_user';
$pass = 'db_pass';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
try {
  $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
  http_response_code(500);
  echo json_encode(['error' => 'DB Connection failed']);
  exit;
}