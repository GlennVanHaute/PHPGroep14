<?php include_once('classes/db.php') 
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tafels (frontend)</title>
</head>
<body>

<h1>TAFELS</h1>

<?php 
	$db = new Db();
	$sql = "select * from tafelbeheer";

	$result = $db->conn->query($sql);

	echo "<ul id='tafels'>";
	foreach ($result as $tafel) 
	{
		echo "<li>";
		echo"<span> Tafelnummer: " . $tafel['Tafelnummer'] . "</span>
		Maximum aantal personen: " . 		$tafel['MaxPersonen'] . "
		Opmerkingen: " . 		$tafel['Opmerkingen'];

		echo "</li>";
	}
		

?>

	
</body>
</html>