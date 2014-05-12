<?php

include_once('db.class.php');

class nieuwMenu
{
	private $m_iid;
	private $m_snieuwMenu;	
	private $m_snieuwMenuDetails;
	private $m_inieuwMenuPrijs;	
	
	public function __set($p_sProperty, $p_vValue)
	{
		switch($p_sProperty)
		{
			case "id":
			$this->m_iid = $p_vValue;
				break;

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
			case "id": 
				$vResult = $this->m_iid;
				break;

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
		$db = new Database();
		$sql = "INSERT INTO nieuwMenu(Naam,Details,Prijs) 
				VALUES (
					'".	$db->conn->real_escape_string($this->naam)."',
					'".	$db->conn->real_escape_string($this->details)."',
					'".	$db->conn->real_escape_string($this->prijs)."')";		
		
		
		return $db->conn->query($sql);
	}

	public function getAll()
	{

		$db = new Database();
		$sql = "select * from nieuwMenu";
    	return $db->conn->query($sql);
	}

	public function Update()
	{
		$db = new Database();
		// UPDATE `nieuwMenu` 
		// SET 
		// `Naam`=[value-2],
		// `Details`=[value-3],
		// `Prijs`=[value-4] WHERE 
		// 'id'=

		$sql = "UPDATE nieuwMenu 
				SET 
					Naam = '".$db->conn->real_escape_string($this->naam)."',
					Details = '".$db->conn->real_escape_string($this->details)."',
					Prijs = '".$db->conn->real_escape_string($this->prijs)."'
					WHERE id = '".$this->id."'";	

		$db->conn->query($sql);

	}

	public function Delete()
	{
		$db = new Databank();
		$sql = "DELETE FROM nieuwMenu
				WHERE id = '".$this->id."'
				";
		$db->conn->query($sql);
	}

	public function Check()
		{
			$db = new databank();
			$sql = "SELECT * FROM nieuwMenu WHERE Naam = '".$this->naam."';";
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