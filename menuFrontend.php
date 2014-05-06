<?php 

	include_once('classes/db.php');
	include_once("classes/nieuwMenu.class.php");
	$nieuwMenu = new nieuwMenu();

 ?><!doctype html>
 <html lang="en">
 <head>
 	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 	
 	<script type="text/javascript">	
 	$(document).ready(function(){
 		$('.target').change(function(){
 		var bestelling = $("input:checked").val();

 		//var bestelling = $('input:checked').text();
 		console.log(bestelling);
 			// var bestelling = $(this).text();
 			// console.log(bestelling);
 			return(false);
 		});
 	});
 	</script>
 	<meta charset="UTF-8">
 	<title>Menukaart</title>
 </head>
 <body>
 	<h1>Menukaart</h1>
 	<?php 
	$res = $nieuwMenu->getAll();

	  		
			while($lijstmenu = $res->fetch_assoc())
			{
				echo "<form>";
				//echo "<input type='hidden' name='gerechtid' value='".$lijstmenu['id']."'/>";
				echo "<input class='target' type='checkbox' value='".$lijstmenu['Naam']."'/>"." ".$lijstmenu['Naam'];
				echo "<p>".$lijstmenu['Details']."</p>";
				echo "<p>€ ".$lijstmenu['Prijs']."</p>";
				echo "</br>";
				echo "</form>";
			}
			

 	 ?>
 	
 	
 </body>
 </html>