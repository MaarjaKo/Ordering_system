<!DOCTYPE html>
<html lang="et">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minu konto</title>
  <link rel="stylesheet" href="../CSS/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <?php include '../PHP/partials/header.php'; ?>

  <div class="main-container">
    <main class="orders-section">
      <div class="account-container">
        <h1 style=font-weight:normal;>Minu konto</h1>
        <ul class="account-links">
          <li><a href="account.php">Minu konto</a></li>
          <li><a href="orders.php">Tellimused</a></li>
          <li><a href="#">Aadress</a></li>
          <li><a href="#">Konto andmed</a></li>
        </ul>
      </div>

    </main>
  </div>

  <?php include '../PHP/partials/footer.php'; ?>
  <script src="../JavaScript/main.js"></script>
</body>

</html>