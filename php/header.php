<?php session_start();?>

<header>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Login System</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php
        // SWITCH NAV LINKS IF LOGGED IN
        if (isset($_SESSION['username'])) {
          echo " <li class=\"nav-item\">
          <div class=\"nav-link\">connecté : ".$_SESSION['username']."</div>
          
        </li>";
        echo "
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"/php_login-system/php/includes/deconnexion-inc.php\"
            >Se déconnecter</a
          >
        </li>";
        } else {
          echo "<li class=\"nav-item\">
          <a class=\"nav-link\" href=\"/php_login-system/index.php\"
            >Se connecter</a
          >
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"/php_login-system/php/inscription.php\"
            >S'inscrire</a
          >
        </li>";
        }
        ?>
    
      </ul>
    </div>
  </div>
</nav>
</header>