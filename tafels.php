<?php
	session_start();
	$admin = true;
	include_once('classes/db.class.php');
	include_once('classes/Tafel.class.php');
	include_once('classes/reservatie.class.php');

	$db = new Database();
	$Reservatie = new Reservatie();
	$Tafel = new Tafel();

	if (!empty($_POST['submitknop'])) 
	{
		$aantal = $_POST['aantal'];
		$Reservatie->Datum = $_POST['datum'];
		$Reservatie->Uur = $_POST['uur'];
		$Reservatie->Personen = $_POST['aantal'];
			
		$resultDatum = $Reservatie->CheckDatum();

		$Tafel->personen = $_POST['aantal'];
		$resultTafel = $Tafel->CheckAantal();
		$resultTafelHoger = $Tafel->CheckAantalHoger();
	}
	

	if (!empty($_POST['ressubmit']))  
	{
		$Reservatie->Tafelnummer = $_POST['restafel'];
		$Reservatie->Datum = $_POST['resdatum'];
		$Reservatie->Uur = $_POST['resuur'];
		$Reservatie->Personen = $_POST['resaantal'];
		$resultReservatie = $Reservatie->Reserveer();
	}
	

?>

<!doctype html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<title>Reservatie</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slicknav.css">
	
</head>

	<script>
	
	$(document).ready(function(){
			$("#resbevtitel").hide();
			$(".huidigeres").submit(function(event){
				var resultaat = $('#radio').is(':checked');

					$("#resbevtitel").show('slow');

					var text = $("input[@name=restafel]:checked").val();
					$("#resbev").html('<p> Tafel ' + text);

					$("#reserveer").hide('slow');

				event.preventDefault();
			});

	});
	

  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {

      // window.location.replace("tafels.php");
      
    } else if (response.status === 'not_authorized') {
// window.location.replace("login.php");
      document.getElementById('status').innerHTML = 'Please log ' +
       'into this app.';

    } else {
// window.location.replace("login.php");
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';

    }
  }

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '315743638578786',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.0' // use version 2.0
  });



  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


</script>
		
</head>
<body>
<?php include_once('nav_include.php') ?>


<h1>RESERVATIE</h1>
<img src="images/line.png" class="headerline" alt="line"/>
<section class="blok">

<h2>Kijk hier of er beschikbare tafels zijn:</h2>

<div class="row">
<div class="col-xs-12 col-md-12">
<form action="" method="post">

<label for="datum">Datum:</label>
<input type="date" for="datum" class="form-control" name="datum" required/>

<label for="uur">Uur:</label>
<input type="time" for="uur" class="form-control" name="uur"/>

<select class="select" name="aantal">
  <option selected disabled value="aantal personen">aantal personen</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
</select>

<input type="submit"  class="btn btn-lg btn-default" name='submitknop' value="zoeken"/>

</form>
</div>
	</div>

<section id='reserveer'>
<?php 
	if (!empty($_POST['submitknop'])) 
	{

		echo "<h2> Reserveerbare tafels van " . $_POST['aantal'] . " personen op " . $_POST['datum'] . ":</h2>";

		
		if(mysqli_num_rows($resultTafel) ==0 )
			//&& mysqli_num_rows($check2)== 0
		{
			echo "<p>Er zijn geen tafels voor " .$Tafel->personen. " personen. U kan wel meerdere kleine tafels reserveren.";
		}
		else if(mysqli_num_rows($resultTafel) == 0)
		{
			echo "<p> Er is geen tafel vrij voor exact " . $Tafel->personen . " personen</p>
			Kijk hieronder voor andere reserveerbare tafels voor meer dan " . $Tafel->personen . " personen</p>";
		}



		foreach ($resultTafel as $tafel) 
		{
			$resultDatum = $Reservatie->CheckDatum();

			if(mysqli_num_rows($resultDatum) == 0)
			{
				echo "<form method='post' action='' class='huidigeres'>";
				echo "<label><h3><input type='radio' id='radio' name='restafel' value=".$tafel['Tafelnummer'].">";
					
					echo " Tafel ".$tafel['Tafelnummer']."</h3>
						 </label> <p>Tafel voor ".$tafel['MaxPersonen']." personen</p>";

					if(!empty($tafel['Opmerkingen']))
					{
						echo " <p>Opmerkingen: " . $tafel['Opmerkingen'] . "</p>";
					};

				echo "<input type='hidden' name='resdatum'  value='" . $_POST['datum'] . "'/>";
				echo "<input type='hidden' name='resuur' value='" . $_POST['uur'] . "'/>";
				echo "<input type='hidden' name='resaantal' value='" . $_POST['aantal'] . "'/>";


			}
				
	
						
		echo"<input type='submit' class='btn btn-lg btn-default'  name='ressubmit' id='reserveerprint' value='Deze tafel reserveren'/>";

		}

		
		if(mysqli_num_rows($resultTafelHoger) !=0)
		{
			echo "<h2> Tafels die u ook kan reserveren:</h2>";

			echo "<form method='post' action='' class='huidigeres'>";

			foreach ($resultTafelHoger as $tafel) 
			{
					echo "<label><h3><input type='radio' id='radio' name='restafel' value=".$tafel['Tafelnummer'].">";
					
					echo " Tafel ".$tafel['Tafelnummer']."</h3>
						 </label> <p>Tafel voor ".$tafel['MaxPersonen']." personen";

					if(!empty($tafel['Opmerkingen']))
					{
						echo " <p>Opmerkingen: " . $tafel['Opmerkingen'] . "</p>";
					};

				echo "<input type='hidden' name='resdatum'  value='" . $_POST['datum'] . "'/>";
				echo "<input type='hidden' name='resuur' value='" . $_POST['uur'] . "'/>";
				echo "<input type='hidden' name='resaantal' value='" . $_POST['aantal'] . "'/>";

			}
			
			echo"<INPUT type='submit' class='btn btn-lg btn-default'  name='ressubmit' id='reserveerprint' value='Deze tafel reserveren'/>";
			echo "</form>";
			
		}
		
	}
	
?>
</section>

<ul id='tafels'>

</ul>

<div id='resbevtitel'>
	<h2>Deze reservatie was succesvol:</h2>
</div>

<div id="resbev"></div>
</div>

</body>
</html>