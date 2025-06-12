<?php
session_start();
require_once("../PHP/db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $kasutajanimi = $_POST["kasutajanimi"];
  $parool = $_POST["parool"];

  $stmt = $conn->prepare("SELECT id, parool FROM adminid WHERE kasutajanimi = ?");
  $stmt->bind_param("s", $kasutajanimi);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows === 1) {
    $stmt->bind_result($id, $hashed_parool);
    $stmt->fetch();

    if (password_verify($parool, $hashed_parool)) {
      $_SESSION["admin_id"] = $id;
      header("Location: orders_admin.php");
      exit();
    } else {
      $error = "Vale parool!";
    }
  } else {
    $error = "Admini ei leitud!";
  }

  $stmt->close();
}
?>

<form method="POST" action="">
  <input type="text" name="kasutajanimi" required placeholder="Admini kasutajanimi">
  <input type="password" name="parool" required placeholder="Parool">
  <button type="submit">Logi sisse</button>
</form>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>