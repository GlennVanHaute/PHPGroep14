<?php include_once('classes/db.php') ?>
<?php $db = new Db(); ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tafels (frontend)</title>
</head>
<body>

<h1>TAFELS</h1>

<form action="" method="post">
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
		$aantal = $_POST['aantal'];
		$sql = "select * from tafelbeheer where MaxPersonen='" . $aantal . "' order by Tafelnummer";
		$result = $db->conn->query($sql);

		echo "<h3> Tafels van " . $aantal . " personen:</h3>";

		$check = mysqli_query($db->conn,$sql);
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
			echo "<button>Deze tafel reserveren</button>";
			echo "</li>";
		}

		$sql = "select * from tafelbeheer where MaxPersonen>'" . $aantal . "' order by Tafelnummer";

		$result = $db->conn->query($sql);

		$check = mysqli_query($db->conn,$sql);
		if(mysqli_num_rows($check) != 0)
		{
			echo "<h3> Tafels die u ook kan reserveren:</h3>";

			foreach ($result as $tafel) 
		{
			echo "<li>";
			echo"<span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
			Maximum aantal personen: " . 		$tafel['MaxPersonen'] . "
			Opmerkingen: " . 		$tafel['Opmerkingen'];
			echo "<button>Deze tafel reserveren</button>";
			echo "</li>";
		}
		}

		
	}
	
?>

<ul id='tafels'>
<h3>Alle tafels van dit restaurant</h3>
<?php 
	$sql = "select * from tafelbeheer order by Tafelnummer";

	$result = $db->conn->query($sql);
	foreach ($result as $tafel) 
	{
		echo "<li>";
		echo"<span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
		Maximum aantal personen: " . 		$tafel['MaxPersonen'] . "
		Opmerkingen: " . 		$tafel['Opmerkingen'];
		echo "</li>";
	}
?>
</ul>

	
</body>
</html>