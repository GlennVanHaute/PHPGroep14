<?php 

	include_once('classes/db.class.php');
	include_once("classes/nieuwMenu.class.php");
	$nieuwMenu = new nieuwMenu();

 ?><!doctype html>
 <html lang="en">
 <head>
 	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slicknav.css">
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



 	<?php include('nav_include.php') ?>

 <section id="wrapper">
 	<h1>MENU</h1>
 	<img src="images/line.png" class="headerline" alt="line"/>
	
	<section class="blok">
 	<?php 
	$res = $nieuwMenu->getAll();

	  		
			while($lijstmenu = $res->fetch_assoc())
			{
				//echo "<form>";
				echo "<h2>".$lijstmenu['Naam']." - €".$lijstmenu['Prijs']."</h2>";
				echo "<p class='menuopm'> ".$lijstmenu['Details']."</p>";
				//echo "</form>";
			}
			

 	 ?>
 	
 	</section>
</section>
 </body>
 </html>