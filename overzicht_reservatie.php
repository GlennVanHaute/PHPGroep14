<?php
	
	include_once("classes/db.class.php");

	
		$db = new Database();
		$sql = "select * from tblreservatie";
		$result = $db->conn->query($sql);


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

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Overzicht reservaties</title>
</head>
<body>
	
</body>
</html>