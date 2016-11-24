<?php
class contact
{

	private $_MESSAGE;
	private $_DATE;
	private $_ID_UTILISATEUR;

	public function MESSAGE()
	{
		return $this->_MESSAGE;
	}
	
	public function DATE()
	{
		return $this->_DATE;
	}
	
	public function ID_UTILISATEUR()
	{
		return $this->_ID_UTILISATEUR;
	}
		
	// setters
	

	public function setMESSAGE($value)
	{
		$this->_MESSAGE = htmlspecialchars($value);
	}
	
	public function setDATE($value)
	{
		$this->_DATE = $value;
	}
	
	public function setID_UTILISATEUR($utilisateur)
	{
		$this->_ID_UTILISATEUR = $utilisateur;
	}
	
		
	function hydrate(array $donnees)
	{
		foreach($donnees as $key => $value)
		{
			$method = 'set'.$key;
			if(method_exists($this,$method))
			{
				$this->$method($value);
			}
			
		}
	}
	
	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}


	


	
}


?>
