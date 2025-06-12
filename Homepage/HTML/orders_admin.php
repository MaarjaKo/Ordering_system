<?php
session_start();
require_once("../PHP/db.php");

// Ainult adminile ligipääs
if (!isset($_SESSION["admin_id"])) {
  header("Location: admin_login.php");
  exit();
}

// Staatus uuendus
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["tellimus_id"], $_POST["staatus"])) {
  $tellimus_id = $_POST["tellimus_id"];
  $staatus = $_POST["staatus"];

  $stmt = $conn->prepare("UPDATE tellimused SET staatus = ? WHERE tellimus_id = ?");
  $stmt->bind_param("si", $staatus, $tellimus_id);
  $stmt->execute();
  $stmt->close();
}

// Kuvame kõik tellimused
$tulemused = $conn->query("
    SELECT t.tellimus_id, k.email, t.kuupaev, t.staatus 
    FROM tellimused t 
    JOIN kliendid k ON t.klient_id = k.klient_id
    ORDER BY t.kuupaev DESC
");
?>

<h2>Tellimuste haldus (admin)</h2>

<table border="1" cellpadding="5">
  <tr>
    <th>Tellimus</th>
    <th>Kasutaja</th>
    <th>Kuupäev</th>
    <th>Staatus</th>
    <th>Muuda</th>
  </tr>

  <?php while ($rida = $tulemused->fetch_assoc()): ?>
  <tr>
    <td>#<?= $rida["tellimus_id"] ?></td>
    <td><?= htmlspecialchars($rida["email"]) ?></td>
    <td><?= $rida["kuupaev"] ?></td>
    <td><?= $rida["staatus"] ?></td>
    <td>
      <form method="POST">
        <input type="hidden" name="tellimus_id" value="<?= $rida["tellimus_id"] ?>">
        <select name="staatus">
          <option value="ootab">ootab</option>
          <option value="töötlemisel">töötlemisel</option>
          <option value="teele pandud">teele pandud</option>
        </select>
        <button type="submit">Uuenda</button>
      </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>