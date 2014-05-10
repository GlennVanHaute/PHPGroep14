<?php 

	include_once('classes/db.php');
	$db = new Db();


	if (!empty($_POST)) 
	{

		$aantal = $_POST['aantal'];
		$datum = $_POST['datum'];
		$datum = $_POST['uur'];

		$sql = "select * from tafelbeheer where MaxPersonen='" . $aantal . "' order by Tafelnummer";

		$result = $db->conn->query($sql);
		$check = mysqli_query($db->conn,$sql);

		$sql2 = "select * from tafelbeheer where MaxPersonen>'" . $aantal .  "' order by Tafelnummer";
		$result2 = $db->conn->query($sql2);
		$check2 = mysqli_query($db->conn,$sql2);
	}

?>

<!doctype html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<title>Reservatie</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
	</script>
</head>
<body>

<?php include_once('classes/nav_include.php') ?>


<h1>RESERVATIE</h1>
<p>Reserveer hier uw tafel</p>

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

<input type="submit" value="zoeken"/>

</form>

<section id='reserveer'>
<?php
	if (!empty($_POST)) 
	{

		echo "<h2> Tafels van " . $aantal . " personen:</h2>";

		
		if(mysqli_num_rows($check) ==0 && mysqli_num_rows($check2)== 0)
		{
			echo "<p>Er zijn geen tafels voor " .$aantal. " personen. U kan wel meerdere kleine tafels reserveren.";
		}
		else if(mysqli_num_rows($check) == 0)
		{
			echo "<p> Er is geen tafel vrij voor exact " . $aantal . " personen.
			Kijk hieronder voor andere reserveerbare tafels voor meer dan " . $aantal . " personen</p>";
		}



		foreach ($result as $tafel) 
		{
			$tafelnr = $tafel['Tafelnummer'];
			$sql3 = "select * from reservatie where Tafelnummer='" . $tafelnr . "' and Datum ='" . $datum . "'";
			$check3 = mysqli_query($db->conn,$sql3);


			if(mysqli_num_rows($check3) == 0)
			{
				echo "<li class='huidigeres'>";
				echo" <span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
					  Maximum aantal personen: " . $tafel['MaxPersonen'] . "
					  Opmerkingen: " . $tafel['Opmerkingen'];
				echo "</li>";
				echo"<button id='reserveerprint'>Deze tafel reserveren</button>";
				
			}
		}

		
		if(mysqli_num_rows($check2) != 0)
		{
			echo "<h2> Tafels die u ook kan reserveren:</h2>";

			foreach ($result2 as $tafel) 
			{

			$tafelnr = $tafel['Tafelnummer'];
			$sql3 = "select * from reservatie where Tafelnummer='" . $tafelnr . "' and Datum ='" . $datum . "'";
			$check3 = mysqli_query($db->conn,$sql3);

				if(mysqli_num_rows($check3) == 0)
				{
					echo "<li class='huidigeres'>";
					echo"<span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
						 Maximum aantal personen: " . $tafel['MaxPersonen'] . "
						 Opmerkingen: " . $tafel['Opmerkingen'];
					echo "</li>";
					echo"<button id='reserveerprint'>Deze tafel reserveren</button>";
					
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



<!-- reservatie moet $tafelr $datum $uur pakken en in reservatie steken. -->



	
</body>
</html>