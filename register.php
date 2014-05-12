<?php 
include("classes/User.class.php");
if (isset($_POST['btnSignup'])) {
	try{
	$user = new User();
	$user -> Voornaam = $_POST['voornaam'];
	$user -> Name = $_POST['naam'];
	$user -> Email = $_POST['email'];
	$user -> Password = $_POST['password'];

	$user -> Register();
	}catch (Exception $e)
	{
		$feedback=$e->getMessage();
	}


	}
	if (isset($_POST['btnSignup2'])) {
	try{
	$user = new User();
	$user -> Voornaam = $_POST['voornaam'];
	$user -> Name = $_POST['naam'];
	$user -> Email = $_POST['email'];
	$user -> Password = $_POST['password'];

	$user -> Register2();
	}catch (Exception $e)
	{
		$feedback=$e->getMessage();
	}


	}


 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" media="all">
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		console.log('ready');
		$("#username").on("blur", function(e){
					//var clickedLink = $(this);
					console.log('BLURED');
					var user = $("#username").val();
					console.log(user);
					$(".usernameFeedback").css("display","block");
					$.ajax({
					  type: "POST",
					  url: "ajax/check_username.php",
					  data: { user: user }
					})
					  .done(function(result) {
					    console.log(result);
					    if(result == 'true')
					    {
					    	$(".usernameFeedback").html("<p id='available'>Yup :), username is available!</p>");
					    }
					    else
					    {
					    	$(".usernameFeedback").html("<p id='notavailable'>:( sorry, username is already taken!</p>");
					    }
					  });

					e.preventDefault();
				});

		$("#username").on("focus", function(e){
			$(".feedback").css("display","none");
			$(".error").css("display","none");
		});
	});
	</script>
</head>
<body>
	<div class="container">
		<section id="signup">
	
		<h2>registreer hier als gebruiker</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="form-group">
				<input type="text" name="voornaam" placeholder="Voornaam"required="required" />
				<input type="text" name="naam" placeholder="Naam"required="required" />
			</div>

			<div class="form-group">
			<input type="email" name="email" placeholder="Email" required="required"/>
			<input type="password" name="password" placeholder="Password" required="required"/>
			</div>


			<input type="submit" name="btnSignup" value="Registreer hier" />
			
		</form>
		<div id="feedback">
			<?php
		
		if(!empty($feedback)){
			 echo $feedback; 
		}
		 
		 ?></div>
	</section>




		<section id="signup">
	
		<h2>registreer hier als restauranthouder</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="form-group">
				<input type="text" name="voornaam" placeholder="Voornaam"required="required" />
				<input type="text" name="naam" placeholder="Naam"required="required" />
			</div>

			<div class="form-group">
			<input type="email" name="email" placeholder="Email" required="required"/>
			<input type="password" name="password" placeholder="Password" required="required"/>
			</div>


			<input type="submit" name="btnSignup2" value="Registreer hier" />
			
		</form>
		<div id="feedback">
			<?php
		
		if(!empty($feedback)){
			 echo $feedback; 
		}
		 
		 ?></div>
	</section>
	</div>
</body>
</html>