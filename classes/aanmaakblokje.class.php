<?php
		
include_once("db.class.php");
		class Aanmaak
		{
			private $m_iid;
			private $m_sNaam;
			private $m_sAdres;
			private $m_sPostcode;
			private $m_sGemeente;
			private $m_sEmailadres;
			private $m_sTelefoonnummer;
			private $m_sFaxnummer;
			private $m_sBTWnummer;
			


			public function __set($p_sProperty,$p_vValue)
			{
				switch ($p_sProperty) 
				{
					case 'id':
						$this->m_iid = $p_vValue;
						break;
				
					case 'Naam':
						$this->m_sNaam = $p_vValue;
						break;

					case 'Adres':
						$this->m_sAdres = $p_vValue;					
						break;
						
					case 'Postcode':
						$this->m_sPostcode = $p_vValue;					
						break;
						
					case 'Gemeente':
						$this->m_sGemeente = $p_vValue;					
						break;

					case 'Emailadres':
						$this->m_sEmailadres = $p_vValue;
						break;
						
					case 'Telefoonnummer':
						$this->m_sTelefoonnummer = $p_vValue;
						break;
						
					case 'Faxnummer':
						$this->m_sFaxnummer = $p_vValue;
						break;
					
					case 'BTWnummer':
						$this->m_sBTWnummer = $p_vValue;
						break;
				}

			}


			public function __get($p_sProperty)
			{
				switch ($p_sProperty) 
				{
					case 'id':
						return $this->m_iid;
						break;
				
					case 'Naam':
						return $this->m_sNaam;
						break;

					case 'Adres':
						return $this->m_sAdres;
						break;
						
					case 'Postcode':
						return $this->m_sPostcode;
						break;
						
					case 'Gemeente':
						return $this->m_sGemeente;
						break;

					case 'Emailadres':
						return $this->m_sEmailadres;
						break;
						
					case 'Telefoonnummer':
						return $this->m_sTelefoonnummer;
						break;
						
					case 'Faxnummer':
						return $this->m_sFaxnummer;
						break;
						
					case 'BTWnummer':
						return $this->m_sBTWnummer;
						break;
				}
			}


			public function Aanmaken()
			{
				include_once("db.class.php");
				$db = new Database();
				$sql = "insert into tblaanmaak (Naam, Adres, Postcode, Gemeente, Emailadres, Telefoonnummer, Faxnummer, BTWnummer) 
				values (
			'".	$db->conn->real_escape_string($this->m_sNaam)."',
			'".	$db->conn->real_escape_string($this->m_sAdres)."',
			'".	$db->conn->real_escape_string($this->m_sPostcode)."',
			'".	$db->conn->real_escape_string($this->m_sGemeente)."',
			'".	$db->conn->real_escape_string($this->m_sEmailadres)."',
			'".	$db->conn->real_escape_string($this->m_sTelefoonnummer)."',
			'".	$db->conn->real_escape_string($this->m_sFaxnummer)."',
			'".	$db->conn->real_escape_string($this->m_sBTWnummer)."')";
				return $db->conn->query($sql);
				

			}
			
			public function getAll()
			{

				$db = new Database();
				$sql = "select * from tblaanmaak";
				return $db->conn->query($sql);
			}
			public function Update()
			{
				$db = new Database();
				$sql = "UPDATE tblaanmaak
						SET 
							Naam = '".$db->conn->real_escape_string($this->Naam)."',
							Adres = '".$db->conn->real_escape_string($this->Adres)."',
							Postcode = '".$db->conn->real_escape_string($this->Postcode)."',
							Gemeente = '".$db->conn->real_escape_string($this->Gemeente)."',
							Emailadres = '".$db->conn->real_escape_string($this->Emailadres)."',
							Telefoonnummer = '".$db->conn->real_escape_string($this->Telefoonnummer)."',
							Faxnummer = '".$db->conn->real_escape_string($this->Faxnummer)."',
							BTWnummer = '".$db->conn->real_escape_string($this->BTWnummer)."'
							WHERE id = '".$this->id."'";	

				$db->conn->query($sql);

			}
			public function Delete()
			{
				$db = new Database();
				$sql = "DELETE FROM tblaanmaak
						WHERE id = '".$this->id."'
						";
				$db->conn->query($sql);
			}
			public function Check()
		{
			$db = new Database();
			$sql = "SELECT * FROM tblaanmaak WHERE Naam = '".$this->naam."';";
			$result = $db->conn->query($sql);
			//print_r($sql);

			//print_r($result);

			if($result)
			{
				if(mysqli_num_rows($result) === 0)
				{
					$available = true;
					
				}
				else
				{
					$available = false;
	
				}
			}
			else
			{
				$available = false;
				$this->errors['errorDB'] = "Er is geen connectie met de databank.";
			}

			return $available;


		}

			
		}
?>






















