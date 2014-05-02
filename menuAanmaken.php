<?php 
	include_once('classes/db.php');
	include_once("classes/nieuwMenu.class.php");


	$nieuwMenu = new nieuwMenu();

	if(!empty($_POST))
	{
			$nieuwMenu->naam = $_POST['nieuwMenu'];
			$nieuwMenu->details = $_POST['nieuwMenuDetails'];
			$nieuwMenu->prijs = $_POST['nieuwMenuPrijs'];
			$nieuwMenu->Save();	
	}

 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu aanmaken</title>
</head>
<body>
	<a href="menu.php">Gerechten bewerken</a>
	<h1>Nieuwe gerechten</h1>

	<form action="" method="POST">

	<label for="nieuwMenu">Naam gerecht</label>
	<br/>
	<input type="text" id="nieuwMenu" name="nieuwMenu" />
	<br/>
	<label for="nieuwMenuDetails">Details</label>
	<br/>
	<input type="text" id="nieuwMenuDetails" name="nieuwMenuDetails" >
	<br/>
	<label for="nieuwMenuPrijs">Prijs</label>
	<br/>
	<input type="text" id="nieuwMenuPrijs" name="nieuwMenuPrijs" >
	<br/>
	<input id="btnMenuAanmaken" type="submit" value="Gerecht aanmaken" />

	</form>


	<h1>Huidige gerechten</h1>
	<?php 
  		$res = $nieuwMenu->getAll();

  		echo "<ul>";
		while($lijstmenu = $res->fetch_assoc())
		{
			echo "<li>";
			echo "<h2>" .$lijstmenu['Naam'] ."</h2>";
			echo "<p>" . $lijstmenu['Details'] . "</p>";
			echo "<p>" . "€ ".$lijstmenu['Prijs'] . "</p>";
			echo "</li>";
		}
		echo "</ul>";
	
  		 ?>
</body>
</html>