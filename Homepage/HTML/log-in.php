<?php
// Alustame sessiooniga ENNE HTML-i
session_start();
?>

<!DOCTYPE html>
<html lang="et">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Logi sisse</title>
  <link rel="stylesheet" href="../CSS/log-in.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

  <div class="login-container">

    <div class="login-form">
      <img src="../images/logo.svg" alt="Logo" class="logo">
      <h2>Logi sisse</h2>
      <p>või <a href="../HTML/register.php">loo konto siin!</a></p>

      <?php
      if (isset($_SESSION['error'])) {
        echo '<div class="error-msg">' . htmlspecialchars($_SESSION['error']) . '</div>';
        unset($_SESSION['error']);
      }
      ?>
      <form method="POST" action="../PHP/login.php">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>

        <div class="helper-row">
          <a href="#" class="helper-link">Unustasid e-maili?</a>
        </div>

        <label for="parool">Parool</label>
        <div class="password-wrapper" style="position: relative;">
          <input type="password" id="parool" name="parool" required>
          <i id="toggleEye" class="fa-solid fa-eye eye-icon"></i>
        </div>

        <div class="options">
          <label>
            <input type="checkbox" name="remember_me"> Pea mind meeles
          </label>
          <a href="#" class="helper-link">Unustasid parooli?</a>
        </div>

        <button type="submit" class="login-btn">LOGI SISSE</button>
      </form>
    </div>

    <div class="login-image">
      <img src="../images/login.png" alt="Toote pilt">
    </div>

  </div>

  <!-- Parooli nähtavaks tegemise skript -->
  <script>
  const pw = document.getElementById("parool");
  const eye = document.getElementById("toggleEye");

  eye.addEventListener("click", () => {
    const isVisible = pw.type === "text";
    pw.type = isVisible ? "password" : "text";
    eye.classList.toggle("active", !isVisible);
    eye.classList.toggle("fa-eye", isVisible);
    eye.classList.toggle("fa-eye-slash", !isVisible);
  });
  </script>

</body>

</html>