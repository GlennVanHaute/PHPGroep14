
<nav class="navbar navbar-fixed-top">
      <ul class="nav nav-justified">
     <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?>><a href="index.php">HOME</a></li>
     <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?>><a href="menuFrontend.php">MENU</a></li>
     <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?>><a href="tafels.php">RESERVEREN</a></li>
     <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?> class="visibleeuh <?php  if(isset($_SESSION['admin']) == true) {echo block;}?>"><a href="tafelbeheer.php">MENU BEHEER</a></li>
     <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?> class="visibleeuh <?php  if(isset($_SESSION['admin']) == true) {echo block;}?>"><a href="tafelbeheer.php">TAFEL BEHEER</a></li>
     <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?> class="visibleeuh <?php  if(isset($_SESSION['admin']) == true) {echo block;}?>"><a href="overzicht_reservatie.php">RESERVATIE BEHEER</a></li>
     <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?>class="nav-divider"></li>
     <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?>><a href="logout.php"><i class="glyphicon glyphicon-off"></i>Afmelden</a></li>
     <div class="row"><div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true"></div></div>

      </ul>
 </nav>
