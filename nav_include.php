<section class="slicknav_menu">
    <ul id="menu">
    <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?> ><a href="index.php">HOME</a></li>
    <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?>><a href="menuFrontend.php">MENU</a></li>
    <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?>><a href="tafels.php">RESERVEREN</a></li>
    <li<?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?> class="visibleeuh <?php  if(isset($_SESSION['admin']) == true) {echo block;}?>"><a href="tafelbeheer.php">TAFEL BEHEER</a></li>
    <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?> class="visibleeuh <?php  if(isset($_SESSION['admin']) == true) {echo block;}?>"><a href="menu.php">MENU BEHEER</a></li>
    <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class="current"';?> class="visibleeuh <?php  if(isset($_SESSION['admin']) == true) {echo block;}?>"><a href="overzicht_reservatie.php">RESERVATIE BEHEER</a></li>
    </ul>
</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>

<script src="js/jquery.slicknav.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#menu').slicknav();
});
</script>