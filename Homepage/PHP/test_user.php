<?php
require_once 'db.php';

$email = 'test@test.ee';
$parool = password_hash('test123', PASSWORD_DEFAULT);

// Eemaldame vana (kui olemas)
$conn->query("DELETE FROM kliendid WHERE email = '$email'");

$sql = "INSERT INTO kliendid (email, parool) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $parool);

if ($stmt->execute()) {
  echo "Testkasutaja loodud: $email / test123";
} else {
  echo "Kasutajat ei saanud lisada.";
}