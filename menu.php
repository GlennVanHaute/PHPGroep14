<?php 
	include_once('classes/db.php');
	include_once("classes/nieuwMenu.class.php");

	$nieuwMenu = new nieuwMenu();

	if(!empty($_POST['btnMenuAanmaken']))
	{
			$nieuwMenu->naam = $_POST['nieuwMenu'];
			$nieuwMenu->details = $_POST['nieuwMenuDetails'];
			$nieuwMenu->prijs = $_POST['nieuwMenuPrijs'];
			$nieuwMenu->Save();	
	}

	if(!empty($_POST['btn_delete']))
	{
		try
		{	
			$nieuwMenu->id = $_POST['gerechtid'];
			$nieuwMenu->Delete();
		}
	
		catch (Exception $e) 
		{
			$feedback = $e->getMessage();
		}

	}

	if(!empty($_POST['btn_edit']))
	{
		try
		{	
			$nieuwMenu->id = $_POST['gerechtid'];
			$nieuwMenu->naam = $_POST['gerechtnaam'];
			$nieuwMenu->details = $_POST['gerechtdetails'];
			$nieuwMenu->prijs = $_POST['gerechtprijs'];
			$nieuwMenu->Update();

		}

		catch (Exception $e) 
		{
			$feedback = $e->getMessage();
		}


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
	<input name="btnMenuAanmaken" type="submit" value="Gerecht aanmaken" />

	</form>


	<h1>Huidige gerechten</h1>
	<?php 
  		$res = $nieuwMenu->getAll();

  		echo "<ul>";
		while($lijstmenu = $res->fetch_assoc())
		{
			echo "<form action='' method='post'>";

			echo "<li>";
			echo "<input type='hidden' name='gerechtid' value='".$lijstmenu['id']."'/>";
			echo "<label for='gerechtnaam'>Naam: </label>";
			echo "<input type='text' name='gerechtnaam' value='".$lijstmenu['Naam']."'/>";
			echo "<br/>";
			echo "<label for='gerechtdetails'>Details: </label>";
			echo "<input type='text' name='gerechtdetails' value='".$lijstmenu['Details']."'/>";
			echo "<br/>";
			echo "<label for='gerechtprijs'>Prijs: </label>";
			echo "<input type='text' name='gerechtprijs' value='".$lijstmenu['Prijs']."'/>";
			echo "</li>";
			echo "<input type='submit' name='btn_edit' value='bewerken' />";
			echo "<input type='submit' name='btn_delete' value='verwijderen' />";

			echo "</form>";
		}
		echo "</ul>";
	?>	
	
	

		
</body>
</html>