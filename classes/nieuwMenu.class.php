<?php

include_once('db.php');

class nieuwMenu
{
	private $m_snieuwMenu;	
	private $m_snieuwMenuDetails;
	private $m_inieuwMenuPrijs;	
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

			case "prijs":
				$this->m_inieuwMenuPrijs = $p_vValue;
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

			case "prijs": 
				$vResult = $this->m_inieuwMenuPrijs;
				break;
		}
		return $vResult;
	}

	public function Save()
	{
		$db = new Db();
		$sql = "INSERT INTO nieuwMenu(Naam,Details,prijs) 
				VALUES (
					'".	$db->conn->real_escape_string($this->naam)."',
					'".	$db->conn->real_escape_string($this->details)."',
					'".	$db->conn->real_escape_string($this->prijs)."'
					)";	
		$db->conn->query($sql);
		
		//print_r($sql);
	}

	public function getAll()
	{

		$db = new Db();
		$sql = "select * from nieuwMenu";
    	return $db->conn->query($sql);
	}

	public function getGerecht()
	{

		$db = new Db();
		$sql = "select * from nieuwMenu where Naam =";
    	return $db->conn->query($sql);
	}
}



?>