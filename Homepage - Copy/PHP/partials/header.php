<header class="header">
  <div class="menu-wrapper">
    <div class="menu-icon" aria-label="Menüü">
      <i class="fas fa-bars"></i>
    </div>
    <ul class="dropdown-menu">
      <li><a href="../HTML/tellimus.php">Tellimine</a></li>
      <li><a href="../HTML/orders.php">Minu tellimused</a></li>
      <li><a href="../HTML/cart.php">Ostukorv</a></li>
      <li><a href="../HTML/log-in.php">Logi välja</a></li>
    </ul>
  </div>

  <a href="../HTML/index.php" aria-label="Pealeht">
    <img src="../images/logo.svg" alt="Ettevõtte logo" style="height: 30px;" /></i>
  </a>

  <div class="icons">
    <span class="search-container">
      <i class="fas fa-search" id="search-icon" aria-label="Otsi"></i>
      <form class="search-dropdown" id="search-box" onsubmit="return false;">
        <input type="text" placeholder="Otsi toodet..." />
        <button type="submit"><i class="fas fa-arrow-right"></i></button>
      </form>
    </span>

    <span class="cart-container">
      <i class="fas fa-shopping-cart" id="cart-icon" aria-label="Ostukorv"></i>
      <div class="cart-dropdown" id="cart-dropdown">
        <p>Toode: Näidis toode</p>
        <p>Kogus: 2 tk</p>
        <p>Summa: €38.00</p>
        <button onclick="window.location.href='../HTML/cart.php'">Mine maksma</button>
      </div>
    </span>
    <a href="../HTML/account.php" aria-label="Konto">
      <i class="fas fa-user" aria-hidden="true"></i>
    </a>
    <span id="cart-summary">€ 0.00 | 0 toodet</span>
  </div>
</header>