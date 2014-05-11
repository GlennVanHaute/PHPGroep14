<?php 

include("classes/User.class.php");
if (isset($_POST['btnSignup'])) {
	try{
	$user = new User();
	$user -> Name = $_POST['name'];
	$user -> Email = $_POST['email'];
	$user -> Password = $_POST['password'];
	$user -> Register();
	}catch (Exception $e)
	{
		$feedback=$e->getMessage();
	}


	}

if (isset($_POST['btnLogin'])) {
	$user = new User();
	$user -> Name = $_POST['username'];
	$user -> Password = $_POST['password'];
	$user -> canLogin();
}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" media="all">
	<script type="text/javascript" src="js/facebook.js"></script>
</head>
<body>

<div class="container">
<!-- 	<nav>
		<a href="logout.php"Logout>Logout</a>
	</nav> -->
	<h2>Log hier in via Facebook</h2>
	<div class="row"><div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true"></div></div>

		<h2>Log hier in (voor restauranthouder) </h2>
	<section id="login">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="username" placeholder="Email" required="required" />
		<input type="password" name="password" placeholder="Password" required="required"/>
		<input type="submit" name="btnLogin" value="Sign in" />
		<input type="checkbox" name="rememberme" value="yes" id="rememberme">
		<label for="rememberme">Remember me</label>
		</form>
		
	</section>	
	
	
		<a href="register.php">Ben je een nieuwe restauranthouder? registreer dan hier</a>
		


</div>
</body>
</html>