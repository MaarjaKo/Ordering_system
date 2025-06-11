<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $stmt = $conn->prepare("SELECT * FROM kliendid WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($user = $result->fetch_assoc()) {
    if ($user["parool"] === $password) {
      $_SESSION["user_id"] = $user["klient_id"];
      $_SESSION["user_name"] = $user["eesnimi"];
      header("Location: ../HTML/index.php");
    } else {
      echo "Vale parool.";
    }
  } else {
    echo "Kasutajat ei leitud.";
  }
}
?>