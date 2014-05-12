<?php
	
	include_once("classes/db.class.php");
	include_once("classes/reservatie.class.php");
	include_once("classes/Tafel.class.php");

	$db = new Database();
	$Tafel = new Tafel();
	$Reservatie = new Reservatie();

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Overzicht reservaties</title>
</head>
<body>
	<?php 
	
	include_once('classes/db.class.php');
	include_once('classes/Tafel.class.php');
	include_once('classes/reservatie.class.php');

	$db = new Database();
	$Reservatie = new Reservatie();
	$Tafel = new Tafel();

	if (!empty($_POST['submitknop'])) 
	{
		$aantal = $_POST['aantal'];
		$Reservatie->Datum = $_POST['datum'];
		$Reservatie->Uur = $_POST['uur'];
			
		$resultDatum = $Reservatie->CheckDatum();

		$Tafel->personen = $_POST['aantal'];
		$resultTafel = $Tafel->CheckAantal();
		$resultTafelHoger = $Tafel->CheckAantalHoger();
	}
	

	if (!empty($_POST['ressubmit']))  
	{
		$Reservatie->Tafelnummer = $_POST['restafel'];
		$Reservatie->Datum = $_POST['resdatum'];
		$Reservatie->Uur = $_POST['resuur'];
		$resultReservatie = $Reservatie->Reserveer();
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Overzicht reservaties</title>
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slicknav.css">
</head>
<body>
	<?php include_once('nav_include.php') ?>


	<h1>RESERVATIE BEHEER</h1>
 	<img src="images/line.png" class="headerline" alt="line"/>

<section class="blok">

	<h2>Zoek hier naar beschikbare tafels:</h2>
	<form action="" method="post">

	<label for="datum">Datum:</label>
	<input type="date" for="datum" class="form-control" name="datum" required/>

	<label for="uur">Uur:</label>
	<input type="time" for="uur" class="form-control" name="uur"/>

	<select class="select" name="aantal">
	  <option selected disabled value="aantal personen">aantal personen</option>
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	  <option value="6">6</option>
	  <option value="7">7</option>
	  <option value="8">8</option>
	  <option value="9">9</option>
	  <option value="10">10</option>
	</select>

	<input type="submit"  class="btn btn-lg btn-default" name='submitknop' value="zoeken"/>

	</form>
	</div>
		</div>
</section>


	<?php 
	if (!empty($_POST['submitknop'])) 
	{
		echo "<section class='blok'>";
		echo "<h2> Reserveerbare tafels van " . $_POST['aantal'] . " personen op " . $_POST['datum'] . ":</h2>";

		
		if(mysqli_num_rows($resultTafel) ==0 )
		{
			echo "<p>Er zijn geen tafels voor " .$Tafel->personen. " personen. U kan wel meerdere kleine tafels reserveren.";
		}
		else if(mysqli_num_rows($resultTafel) == 0)
		{
			echo "<p> Er is geen tafel vrij voor exact " . $Tafel->personen . " personen.
			Kijk hieronder voor andere reserveerbare tafels voor meer dan " . $Tafel->personen . " personen</p>";
		}



		foreach ($resultTafel as $tafel) 
		{
			$resultDatum = $Reservatie->CheckDatum();

			if(mysqli_num_rows($resultDatum) == 0)
			{
				echo "<form method='post' action='' class='huidigeres'>";

			foreach ($resultTafel as $tafel) 
			{
				echo "<label><input type='radio' name='restafel' value=".$tafel['Tafelnummer'].">";
					
					echo " Tafel ".$tafel['Tafelnummer']."
						 </label> <p>Tafel voor ".$tafel['MaxPersonen']." personen";

					if(!empty($tafel['Opmerkingen']))
					{
						echo " <p>Opmerkingen: " . $tafel['Opmerkingen'] . "</p>";
					};

				echo "<input type='hidden' name='resdatum' value='" . $_POST['datum'] . "'/>";
				echo "<input type='hidden' name='resuur' value='" . $_POST['uur'] . "'/>";

			}
				
			}
				echo"<INPUT type='submit' class='btn btn-lg btn-default' name='ressubmit' id='reserveerprint' value='Deze tafel reserveren'/>";
		}
		


		
		if(mysqli_num_rows($resultTafelHoger) !=0)
		{
			echo "<h2 class='marginb'> Tafels die u ook kan reserveren:</h2>";

			echo "<form method='post' action='' class='huidigeres'>";

			foreach ($resultTafelHoger as $tafel) 
			{
				echo "<label><input type='radio' name='restafel' value=".$tafel['Tafelnummer'].">";
					
					echo " Tafel ".$tafel['Tafelnummer']."
						 </label> <p>Tafel voor ".$tafel['MaxPersonen']." personen</p>";

					if(!empty($tafel['Opmerkingen']))
					{
						echo " <p>Opmerkingen: " . $tafel['Opmerkingen'] . "</p>";
					};

				echo "<input type='hidden' name='resdatum' value='" . $_POST['datum'] . "'/>";
				echo "<input type='hidden' name='resuur' value='" . $_POST['uur'] . "'/>";

			}
	
			
			echo"<br/><INPUT type='submit' class='btn btn-lg btn-default' name='ressubmit' id='reserveerprint' value='Deze tafel reserveren'/>";
			
			
		}
		
	}
	 ?>

</section>

		<section class="blok">
	 	<h2>Overzicht gemaakte reservaties</h2>
	 	<ul id='overzicht'>

	 <?php 

		foreach ($result as $res) 
		{
			echo "<li class='col-xs-4 col-md-4'>";
			//echo '<p>' GLENN PRINT HIER NAAM GEBRUIKER AF '</p>';
			echo "<p> Tafel : " . $res['Tafelnummer']."</p>";
			echo "<p> Gereserveerd voor " .$res['Personen']." personen</p>";
			echo "<p> Datum : " .$res['Datum']."</p>";
			echo "<p> Uur : " .$res['Uur']."</p>";
			
			
			//$resultTafel = $Tafel->GetByTafelnr();
			
			echo "</li>";
		}
		echo "</ul>";
	  ?>

</section>

</body>
</html>















	