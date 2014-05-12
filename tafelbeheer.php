<?php

include_once('classes/db.class.php');
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
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slicknav.css">
	
</head>
<body>
<?php include_once('nav_include.php') ?>

<section id="wrapper">

	<h1>TAFELS</h1>
	<img src="images/line.png" class="headerline" alt="line"/>

	<section class="blok">
<h2>NIEUWE TAFEL TOEVOEGEN</h1>

	<form action="" method="post">
		
		<label for="tafelnr" required >Tafelnummer:</label>
		<input type="text" name="tafelnr" required />	

		<label for="personen" required >Maximum aantal personen:</label>
		<input type="text" name="personen" required />	

		<label for="opm" required >Opmerkingen:</label>
		<input type="text" name="opm" placeholder="familietafel, aan het raam ..." />	

		<input type="submit" class='btn btn-lg btn-default' name="btn_add" value="toevoegen" />
	</form>

</section>

<section class="blok">
<h2>BESTAANDE TAFELS BEHEREN</h1>
<?php 
	echo $feedback;

	$result = $nieuwtafel->GetAll();

	echo "<ul id='tafels'>";

	while($tafel = $result->fetch_assoc()) 
	{
		echo "<form action='' method='post'>";
		echo "<label><h3>Tafel " . $tafel['Tafelnummer'] . "</h3></label><input type='hidden' name='tafelnr' value='" .
		$tafel['Tafelnummer'] ."'/>
		<label>Maximum aantal personen:</label> <input type='text' name='personen' value='" .
		$tafel['MaxPersonen'] . "'/>
		<label>Opmerkingen:</label><input type='text' name='opmerkingen' value='" . 
		$tafel['Opmerkingen'] . "'/>";
		
		echo "<input class='btn btn-lg btn-default'  type='submit' name='btn_edit' value='bewerken' />";
		echo "<input class='btn btn-lg btn-default' type='submit' name='btn_delete' value='delete' />";
		echo "</form>";

	}
		

?>
</section>

</section>
</body>
</html>