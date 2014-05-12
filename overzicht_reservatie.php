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
	
<<<<<<< HEAD
		$db = new Database();
		$sql = "select * from tblreservatie";
		$result = $db->conn->query($sql);
=======
	include_once('classes/db.class.php');
	include_once('classes/Tafel.class.php');
	include_once('classes/reservatie.class.php');
>>>>>>> 5826e1da08a0be8e80ad05dd0d2450b7ff7d40c5

	$db = new Database();
	$Reservatie = new Reservatie();
	$Tafel = new Tafel();

<<<<<<< HEAD
		echo "</li></li>";
		echo "<ul id='overzicht'>";
		echo "<h2>Overzicht reservaties</h2>";
		foreach ($result as $post) 
		{
			echo "<li class='col-xs-4 col-md-4'>";
			echo '<p>' .'Naam: ' . $post['Persoon'] . '</p>';
			echo '<p>' .'Aantal personen: ' . $post['Hoeveel'].'</p>';
			echo '<p>' .'Datum: '. $post['Datum'] . '</p>';
			echo '<p>' .'Tijdstip: '. $post['Tijdstip'] . '</p>';
			echo '<p>' .'Tafelnummer: ' . $post['Tafelnummer'] . '</p>';
			echo "</li>";
		}
		echo "</ul>";
=======
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
>>>>>>> 5826e1da08a0be8e80ad05dd0d2450b7ff7d40c5

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Overzicht reservaties</title>
</head>
<body>
	<?php include_once('nav_include.php') ?>


	<h1>RESERVATIES RESTAURANTHOUDER</h1>
	<p>Kijk hier of er beschikbare tafels zijn:</p>
	<div class="container-fluid">
	<div class="row">
	<div class="col-xs-12 col-md-12">
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

	<?php 
	if (!empty($_POST['submitknop'])) 
	{

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
				echo "<input type='radio' name='restafel' value=".$tafel['Tafelnummer'].">";

				echo "<div>";
					
					echo " Tafel ".$tafel['Tafelnummer']."
						 <span> voor </span>".$tafel['MaxPersonen']." <span> personen.</span>";

					if(!empty($tafel['Opmerkingen']))
					{
						echo " Opmerkingen: " . $tafel['Opmerkingen'];
					};

				echo "<input type='hidden' name='resdatum' value='" . $_POST['datum'] . "'/>";
				echo "<input type='hidden' name='resuur' value='" . $_POST['uur'] . "'/>";
				echo "</div>";
				echo "</br>";

			}
				
			}
		}

		
		if(mysqli_num_rows($resultTafelHoger) !=0)
		{
			echo "<h2> Tafels die u ook kan reserveren:</h2>";

			echo "<form method='post' action='' class='huidigeres'>";

			foreach ($resultTafelHoger as $tafel) 
			{
				echo "<input type='radio' name='restafel' value=".$tafel['Tafelnummer'].">";

				echo "<div>";
					
					echo " Tafel ".$tafel['Tafelnummer']."
						 <span> voor </span>".$tafel['MaxPersonen']." <span> personen.</span>";

					if(!empty($tafel['Opmerkingen']))
					{
						echo " Opmerkingen: " . $tafel['Opmerkingen'];
					};

				echo "<input type='hidden' name='resdatum' value='" . $_POST['datum'] . "'/>";
				echo "<input type='hidden' name='resuur' value='" . $_POST['uur'] . "'/>";
				echo "</div>";
				echo "</br>";

			}

			// foreach ($resultReservatie as $res) 
			// {
				// echo "<input type='input' name='resdatum' value='" . $_POST['datum'] . "'/>";
				// echo "<input type='input' name='resuur' value='" . $_POST['uur'] . "'/>";
				//echo "<p>".$res['Datum']." om ".$res['Uur']." uur.</p>";
				
			//}		
			
			echo"<INPUT type='submit' name='ressubmit' id='reserveerprint' value='Deze tafel reserveren'/>";
			echo "</form>";
			
		}
		
	}
	 ?>



	 <?php 
	 	$result = $Reservatie->GetAll();

		echo "<ul id='overzicht'>";
		echo "<h2>Overzicht reservaties</h2>";

		foreach ($result as $res) 
		{
			echo "<li class='col-xs-4 col-md-4'>";
			//echo '<p>' GLENN PRINT HIER NAAM GEBRUIKER AF '</p>';
			echo "<p> Tafel: " . $res['Tafelnummer']."</p>";
			echo "<p> Datum: " .$res['Datum']."</p>";
			echo "<p> Uur: " .$res['Uur']."</p>";
			
			$resultTafel = $Tafel->GetByTafelnr();
			
			echo "</li>";
		}
		echo "</ul>";
	  ?>
</body>
</html>















	
