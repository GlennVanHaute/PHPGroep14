<?php 
	include_once('classes/db.class.php');
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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slicknav.css">
	<script type="text/javascript">
	$(document).ready(function(){
		$("#nieuwMenu").on('keyup', function(){

			var gerecht = $("#nieuwMenu").val();
			console.log(gerecht);

			$.ajax
				({
				  type: "POST",
				  url: "ajax/ajax.menu.php",
				  data: { nieuwMenu: gerecht }
				})
				.done(function(result) 
				{
					console.log(result);
					if(result == 'false')
					{
						$(".status").show('slow');
						$(".status").html("<p>Dit gerecht bestaat al!</p>");
					}
					else
					{
						$(".status").hide('slow');
					}
					
			    });

			return(false);
		});
	});

	</script>
	<title>Menu</title>
</head>
<body>

	<?php include_once('nav_include.php') ?>

	<section id="wrapper">

	<h1> MENU </h1>
	<img src="images/line.png" class="headerline" alt="line"/>

	<section class="blok">
	<h2>Nieuw gerecht aanmaken</h1>

	<div class="status"></div>

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
	<input name="btnMenuAanmaken" class='btn btn-lg btn-default' type="submit" value="Gerecht aanmaken" />

	</form>
</section>
<section class="blok">

	<h2>Huidige gerechten</h1>
	<?php 
  		$res = $nieuwMenu->getAll();

  		echo "<ul>";
		while($lijstmenu = $res->fetch_assoc())
		{
			echo "<form action='' method='post'>";
			echo "<h3>" . $lijstmenu['Naam'] . "</h3>";
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
			echo "<input type='submit' class='btn btn-lg btn-default' name='btn_edit' value='bewerken' />";
			echo "<input type='submit' class='btn btn-lg btn-default' name='btn_delete' value='verwijderen' />";

			echo "</form>";
		}
		echo "</ul>";
	?>	
	
	
</section>
</section>		
</body>
</html>