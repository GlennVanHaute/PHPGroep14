<?php 
			include_once('classes/db.class.php');
			include_once("classes/aanmaakblokje.class.php");
			
			$aanmaak = new Aanmaak();
		if(!empty($_POST['btnRestAanmaken']))
		{
				$aanmaak->Naam = $_POST['naam_restaurant'];
				$aanmaak->Adres = $_POST['adres'];
				$aanmaak->Postcode = $_POST['postcode'];
				$aanmaak->Gemeente = $_POST['gemeente'];
				$aanmaak->Emailadres= $_POST['email'];
				$aanmaak->Telefoonnummer = $_POST['tel'];
				$aanmaak->Faxnummer = $_POST['fax'];
				$aanmaak->BTWnummer = $_POST['btw'];
				$aanmaak->Aanmaken();
		}
		if(!empty($_POST['btn_delete']))
		{
			try
			{	
				$aanmaak->id = $_POST['restoid'];
				$aanmaak->Delete();
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
				$aanmaak->id = $_POST['restoid'];
				$aanmaak->Naam = $_POST['restonaam'];
				$aanmaak->Adres = $_POST['restoadres'];
				$aanmaak->Postcode = $_POST['restopostcode'];
				$aanmaak->Gemeente = $_POST['restogemeente'];
				$aanmaak->Emailadres= $_POST['restoemailadres'];
				$aanmaak->Telefoonnummer = $_POST['restotel'];
				$aanmaak->Faxnummer = $_POST['restofax'];
				$aanmaak->BTWnummer = $_POST['restobtw'];
				$aanmaak->Update();

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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<title>Aanmaak restaurants</title>
	
	
</head>
<body>
			
			    <h2>Maak hier een restaurant aan</h2>
<div class="container-fluid">

	<div class="row">
		<div class="col-xs-12 col-md-12">
			<form role="form" action="" class="omkadering" method="post">
			  <div class="form-group">
				
			    <input type="text" class="form-control" name="naam_restaurant" placeholder="naam restaurant"/>
				<input type="text" class="form-control" name="adres" placeholder="adres"/>
				<input type="text" class="form-control" name="postcode" placeholder="postcode"/>
				<input type="text" class="form-control" name="gemeente" placeholder="gemeente"/>
				<input type="email" class="form-control" name="email" id="datepicker" placeholder="email"/>
				<input type="tel" class="form-control" name="tel" placeholder="telephone nummer"/>
				<input type="text" class="form-control" name="fax" placeholder="fax nummer"/>
				<input type="text" class="form-control" name="btw" placeholder="btw nummer"/>
				
			  </div>

			  <button type="submit" class="btn btn-lg btn-default" id="button" value="post" name="btnRestAanmaken">Slaag je gegevens op</button>
			</form>
			
			<h1>Huidige resto's</h1>
			<?php 
  		$res = $aanmaak->getAll();

  		echo "<ul>";
		while($lijstrestos = $res->fetch_assoc())
		{
			echo "<form class='omkadering' action='' method='post'>";
			echo "<li>";
			echo "<input type='hidden' name='restoid' value='".$lijstrestos['id']."'/>";
			echo "<label for='restonaam'>Naam: </label>";
			echo "<input type='text' name='restonaam' value='".$lijstrestos['Naam']."'/>";
			echo "<br/>";
			echo "<label for='restoadres'>Adres: </label>";
			echo "<input type='text' name='restoadres' value='".$lijstrestos['Adres']."'/>";
			echo "<br/>";
			echo "<label for='restopostcode'>Postcode: </label>";
			echo "<input type='text' name='restopostcode' value='".$lijstrestos['Postcode']."'/>";
			echo "<br/>";
			echo "<label for='restogemeente'>Gemeente: </label>";
			echo "<input type='text' name='restogemeente' value='".$lijstrestos['Gemeente']."'/>";
			echo "<br/>";
			echo "<label for='restoemailadres'>Emailadres: </label>";
			echo "<input type='text' name='restoemailadres' value='".$lijstrestos['Emailadres']."'/>";
			echo "<br/>";
			echo "<label for='restotel'>Telefoonnummer: </label>";
			echo "<input type='text' name='restotel' value='".$lijstrestos['Telefoonnummer']."'/>";
			echo "<br/>";
			echo "<label for='restofax'>Faxnummer: </label>";
			echo "<input type='text' name='restofax' value='".$lijstrestos['Faxnummer']."'/>";
			echo "<br/>";
			echo "<label for='restobtw'>BTWnummer: </label>";
			echo "<input type='text' name='restobtw' value='".$lijstrestos['BTWnummer']."'/>";
			echo "</li>";
			echo "<input type='submit' name='btn_edit' value='bewerken' />";
			echo "<input type='submit' name='btn_delete' value='verwijderen' />";

			echo "</form>";
		}
		echo "</ul>";
	?>	
		</div>
	</div>

			
	
	
	
</div>
</body>
</html>