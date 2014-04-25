<?php include_once('classes/db.php') ?>

<?php 

$db = new Db();

if(!empty($_POST['btn_add']))
{
	try
	{
		$nr = $_POST['tafelnr'];
		$pers = $_POST['personen'];
		
		if (!empty($_POST['opm'])) 
		{
			$opm = $_POST['opm'];
		}
		else 
		{
			$opm =" ";
		}

			$sql = "INSERT INTO tafelbeheer (Tafelnummer, MaxPersonen, Opmerkingen) VALUES ('$nr', '$pers', '$opm')";
			$db->conn->query($sql);
		
	}
	

	
	catch (Exception $e) 
	{
		$feedback = $e->getMessage();
	}


}


if(!empty($_POST['btn_delete']))
{
	try
	{	
		$tafel = $_POST['tafelnr'];

		$sql = "DELETE FROM `restoapp`.`tafelbeheer` WHERE `tafelbeheer`.`tafelnummer` = '" . $tafel . "'";
		$db->conn->query($sql);
		
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
		$tafel = $_POST['tafelnr'];
		$pers = $_POST['personen'];
		$opm = $_POST['opmerkingen'];

		$sql= "UPDATE tafelbeheer SET MaxPersonen = '" . $pers . "', Opmerkingen = '" . $opm . "' WHERE Tafelnummer = '" . $tafel . "'";
		
		$db->conn->query($sql);

	}
	


	
	catch (Exception $e) 
	{
		$feedback = $e->getMessage();
	}


}





?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tafelbeheer (backend)</title>
		<link rel="stylesheet" href="css/style.css">

	
</head>
<body>

<h1>BESTAANDE TAFELS BEHEREN</h1>

<?php 
	$conn = new mysqli("localhost","root","root", "restoapp");
	$sql = "select * from tafelbeheer order by tafelnummer";

	$result = $conn->query($sql);

	echo "<ul id='tafels'>";
	foreach ($result as $tafel) 
	{
		echo "<form action='' method='post'>";
		echo"<span> Tafelnummer:" . $tafel['Tafelnummer'] . "<input type='hidden' name='tafelnr' value='" .
		$tafel['Tafelnummer'] ."'/> </span></span>
		Maximum aantal personen: <input type='text' name='personen' value='" .
		$tafel['MaxPersonen'] . "'/>
		Opmerkingen: <input type='text' name='opmerkingen' value='" . 
		$tafel['Opmerkingen'] . "'/>";
		
		echo "<input type='submit' name='btn_edit' value='bewerken' />";
		echo "<input type='submit' name='btn_delete' value='delete' />";
		echo "</form>";

	}
		

?>


<h1>NIEUWE TAFEL TOEVOEGEN</h1>

	<form action="" method="post">
		
		<label for="tafelnr" required >Tafelnummer:</label>
		<input type="text" name="tafelnr" required />	

		<label for="personen" required >Maximum aantal personen:</label>
		<input type="text" name="personen" required />	

		<label for="opm" required >Opmerkingen:</label>
		<input type="text" name="opm" placeholder="familietafel, aan het raam ..." />	

		<input type="submit" name="btn_add" value="toevoegen" />
	</form>

	
</body>
</html>