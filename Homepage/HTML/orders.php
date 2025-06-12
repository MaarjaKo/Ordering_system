<?php
session_start();
require_once('../PHP/db.php');

if (!isset($_SESSION['kasutaja_id'])) {
  header("Location: log-in.php");
  exit();
}

$klient_id = $_SESSION['kasutaja_id'];
$query = $conn->prepare("SELECT tellimus_id, kuupaev, lopetatud FROM tellimused WHERE klient_id = ? ORDER BY kuupaev DESC");
$query->bind_param("i", $klient_id);
$query->execute();
$result = $query->get_result();

$orders = [];
while ($row = $result->fetch_assoc()) {
  $orders[] = $row;
}
?>

<!DOCTYPE html>
<html lang="et">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Minu tellimused</title>
  <link rel="stylesheet" href="../CSS/style.css" />
  <link rel="stylesheet" href="../CSS/orders.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <?php include '../PHP/partials/header.php'; ?>

  <main class="orders-section">
    <h1>Minu tellimused</h1>
    <div class="table-wrapper">
      <table class="orders-table">
        <thead>
          <tr>
            <th>Tellimuse nr.</th>
            <th>Kuupäev</th>
            <th>Staatus</th>
            <th>Kokku</th>
            <th>Lisa</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $order): ?>
          <tr>
            <td class="order-number">#<?= htmlspecialchars($order['tellimus_id']) ?></td>
            <td><?= date("d.m.Y", strtotime($order['kuupaev'])) ?></td>
            <td><?= $order['lopetatud'] ? "Lõpetatud" : "Täitmisel" ?></td>

            <?php
              $sum_query = $conn->prepare("
                SELECT SUM(kogus * hind) AS kokku
                FROM tellimuse_read
                WHERE tellimus_id = ?
              ");
              $sum_query->bind_param("i", $order['tellimus_id']);
              $sum_query->execute();
              $sum_result = $sum_query->get_result()->fetch_assoc();
              $kokku = number_format($sum_result['kokku'], 2, ',', ' ');
              ?>

            <td>€ <?= $kokku ?></td>
            <td>
              <button class="pdf-btn">PDF</button>
              <button class="track-btn">SAADETISE JÄLGIMINE</button>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>

  <?php include '../PHP/partials/footer.php'; ?>
</body>

</html>