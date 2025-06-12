<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $stmt = $conn->prepare("INSERT INTO kliendid (
    eesnimi, perenimi, email, parool, telefon,
    ettevote, reg_nr, kmkr_nr, tanav, maja_nr,
    korter_nr, linn, postiindeks, maakond
  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $stmt->bind_param("ssssssssssssss",
    $_POST["eesnimi"], $_POST["perenimi"], $_POST["email"], $_POST["parool"],
    $_POST["telefon"], $_POST["ettevote"], $_POST["reg_nr"], $_POST["kmkr_nr"],
    $_POST["tanav"], $_POST["maja_nr"], $_POST["korter_nr"],
    $_POST["linn"], $_POST["postiindeks"], $_POST["maakond"]
  );

  if ($stmt->execute()) {
    echo "Konto loodud!";
  } else {
    echo "Viga: " . $stmt->error;
  }
}
?>