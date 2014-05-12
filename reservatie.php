<?php 

	if(!empty($_POST))
		{
			include_once("classes/reservatie.class.php");
			if (!empty($_POST['persoon'] && !empty($_POST['hoeveel'])&& !empty($_POST['datum'])&& !empty($_POST['tijdstip']))) {
				
				$reservatie = new reservatie();
				$reservatie->Persoon = $_POST['persoon'];
				$reservatie->Hoeveel = $_POST['hoeveel'];
				$reservatie->Datum = $_POST['datum'];
				$reservatie->Tijdstip = $_POST['tijdstip'];
				$reservatie->Save();

			}
			
		}

 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="css/style_reservatie.css">
	<title>Reservatiebevestiging</title>
</head>
<body>			
			    <h1>Reservatiebevestiging</h2>
<div class="container-fluid">

	<div class="row">
		<div class="col-xs-12 col-md-12">
			<form role="form" action="" class="omkadering" method="post">
			  <div class="form-group">
				
			    <input type="text" class="form-control" name="persoon" placeholder="Gelieve je naam in te vullen">
				<input type="text" class="form-control" name="hoeveel" placeholder="Met hoeveel personen kom je eten?">
				<input type="text" class="form-control" name="datum" placeholder="Op welke dag kom je eten?">
				
				<select class="select" name="tijdstip">
					 <option SELECTED value="wanneer">Wanneer kom je eten?</option>
					 <option value="11u30">11u30</option>
					 <option value="12u00">12u00</option>
					 <option value="12u30">12u30</option>
					 <option value="13u00">13u00</option>
					 <option value="13u30">13u30</option>
					 <option value="14u00">14u00</option>
					 <option value="14u30">14u30</option>
					 <option value="15u00">15u00</option>
					 <option value="15u30">15u30</option>
					 <option value="16u00">16u00</option>
					 <option value="16u30">16u30</option>
					 <option value="17u00">17u00</option>
					 <option value="17u30">17u30</option>
					 <option value="18u00">18u00</option>
					 <option value="18u30">18u30</option>
					 <option value="19u00">19u00</option>
					 <option value="19u30">19u30</option>
					 <option value="20u00">20u00</option>
					 <option value="20u30">20u30</option>
					 <option value="21u00">21u00</option>
					 <option value="21u30">21u30</option>
				</select>
			    
				
				
			  </div>

			  
			  
			  <button type="submit" class="btn btn-lg btn-default" id="button" value="post">Reserveer je plaats!</button>
			</form>
		</div>
	</div>

			
	
	
	
</div>

<div id="achtergrond">
<?php include_once("overzicht_reservatie.php") ?>
</div>
</body>
</html>