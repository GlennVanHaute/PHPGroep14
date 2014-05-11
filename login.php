<?php 
		session_start();
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

<script>
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {

      // window.location.replace("tafels.php");
      
    } else if (response.status === 'not_authorized') {
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
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