
<?phpinclude_once('db.php');?>

<?php
class Tafel
{
	private $m_sNummer; 	//s ipv i want cijfers en/of letters	
	private $m_iPersonen;
	private $m_sOpmerkingen;	
	public function __set($p_sProperty, $p_vValue)
	{
		switch($p_sProperty)
		{
			case "nummer":
			$this->m_sNummer = $p_vValue;
				break;

			case "personen":
				$this->m_iPersonen = $p_vValue;
				break;

			case "opm":
				$this->m_snieuwMenuDetails = $p_vValue;
				break;
		}	   
	}
	
	public function __get($p_sProperty)
	{
		$vResult = null;
		switch($p_sProperty)
		{
			case "tafelnr": 
				$vResult = $this->m_sNummer;
				break;

			case "personen": 
				$vResult = $this->m_iPersonen;
				break;

			case "opm": 
				$vResult = $this->m_snieuwMenuDetails;
				break;
		}
		return $vResult;
	}

	public function Save()
	{
		$db = new Db();
		$sql = "INSERT INTO tafelbeheer (Tafelnummer, MaxPersonen, Opmerkingen) 
		VALUES ('".	$db->conn->real_escape_string($this->tafelnr)."',
					'".	$db->conn->real_escape_string($this->personen)."',
					'".	$db->conn->real_escape_string($this->opm)."')";
		return $db->conn->query($sql);
		
	}
	

	
	catch (Exception $e) 
	{
		$feedback = $e->getMessage();
	}


	public function Edit()
	{
		$db = new Db();
		$sql = "UPDATE nieuwMenu 
				SET (
					Naam = '".$db->conn->real_escape_string($this->naam)."',
					Details = '".$db->conn->real_escape_string($this->details)."',
					Prijs = '".$db->conn->real_escape_string($this->prijs)."') 
					WHERE id = '".$this->id."'";	

		return $db->conn->query($sql);

	}

	public function Delete()
	{
		$db = new Db();
		$sql = "DELETE FROM 'restoapp'.'tafelbeheer'
				WHERE `tafelbeheer`.`tafelnummer` = '".$this->nummer."'
				";
		return $db->conn->query($sql);
	}
	
}



?>