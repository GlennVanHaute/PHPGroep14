<?php 
	include_once('classes/db.php');
	include_once("classes/nieuwMenu.class.php");

	$nieuwMenu = new nieuwMenu();

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
	<title>Menu</title>
</head>
<body>
	<h1>Nieuw gerecht aanmaken</h1>

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
	
	<!-- <a href="menuAanmaken.php">Nieuw gerecht aanmaken</a>
	<h1>Gerechten bewerken</h1>
	<form>
		<select>
  		<option value="kiesMenu">Kies gerecht</option> -->
  		<?php 
  // 		$res = $nieuwMenu->getAll();

		// while($lijstmenu = $res->fetch_assoc())
		// {
		// 	echo "<option name='".$lijstmenu['id']."'>";
		// 	echo $lijstmenu['Naam'];
		// 	echo "</option>";
		// }
	
  		 ?>
  		 <!-- </select>
  	<input id="btnMenuBewerk" type="submit" value="Dit gerecht bewerken" />
	</form> -->

	

		
</body>
</html>