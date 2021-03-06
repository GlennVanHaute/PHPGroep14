
<?php

include_once('db.class.php');

class Tafel
{
	private $m_iid;
	private $m_sNummer; 	//s ipv i want cijfers en/of letters	
	private $m_iPersonen;
	private $m_sOpmerkingen;	

	public function __set($p_sProperty, $p_vValue)
	{
		switch($p_sProperty)
		{
			case "id":
				$this->m_iid = $p_vValue;
				break;

			case "nummer":
				$this->m_sNummer = $p_vValue;
				break;

			case "personen":
				$this->m_iPersonen = $p_vValue;
				break;

			case "opm":
				$this->m_sOpmerkingen = $p_vValue;
				break;
		}	   
	}
	
	public function __get($p_sProperty)
	{
		$vResult = null;
		switch($p_sProperty)
		{
			case "id": 
				$vResult = $this->m_iid;
				break;

			case "nummer": 
				$vResult = $this->m_sNummer;
				break;

			case "personen": 
				$vResult = $this->m_iPersonen;
				break;

			case "opm": 
				$vResult = $this->m_sOpmerkingen;
				break;
		}
		return $vResult;
	}

	public function Save()
	{
		$db = new Database();
		$sql = "INSERT INTO tafelbeheer (Tafelnummer, MaxPersonen, Opmerkingen) 
		VALUES (
			'".	$db->conn->real_escape_string($this->nummer)."',
			'".	$db->conn->real_escape_string($this->personen)."',
			'".	$db->conn->real_escape_string($this->opm)."')";

		return $db->conn->query($sql);
	}

	public function Edit()
	{
		$db = new Database();
		$sql = "UPDATE tafelbeheer
				SET 
					Tafelnummer = '".$db->conn->real_escape_string($this->nummer)."',
					MaxPersonen = '".$db->conn->real_escape_string($this->personen)."',
					Opmerkingen = '".$db->conn->real_escape_string($this->opm)."'
					WHERE Tafelnummer = '".$this->nummer."'";	

		$db->conn->query($sql);
		
	}

	public function Delete()
	{
		$db = new Database();
		$sql = "DELETE FROM tafelbeheer
				WHERE Tafelnummer = '".$this->nummer."'
				";
		return $db->conn->query($sql);
	}

	public function GetAll()
	{
		$db = new Database();
		$sql = "select * from tafelbeheer order by Tafelnummer";
    	return $db->conn->query($sql);
	}

	public function CheckAantal()
	{
		$db = new Database();
		$sql = "select * from tafelbeheer where MaxPersonen ='" . $this->personen . "' order by Tafelnummer;";
		return $result = $db->conn->query($sql);

		 //$check = mysqli_query($db->conn,$sql);
	}

	public function CheckAantalHoger()
	{
		$db = new Database();
		$sql = "select * from tafelbeheer where MaxPersonen >'" . $this->personen . "' order by Tafelnummer;";
		
		return $db->conn->query($sql);
	}

	
}



?>