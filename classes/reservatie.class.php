<?php
		
include_once ("db.class.php");

	class Reservatie
	{
			private $m_iTafelnummer;
			private $m_iPersonen;
			private $m_sDatum;
			private $m_sUur;
			


			public function __set($p_sProperty,$p_vValue)
			{
				switch ($p_sProperty) 
				{
					case 'Tafelnummer':
						$this->m_iTafelnummer = $p_vValue;
						break;

					case 'Personen':
						$this->m_iPersonen = $p_vValue;
						break;

					case 'Datum':

						$this->m_sDatum = $p_vValue;					
						break;

					if (!empty($_POST['datum']) or !empty($_POST['resdatum']))
					{
						$this->m_sDatum = $p_vValue;
					}

					break;

					case 'Uur':
						$this->m_sUur = $p_vValue;
						break;
				}

			}


			public function __get($p_sProperty)
			{
				switch ($p_sProperty) 
				{
					case 'Tafelnummer':
						return $this->m_iTafelnummer;
						break;

					case 'Personen':
						return $this->m_iPersonen;
						break;

					case 'Datum':
						return $this->m_sDatum;
						break;

					case 'Uur':
						return $this->m_sUur;
						break;
				}
			}


			public function Reserveer()
			{
				// echo "check functie Reserveer <br/>";
				// echo "nummer: $this->Tafelnummer  <br/>";
				// echo "datum: $this->Datum <br/>";
				// echo "uur: $this->Uur  <br/>";

				$db = new Database();
				$sql = "INSERT INTO reservatie (Tafelnummer, Personen, Datum, Uur) 
				VALUES (
			'".	$db->conn->real_escape_string($this->Tafelnummer)."',
			'".	$db->conn->real_escape_string($this->Personen)."',
			'".	$db->conn->real_escape_string($this->Datum)."',
			'".	$db->conn->real_escape_string($this->Uur)."')";
				print_r($sql);
				return $db->conn->query($sql);

<<<<<<< HEAD
=======
			}

			public function CheckDatum()
			{
				$db = new Database();
				$sql = "select * from reservatie where Tafelnummer='" . $this->Tafelnummer . "' and Datum ='" . $this->Datum . "';";
				return $db->conn->query($sql);
>>>>>>> FETCH_HEAD
			}


			public function GetAll()
			{
				$db = new Database();
				$sql = "select * from reservatie order by Tafelnummer";
				return $db->conn->query($sql);
			}
			
	}
?>






















