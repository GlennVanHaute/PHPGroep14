<?php
class nieuwMenu
{
	private $m_snieuwMenu;	
	public function __set($p_sProperty, $p_vValue)
	{
		switch($p_sProperty)
		{
			case "naam":
				$this->m_snieuwMenu = $p_vValue;
				break;

			case "details":
				$this->m_snieuwMenuDetails = $p_vValue;
				break;
		}	   
	}
	
	public function __get($p_sProperty)
	{
		$vResult = null;
		switch($p_sProperty)
		{
			case "naam": 
				$vResult = $this->m_snieuwMenu;
				break;

			case "details": 
				$vResult = $this->m_snieuwMenuDetails;
				break;
		}
		return $vResult;
	}

	public function Save()
	{

		include_once('db.php');
		$db = new Db();
		$sql = "INSERT INTO nieuwMenu(Naam, Details) 
				VALUES (
					'".	$db->conn->real_escape_string($this->Naam)."',
					'".	$db->conn->real_escape_string($this->Details)."'
					)";	
		$db->conn->query($sql);
	}
}

?>