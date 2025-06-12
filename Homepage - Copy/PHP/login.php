<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email']);
  $parool = $_POST['parool'];

  if (empty($email) || empty($parool)) {
    $_SESSION['error'] = "Palun täida kõik väljad.";
    header("Location: ../HTML/log-in.php");
    exit;
  }

  $stmt = $conn->prepare("SELECT klient_id, email, parool FROM kliendid WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $kasutaja = $result->fetch_assoc();

    if (password_verify($parool, $kasutaja['parool'])) {
      // ✅ Salvesta kasutaja sessioon
      $_SESSION['kasutaja_id'] = $kasutaja['klient_id'];
      $_SESSION['email'] = $kasutaja['email'];

      // ✅ Suuna pealehele
      header("Location: ../HTML/index.php");
      exit;
    } else {
      $_SESSION['error'] = "Vale parool.";
      header("Location: ../HTML/log-in.php");
      exit;
    }
  } else {
    $_SESSION['error'] = "Sellise e-mailiga kasutajat ei leitud.";
    header("Location: ../HTML/log-in.php");
    exit;
  }
}
