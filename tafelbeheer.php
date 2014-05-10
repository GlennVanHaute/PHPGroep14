<?php

include_once('classes/db.php');
include_once('classes/Tafel.class.php');

$nieuwtafel = new Tafel();

$feedback = '';

//NIEUWE TAFEL AANMAKEN
if(!empty($_POST['btn_add']))
{
	try 
	{
		
		$nieuwtafel->nummer = $_POST['tafelnr'];
		$nieuwtafel->personen = $_POST['personen'];
		if (!empty($_POST['opm'])) 
		{
			$nieuwtafel->opm = $_POST['opm'];
		}
		else 
		{
			$opm =" ";
		}
		
		$nieuwtafel->Save();
	}

	catch (Exception $e) 
		{
			$feedback = $e->getMessage();
		}	
}

// TAFEL DELETEN
if(!empty($_POST['btn_delete']))
	{
		try
		{	
			$nieuwtafel->nummer = $_POST['tafelnr'];
			$nieuwtafel->Delete();
		}
	
		catch (Exception $e) 
		{
			$feedback = $e->getMessage();
		}

	}

// TAFEL BEWERKEN, tafelnr uit invisible

	if(!empty($_POST['btn_edit']))
	{
		try
		{	
			$nieuwtafel->id = $_POST['tafelnr'];
			$nieuwtafel->nummer = $_POST['tafelnr'];
			$nieuwtafel->personen = $_POST['personen'];
			$nieuwtafel->opm = $_POST['opmerkingen'];
			$nieuwtafel->Edit();
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
	<title>Tafelbeheer (backend)</title>
		<link rel="stylesheet" href="css/style.css">
	
</head>
<body>

<h1>BESTAANDE TAFELS BEHEREN</h1>
<?php 
	echo $feedback;

	$result = $nieuwtafel->GetAll();

	echo "<ul id='tafels'>";

	while($tafel = $result->fetch_assoc()) 
	{
		echo "<form action='' method='post'>";
		echo "<span> Tafelnummer: " . $tafel['Tafelnummer'] . "<input type='hidden' name='tafelnr' value='" .
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