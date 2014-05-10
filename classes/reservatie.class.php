<?php
		
include_once ("db.php");

		class Reservatie
		{
			private $m_iTafelnummer;
			private $m_sDatum;
			private $m_sBeginuur;
			private $m_sEinduur;
			


			public function __set($p_sProperty,$p_vValue)
			{
				switch ($p_sProperty) 
				{
					case 'Tafelnummer':
						$this->m_sPersoon = $p_vValue;
						break;

					case 'Datum':
						$this->m_sDatum = $p_vValue;
						break;

					case 'Beginuur':
						$this->m_sBeginuur = $p_vValue;
						break;

					case 'Einduur':
						$this->m_sEinduur = $p_vValue;
						break;
				}

			}


			public function __get($p_sProperty)
			{
				switch ($p_sProperty) 
				{
					case 'Tafelnummer':
						return $this->m_sPersoon;
						break;

					case 'Datum':
						return $this->m_sDatum;
						break;

					case 'Beginuur':
						return $this->m_sBeginuur;
						break;

					case 'Einduur':
						return $this->m_sEinduur;
						break;
				}
			}


			public function CheckDatum()
			{
				$db = new db();
				$sql = "select * from reservatie where Tafelnummer='" . $this->Tafelnummer . "' and Datum ='" . $this->Datum . "';";
				return $db->conn->query($sql);

			}

			public function Reserveer()
			{
				echo "check functie Reserveer <br/>";
				echo "nummer: $this->Tafelnummer  <br/>";
				echo "datum: $this->Datum  <br/>";
				echo "beginuur: $this->Beginuur  <br/>";
				echo "beginuur2: $this->Einduur  <br/>";

				$db = new db();
				$sql = "INSERT INTO reservatie (Tafelnummer, Beginuur, Einduur) 
				VALUES (
			'".	$db->conn->real_escape_string($this->Tafelnummer)."',
			'".	$db->conn->real_escape_string($this->Datum)."',
			'".	$db->conn->real_escape_string($this->Beginuur)."',
			'".	$db->conn->real_escape_string($this->Einduur)."')";
				return $db->conn->query($sql);

				echo "$sql";

			}

			
		}
?>






















