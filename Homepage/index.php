<?php
session_start();

// Kontroll, kas kasutaja on sisse logitud
if (!isset($_SESSION['email'])) {
  header("Location: log-in.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="et">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Avaleht</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <?php include 'PHP/partials/header.php'; ?>

  <section class="hero">
    <div class="overlay">
      <h1>Lorem ipsum eleifend</h1>
      <p>Lorem ipsum dolor sit amet consectetur. Aliquam enim mauris est suspendisse ultricies hendrerit sapien quisque
        nunc.
        Fusce odio arcu blandit purus. Feugiat rhoncus sed consectetur proin ut sed metus. </p>
      <a href="#" class="cta-btn">OSTA SIIT</a>
    </div>
  </section>

  <?php include 'PHP/partials/footer.php'; ?>
  <script src="JavaScript/main.js"></script>

</body>

</html>