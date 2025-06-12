<?php
session_start();
require_once '../PHP/config/db.php'; // siin tee kindlaks, et ühendus töötab

if (!isset($_SESSION['user_id'])) {
  header("Location: log-in.php");
  exit();
}

$klient_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT tellimus_id, kuupaev, lopetatud FROM tellimused WHERE klient_id = ? ORDER BY kuupaev DESC");
$query->bind_param("i", $klient_id);
$query->execute();
$result = $query->get_result();

$orders = [];
while ($row = $result->fetch_assoc()) {
  $orders[] = $row;
}