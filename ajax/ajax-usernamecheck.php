<?php
	include('../classes/User.class.php');


	$u = new User();
	if(!empty($_POST['email']))
	{
			
		$u->Email = $_POST['email'];
		$available = $u->EmailAvailable();

		if($available === false)
		{
			echo 'false';
		}
		else
		{
			echo 'true';
		}
		
	}
?>