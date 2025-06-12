<!DOCTYPE html>
<html lang="et">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tellimusvorm</title>
  <link rel="stylesheet" href="../CSS/style.css">
  <script defer src="../JavaScript/tellimus.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <?php include '../PHP/partials/header.php'; ?>

  <main class="main-container">
    <h1>Tellimusvorm</h1>

    <div class="filter-bar">
      <button class="filter-btn"><i class="fas fa-sliders-h"></i> Filtreeri</button>
      <input type="text" id="search" placeholder="Otsi toodet..." aria-label="Otsi toodet">
      <div class="cart-summary-box">
        <i class="fas fa-shopping-cart"></i>
        <span id="cart-summary">€ 0.00 <small>0 toodet</small></span>
      </div>
    </div>

    <table class="product-table">
      <thead>
        <tr>
          <th>Pilt</th>
          <th>Kood</th>
          <th>Nimetus</th>
          <th>Maht(ml)</th>
          <th>Hind km-ta</th>
          <th>Hind km-ga</th>
          <th>Tellimus</th>
        </tr>
      </thead>
      <tbody id="product-body">
        <!-- Tooteread lisatakse JS abil -->
      </tbody>
    </table>

    <p class="scroll-top">Tagasi üles ↑</p>
  </main>

  <?php include '../PHP/partials/footer.php'; ?>
  <script src="../JavaScript/main.js"></script>
</body>

</html>