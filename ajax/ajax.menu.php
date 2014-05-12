<?php 
	
	include_once('../classes/db.class.php');
	include_once("../classes/nieuwMenu.class.php");

	$nieuwMenu = new nieuwMenu();

	if(!empty($_POST['nieuwMenu']))
	{

		$nieuwMenu->naam = $_POST['nieuwMenu'];

		$available = $nieuwMenu->Check();

		if($available === false)
		{
			echo 'false';

		}
		else
		{
			echo 'true';
		}

	}
 ?>