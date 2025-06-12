<?php
session_start();
require_once '../config/db.php'; // tee kindlaks, et siin on mysqli ühendus

header('Content-Type: application/json');

// Kontrolli, kas kasutaja on sisse logitud
if (!isset($_SESSION['user_id'])) {
  echo json_encode(['success' => false, 'message' => 'Kasutaja pole sisse logitud']);
  exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$items = $data['items'];
$klient_id = $_SESSION['user_id'];

// 1. Salvesta tellimus
$stmt = $conn->prepare("INSERT INTO tellimused (klient_id) VALUES (?)");
$stmt->bind_param("i", $klient_id);
$stmt->execute();
$tellimus_id = $stmt->insert_id;
$stmt->close();

// 2. Salvesta iga tellimuse rida
$stmt = $conn->prepare("INSERT INTO tellimuse_read (tellimus_id, tootekood, kogus, hind) VALUES (?, ?, ?, ?)");

foreach ($items as $item) {
  $stmt->bind_param("iiid", $tellimus_id, $item['product_id'], $item['quantity'], $item['price']);
  $stmt->execute();
}

$stmt->close();
$conn->close();

echo json_encode(['success' => true]);
