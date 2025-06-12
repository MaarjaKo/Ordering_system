<!DOCTYPE html>
<html lang="et">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ostukorv</title>
  <link rel="stylesheet" href="../CSS/style.css" />
  <link rel="stylesheet" href="../CSS/cart.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <?php include '../PHP/partials/header.php'; ?>

  <main class="cart-wrapper">
    <section class="cart-left">
      <h2>Ostukorv</h2>

      <div class="cart-item">
        <img src="../images/product1.png" alt="Toote pilt">

        <div class="cart-item-info">
          <p>Lorem ipsum malesuada</p>
          <div class="quantity-control">
            <span>Kogus</span>
            <button type="button">-</button>
            <input type="number" value="3" readonly>
            <button type="button">+</button>
          </div>
        </div>

        <div class="cart-item-price">€ 130,04</div>
        <button type="button" class="cart-item-remove">×</button>
      </div>

      <button type="button" class="update-btn">Uuenda</button>
    </section>

    <section class="cart-summary">
      <h2>Tellimuse kokkuvõte</h2>

      <div class="summary-line">
        <span>Vahe­s summa</span><span>€ 130,04</span>
      </div>
      <div class="summary-line">
        <span>Kokku ilma km</span><span>€ 106,59</span>
      </div>
      <div class="summary-line">
        <span>Käibemaks</span><span>€ 23,45</span>
      </div>

      <label for="coupon">Kupongi või kinkekaardi number:</label>
      <div class="coupon-row">
        <input type="text" id="coupon" placeholder="Sooduskood">
        <button type="button" class="apply-btn">Rakenda</button>
      </div>

      <div class="summary-total">
        <span>Kokku</span><span>€ 130.04</span>
      </div>

      <button type="button" class="pay-btn">MINE MAKSMА</button>
    </section>
  </main>

  <?php include '../PHP/partials/footer.php'; ?>
</body>

</html>