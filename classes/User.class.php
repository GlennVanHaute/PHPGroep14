<?php 
	include_once("classes/db.class.php");
	
	class User
	{
		private $m_sVoornaam;
		private $m_sName;
		private $m_sEmail;
		private $m_sPassword;

		
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
			switch($p_sProperty)
			{
				case "Voornaam": return $this-> m_sVoornaam;
				break;

				case "Name": return $this-> m_sName;
				break;
				
				case "Email": return $this-> m_sEmail;
				break;
				
				case "Password": return $this-> m_sPassword;
				break;


			}
		}
		
		public function Register()
		{
			// save user to database
			$db = new Database();
			$sql = "insert into tblusers (voornaam, naam, email, password)
					values(
							'".$db->conn->real_escape_string($this->m_sVoornaam)."', 
							'".$db->conn->real_escape_string($this->m_sName)."', 
							'".$db->conn->real_escape_string($this->m_sEmail)."',
							'".$db->conn->real_escape_string($this->m_sPassword)."'
					)";
			$db->conn->query($sql);
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

