<?php 
	include_once('classes/db.php');
	include_once("classes/nieuwMenu.class.php");

	print_r($_POST);

	if(!empty($_POST))
	{
	//	try 
	//	{

			$nieuwMenu = new nieuwMenu();
			$nieuwMenu->naam = $_POST['nieuwMenu'];
			$nieuwMenu->details = $_POST['nieuwMenuDetails'];
			$nieuwMenu->Save();
		
			
	//	} 
	//	catch (Exception $e) 
	//	{
		//	$feedback = $e->getMessage();
		//}
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
</head>
<body>
	<h1>Nieuwe menu maken</h1>

	<form action="" method="POST">

	<label for="nieuwMenu">Naam menu</label>
	<br/>
	<input type="text" id="nieuwMenu" name="nieuwMenu" />
	<br/>
	<label for="nieuwMenuDetails">Details menu</label>
	<br/>
	<input type="textbox" id="nieuwMenuDetails" name="nieuwMenuDetails" >
	<br/>
	<input id="btnMenuAanmaken" type="submit" value="Menu aanmaken" />

	</form>
	
	<h1>Menu's aanpassen</h1>
	<select>
  		<option value="kiesMenu">Kies menu</option>
	</select>
	
		
</body>
</html>