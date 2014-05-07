<?php
		
include_once ("classes/db.php");
		class Reservatie
		{
			private $m_sPersoon;
			private $m_iHoeveel;
			private $m_sDatum;
			private $m_sTijdstip;
			

			public function __set($p_sProperty,$p_vValue)
			{
				switch ($p_sProperty) 
				{
					case 'Persoon':
						$this->m_sPersoon = $p_vValue;
						break;
					case 'Hoeveel':
						$this->m_iHoeveel = $p_vValue;
						break;
					case 'Datum':
						$this->m_sDatum = $p_vValue;
						break;
					case 'Tijdstip':
						$this->m_sTijdstip = $p_vValue;
						break;
				}

			}


			public function __get($p_sProperty)
			{
				switch ($p_sProperty) 
				{
					case 'Persoon':
						return $this->m_sPersoon;
						break;
					case 'Hoeveel':
						return $this->m_iHoeveel;
						break;
					case 'Datum':
						return $this->m_sDatum;
						break;
					case 'Tijdstip':
						return $this->m_sTijdstip;
						break;
				}
			}

			public function __toString()
			{
				$result = "<p>" . $this->m_sPersoon . " " . $this->m_iHoeveel . " " . $this->m_sDatum . " " . $this->m_sTijdstip . "</p>";
				return	$result;
			}

			public function Save()
			{
				include_once("Db.class.php");
				$db = new Db();
				$sql = "insert into tblreservatie (Persoon, Hoeveel, Datum, Tijdstip)
							values(
								'". $this->m_sPersoon ."',
								'". $this->m_iHoeveel ."',
								'". $this->m_sDatum ."',
								'". $this->m_sTijdstip ."'
								)";
				$db->conn->query($sql);
				//echo "query is : " . "</br>" . $sql;
			}
		}
?>