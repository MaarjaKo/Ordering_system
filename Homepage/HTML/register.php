<!DOCTYPE html>
<html lang="et">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registreeru</title>
  <link rel="stylesheet" href="../CSS/style.css" />
  <link rel="stylesheet" href="../CSS/register.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <?php include '../PHP/partials/header.php'; ?>
  <div class="register-container">
    <h1>Registreeru kasutajaks</h1>
    <form action="../PHP/register.php" method="POST" id="register-form">
      <input type="text" name="eesnimi" placeholder="Eesnimi" required />
      <input type="text" name="perenimi" placeholder="Perekonnanimi" required />
      <input type="email" name="email" placeholder="E-mail" required />
      <input type="tel" name="telefon" placeholder="Telefon" required />
      <input type="password" name="parool" placeholder="Parool" required />
      <input type="text" name="ettevote" placeholder="Ettevõtte nimi" required />
      <input type="text" name="reg_nr" placeholder="Registrikood" required />
      <input type="text" name="kmkr_nr" placeholder="KMKR number" />

      <input type="text" name="aadress_et" placeholder="Arve aadress (Tänav, linn, postiindeks, maakond)" required />

      <label class="checkbox">
        <input type="checkbox" id="copyAddress" />
        Tarneaadress sama mis arve aadress
      </label>

      <input type="text" name="aadress_tarne" id="aadress_tarne" placeholder="Tarneaadress" required />
      <input type="text" name="postiindeks" placeholder="Postiindeks" required />
      <input type="text" name="maakond" placeholder="Maakond" required />

      <label class="checkbox">
        <input type="checkbox" name="noustunud" required />
        Olen nõus kasutustingimustega
      </label>

      <label class="checkbox">
        <input type="checkbox" name="uudiskiri" />
        Soovin saada uudiskirja
      </label>

      <button type="submit">REGISTREERU</button>
    </form>
  </div>

  <?php include '../PHP/partials/footer.php'; ?>
  <script src="../JavaScript/main.js" defer></script>
</body>

</html>