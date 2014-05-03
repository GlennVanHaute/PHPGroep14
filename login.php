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
</head>
<body>
	<nav>
		<a href="logout.php"Logout>Logout</a>
	</nav>

		<h2>Log hier in</h2>
	<section id="login">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="username" placeholder="Email" required="required" />
		<input type="password" name="password" placeholder="Password" required="required"/>
		<input type="submit" name="btnLogin" value="Sign in" />
		<input type="checkbox" name="rememberme" value="yes" id="rememberme">
		<label for="rememberme">Remember me</label>
		</form>
		
	</section>	
	
	<section id="signup">
	
		<h2>Maak hier een account aan om je tafel te kunnen reserveren!</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="name" placeholder="Full name"required="required" />
		<input type="email" name="email" placeholder="Email" required="required"/>
		<input type="password" name="password" placeholder="Password" required="required"/>
		<input type="submit" name="btnSignup" value="Sign up for IMD Talks" />
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