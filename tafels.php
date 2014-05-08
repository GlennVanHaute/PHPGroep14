<?php include_once('classes/db.php') ?>
<?php $db = new Db(); ?>

<?php
	if (!empty($_POST)) 
	{

		$aantal = $_POST['aantal'];
		$datum = $_POST['datum'];

		$sql = "select * from tafelbeheer where MaxPersonen='" . $aantal . "' order by Tafelnummer";

		$sqlreserveer = "select * from reservatie where Tafelnummer='" /*TAFELNUMMER*/ . "' and Gereserveerd !=" . $datum . "'"
		// als dit klopt, dan pas tafels laten zien!!

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
	<title>Tafels (frontend)</title>
</head>
<body>

<h1>TAFELS</h1>

<form action="" method="post">

<label for="datum">Op welke datum wilt u een tafel reserveren?</labe>
<input type="date" for="datum>" name="datum"/>

<label for="aantal">Voor hoeveel personen wilt u een tafel reserveren?</label>
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

<?php 
	if (!empty($_POST)) 
	{

		echo "<h3> Tafels van " . $aantal . " personen:</h3>";

		
		if(mysqli_num_rows($check) == 0)
		{
			echo "<p> Er is geen tafel vrij voor exact " . $aantal . " personen.
			Kijk hieronder voor andere reserveerbare tafels voor meer dan " . $aantal . " personen</p>";
		}



		foreach ($result as $tafel) 
		{
			echo "<li>";
			echo"<span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
			Maximum aantal personen: " . 		$tafel['MaxPersonen'] . "
			Opmerkingen: " . 		$tafel['Opmerkingen'];
			echo"<button href='reservatie.php?res=" . $tafel['Tafelnummer'] . "'> Deze tafel reserveren</button>";
			echo "</li>";
		}

		
		if(mysqli_num_rows($check2) != 0)
		{
			echo "<h3> Tafels die u ook kan reserveren:</h3>";

			foreach ($result2 as $tafel) 
		{
			echo "<li>";
			echo"<span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
			Maximum aantal personen: " . 		$tafel['MaxPersonen'] . "
			Opmerkingen: " . 		$tafel['Opmerkingen'];
			echo"<button><a href='reservatie.php?res=" . $tafel['Tafelnummer'] . "'> Deze tafel reserveren</a></button>";
			echo "</li>";
		}
		}

		
	}
	
?>

<ul id='tafels'>

<?php 

if (empty($_POST)) 
{
	$sql3 = "select * from tafelbeheer order by Tafelnummer";
	echo"<h3>Alle tafels van dit restaurant</h3>";

	$result3 = $db->conn->query($sql3);
	foreach ($result3 as $tafel) 
	{

		echo "<li>";
		echo"<span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
		Maximum aantal personen: " . 		$tafel['MaxPersonen'] . "
		Opmerkingen: " . 		$tafel['Opmerkingen'];
		echo "</li>";
	}
}
?>
</ul>

	
</body>
</html>