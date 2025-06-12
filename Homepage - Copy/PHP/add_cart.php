<?php
session_start();
include '../PHP/db.php'; // tee eraldi andmebaasi ühenduse fail

$klient_id = $_SESSION['klient_id'];
$toode_id = $_POST['id'];
$kogus = $_POST['qty'];

// Kontrolli kas toode juba ostukorvis
$stmt = $conn->prepare("SELECT * FROM ostukorv WHERE klient_id=? AND toode_id=?");
$stmt->bind_param("ii", $klient_id, $toode_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $stmt = $conn->prepare("UPDATE ostukorv SET kogus = kogus + ? WHERE klient_id = ? AND toode_id = ?");
  $stmt->bind_param("iii", $kogus, $klient_id, $toode_id);
} else {
  $stmt = $conn->prepare("INSERT INTO ostukorv (klient_id, toode_id, kogus) VALUES (?, ?, ?)");
  $stmt->bind_param("iii", $klient_id, $toode_id, $kogus);
}
$stmt->execute();
echo json_encode(['success' => true]);
