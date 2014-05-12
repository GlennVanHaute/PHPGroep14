<?php 
	include_once("classes/db.class.php");
	
	class User
	{
		private $m_sVoornaam;
		private $m_sName;
		private $m_sEmail;
		private $m_sPassword;
		// public $errors = array();
		// public $feedbacks = array();

		
		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case "Voornaam": $this->m_sVoornaam = $p_vValue;
				break;

				case "Name": $this->m_sName = $p_vValue;
				break;
				
				case "Email": $this->m_sEmail = $p_vValue;
				break;
				
				case "Password": 
				//check of paswoord minstens 5 karakters is
				if(strlen($p_vValue) < 5)
				{
					throw new Exception("Password not long enough.");
				}
				$salt = "ergzg858461ea6g5654";
				$this->m_sPassword = md5($p_vValue.$salt);
				break;

				
				
			}
		}
		public function __get($p_sProperty)
		{
			$vResult = null;
			switch($p_sProperty)
			{
				case "Voornaam": return $this->m_sVoornaam;
				break;

				case "Name": return $this->m_sName;
				break;
				
				case "Email": return $this->m_sEmail;
				break;
				
				case "Password": return $this->m_sPassword;
				break;

			return $vResult;
			}
		}
	// 	public function EmailAvailable()
	// {
	// 		$db = new Database();
	// 	$sql = "select * from tblusers where email = '".$db->conn->real_escape_string($this->m_sEmail)."';";
	// 	$result = $db->conn->query($sql);
	// 	if($result)
	// 	{
	// 		if(mysqli_num_rows($result) === 0)
	// 		{
	// 			$available = true;
	// 		}
	// 		else
	// 		{
	// 			$available = false;
	// 			$this->errors['errorAvailable'] = 'We kunnen deze username niet opslagen!';
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$available = false;
	// 		$this->errors['errorDB'] = "Connection to Database has failed!";
	// 	}
	// 	return $available;

		
	// }
		
		public function Register()
		{
			// save user to database
			$db = new Database();
			$sSql = "insert into tblusers (voornaam, naam, email, password)
					values(
							'".$db->conn->real_escape_string($this->m_sVoornaam)."', 
							'".$db->conn->real_escape_string($this->m_sName)."', 
							'".$db->conn->real_escape_string($this->m_sEmail)."',
							'".$db->conn->real_escape_string($this->m_sPassword)."'
					)";
			$rResult = $db->conn->query($sSql);
			header('Location: login.php');
			// if ($rResult)
			// {	
			// 	$this->feedbacks['Signedup'] = "Thanks for signing up!";
			// }
			// else
			// {		
			// 	echo $sSql;			
			// 	// er zijn geen query resultaten, dus query is gefaald
			// 	$this->errors['errorCreate'] = "Caramba couldn't create your account!";
			// }	
		}

		public function Register2()
		{
			// save user to database
			$db = new Database();
			$sql = "insert into tblhouders (voornaam, naam, email, password)
					values(
							'".$db->conn->real_escape_string($this->m_sVoornaam)."', 
							'".$db->conn->real_escape_string($this->m_sName)."', 
							'".$db->conn->real_escape_string($this->m_sEmail)."',
							'".$db->conn->real_escape_string($this->m_sPassword)."'
					)";
			$db->conn->query($sql);
			header('Location: login.php');
		}

		public function canLogin()
		{
			session_start();
			$db = new Database();
			$sql = "SELECT * FROM tblusers WHERE naam ='" . $this->m_sName . "' AND password = '" . $this->m_sPassword . "';";			
			$check = $db->conn->query($sql);

			if(mysqli_num_rows($check) == 1)
			{
				
			

				// echo "Login geslaagd";
				header('Location: tafels.php');
			} 
			else 
			{
				throw new Exception("User and/or password are not correct");
				
			}
		}

		public function canLogin2()
		{
			session_start();
			$db = new Database();
			$sql = "SELECT * FROM tblhouders WHERE naam ='" . $this->m_sName . "' AND password = '" . $this->m_sPassword . "';";			
			$check = $db->conn->query($sql);

			if(mysqli_num_rows($check) == 1)
			{
						$_SESSION['admin'] = false;
			

				// echo "Login geslaagd";
				header('Location: tafels.php');
			} 
			else 
			{
				throw new Exception("User and/or password are not correct");
				
			}
		}


		
	}

?>

