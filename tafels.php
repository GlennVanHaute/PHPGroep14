<?php

	include_once('classes/db.php');
	include_once('classes/Tafel.class.php');
	include_once('classes/reservatie.class.php');

	$db = new Db();
	$Reservatie = new Reservatie();
	$Tafel = new Tafel();

	if (!empty($_POST)) 
	{
		$aantal = $_POST['aantal'];
		$datum = $_POST['datum'];
		$startuur = $_POST['uur'];

		$Tafel->personen = $_POST['aantal'];
		$resultTafel = $Tafel->CheckAantal();

		$Tafel->personen = $_POST['aantal'];
		$resultTafelHoger = $Tafel->CheckAantalHoger($aantal);

	}

	if (!empty($_POST['ressubmit'])) 
	{
		$Reservatie->Tafelnummer = $_POST['restafel'];
		$Reservatie->Datum = $_POST['resdatum'];
		$Reservatie->Beginuur = $_POST['resuur'];
		$Reservatie->Einduur = $_POST['resuur'];

		$Reservatie->Reserveer();


	}

?>

<!doctype html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<title>Reservatie</title>
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#resbevtitel").hide();

			$("#reserveerprint").on('click', function(){
				$("#resbevtitel").show('slow');
				$("#resbevtitel").html('<h2>Deze reservatie was succesvol:</h2>');

				var text = $(this).prev().text();
				$("#resbev").text(text);

				$("#reserveer").hide('slow');
			});
		});
	</script>-->
</head>
<body>

<?php include_once('classes/nav_include.php') ?>


<h1>RESERVATIE</h1>
<p>Kijk hier of er beschikbare tafels zijn:</p>

<form action="" method="post">

<label for="datum">Datum:</label>
<input type="date" for="datum>" name="datum"/>

<label for="uur">Uur:</label>
<input type="time" for="uur>" name="uur"/>

<label for="aantal">Aantal personen:</label>
<select name="aantal">
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

<input type="submit"  name='submitknop' value="zoeken"/>

</form>

<section id='reserveer'>
<?php 
	if (!empty($_POST['submitknop'])) 
	{

		echo "<h2> Reserveerbare tafels van " . $_POST['aantal'] . " personen op " . $_POST['datum'] . ":</h2>";

		
		if(mysqli_num_rows($resultTafel) ==0 )
			//&& mysqli_num_rows($check2)== 0
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
				echo" <span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
					  Maximum aantal personen: " . $tafel['MaxPersonen'] . "
					  Opmerkingen: " . $tafel['Opmerkingen'];
				echo "</li>";
				echo "<input type='hidden' name='restafel' value='" . $tafel['Tafelnummer'] . "'/>";
				echo "<input type='hidden' name='resdatum' value='" . $datum . "'/>";
				echo "<input type='hidden' name='resuur' value='" . $startuur . "'/>";
				echo"<INPUT type='submit' name='ressubmit' id='reserveerprint' value='Deze tafel reserveren'/>";
				echo "</form>";
				
			}
		}

		
		if(mysqli_num_rows($resultTafelHoger) != 0)
		{
			echo "<h2> Tafels die u ook kan reserveren:</h2>";

			foreach ($resultTafel as $tafel) 
			{
				$resultDatum = $Reservatie->CheckDatum();

				if(mysqli_num_rows($resultDatum) == 0)
				{
					$rtafel = $tafel['Tafelnummer'];

					echo "<form method='post' action='' class='huidigeres'>";
				echo" <span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
					  Maximum aantal personen: " . $tafel['MaxPersonen'] . "
					  Opmerkingen: " . $tafel['Opmerkingen'];
				echo "</li>";
				echo "<input type='hidden' name='restafel' value='" . $tafel . "'/>";
				echo "<input type='hidden' name='resdatum' value='" . $datum . "'/>";
				echo "<input type='hidden' name='resuur' value='" . $startuur . "'/>";
				echo"<INPUT type='submit' name='ressubmit' id='reserveerprint' value='Deze tafel reserveren'/>";
				echo "</form>";
					
				}
			}
		}
		
	}
	
?>
</section>

<ul id='tafels'>

<?php

if (empty($_POST)) 
{
	$sql3 = "select * from tafelbeheer order by Tafelnummer";
	echo"<h2>Alle tafels van dit restaurant</h2>";

	$result3 = $db->conn->query($sql3);
	foreach ($result3 as $tafel) 
	{

		echo "<li>";
		echo"<span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
		Maximum aantal personen: " . $tafel['MaxPersonen'] . "
		Opmerkingen: ".$tafel['Opmerkingen'];
		echo "</li>";
	}
}
?> 
</ul>

<div id='resbevtitel'></div>
<div id="resbev"></div>
	
</body>
</html>