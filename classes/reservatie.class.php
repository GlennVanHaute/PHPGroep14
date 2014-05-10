<?php
		
include_once ("db.php");

		class Reservatie
		{
			private $m_iTafelnummer;
			private $m_sDatum;
			private $m_sUur;
			

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

					case 'Uur':
						$this->m_sTijdstip = $p_vValue;
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

					case 'Uur':
						return $this->m_sTijdstip;
						break;
				}
			}


			public function CheckDatum()
			{
				$db = new db();
				$sql = "select * from reservatie where Tafelnummer='" . $this->Tafelnummer . "' and Datum ='" . $this->Datum . "';";
				return $db->conn->query($sql);

			}

			
		}
?>






















