<?php 
include_once("classes/User.class.php");
include_once('classes/db.class.php');

if (isset($_POST['btnSignup'])) {
	try{
	$user = new User();
	$user->Voornaam = $_POST['voornaam'];
	$user->Name = $_POST['naam'];
	$user->Email = $_POST['email'];
	$user->Password = $_POST['password'];
	$available = $user->EmailAvailable();
		if($available == true){
			$user -> Register();
			if(isset($user->errors) && !empty($user->errors))
			{
				if(isset($user->errors['errorCreate']))
				{
					$error = $user->errors['errorCreate'];
				}
			}
			else
			{
				$feedback = $user->feedbacks['Signedup'];
			}
		}
		else
		{
			if(isset($user->errors) && !empty($user->errors))
			{
				if(isset($user->errors['errorAvailable']))
				{
					$error = $user->errors['errorAvailable'];
				}
			}
		}
		
	
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
	$("#email").on("blur", function(e){
				//var clickedLink = $(this);
				console.log('BLURED');
				var email = $("#email").val();
				console.log(email);
				$(".emailFeedback").css("display","block");
				$.ajax({
				  type: "POST",
				  url: "ajax/ajax-usernamecheck.php",
				  data: { email: email }
				})
				  .done(function(result) {
				    console.log(result);
				    if(result == 'true')
				    {
				    	$(".emailFeedback").html("<p id='available'>Yup :), email is available!</p>");
				    }
				    else
				    {
				    	$(".emailFeedback").html("<p id='notavailable'>:( sorry, email is already taken!</p>");
				    }
				  });

				e.preventDefault();
			});

	$("#email").on("focus", function(e){
		$(".feedback").css("display","none");
		$(".error").css("display","none");
	});
});
</script>
</head>
<body>
	<div class="container">
		<?php if (isset($feedback)): ?>
<div class="feedback">
	<?php echo $feedback; ?>
</div>
<?php endif;?>

<?php if (isset($error)): ?>
<div class = 'error'>
	<?php echo $error; ?>
</div>
<?php endif; ?>	
		<section id="signup-user">
	
		<h2>registreer hier als gebruiker</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="form-group">
				<input type="text" name="voornaam" placeholder="Voornaam"required="required" />
				<input type="text" name="naam" placeholder="Naam"required="required" />
			</div>

			<div class="form-group">
			<input type="email" id="email" name="email" placeholder="Email" required="required"/>
			<div class="emailFeedback"><span>checking</span></div>
			<input type="password" name="password" placeholder="Password" required="required"/>
			</div>


			<input type="submit" name="btnSignup" value="Registreer hier" />
			
		</form>
		<div class="feedback">
			<?php
		
		if(!empty($feedback)){
			 echo $feedback; 
		}
		 
		 ?></div>
	</section>




		<section id="signup-restaurant">
	
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