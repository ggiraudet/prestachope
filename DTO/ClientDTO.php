<?php

class ClientDTO
{
	private $id_client;
	private $nom;
	private $prenom;
	private $adresse;
	private $password;
	private $pseudo;
	private $mail;
	private $cagnotte;
	private $is_admin;
	private $is_ban;

	

	public function getId_client()
	{
		return $this->id_client;
	}

	public function setId_client($id_client)
	{
		$this->id_client = $id_client;

		return $this;
	}

	/**
	 * Get the value of nom
	 */ 
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * Set the value of nom
	 *
	 * @return  self
	 */ 
	public function setNom($nom)
	{
		$this->nom = $nom;

		return $this;
	}

	/**
	 * Get the value of prenom
	 */ 
	public function getPrenom()
	{
		return $this->prenom;
	}

	/**
	 * Set the value of prenom
	 *
	 * @return  self
	 */ 
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;

		return $this;
	}

	/**
	 * Get the value of adresse
	 */ 
	public function getAdresse()
	{
		return $this->adresse;
	}

	/**
	 * Set the value of adresse
	 *
	 * @return  self
	 */ 
	public function setAdresse($adresse)
	{
		$this->adresse = $adresse;

		return $this;
	}

	/**
	 * Get the value of password
	 */ 
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set the value of password
	 *
	 * @return  self
	 */ 
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Get the value of pseudo
	 */ 
	public function getPseudo()
	{
		return $this->pseudo;
	}

	/**
	 * Set the value of pseudo
	 *
	 * @return  self
	 */ 
	public function setPseudo($pseudo)
	{
		$this->pseudo = $pseudo;

		return $this;
	}

	/**
	 * Get the value of cagnotte
	 */ 
	public function getCagnotte()
	{
		return $this->cagnotte;
	}

	/**
	 * Set the value of cagnotte
	 *
	 * @return  self
	 */ 
	public function setCagnotte($cagnotte)
	{
		$this->cagnotte = $cagnotte;

		return $this;
	}

	/**
	 * Get the value of is_admin
	 */ 
	public function getIs_admin()
	{
		return $this->is_admin;
	}

	/**
	 * Set the value of is_admin
	 *
	 * @return  self
	 */ 
	public function setIs_admin($is_admin)
	{
		$this->is_admin = $is_admin;

		return $this;
	}

	/**
	 * Get the value of mail
	 */ 
	public function getMail()
	{
		return $this->mail;
	}

	/**
	 * Set the value of mail
	 *
	 * @return  self
	 */ 
	public function setMail($mail)
	{
		$this->mail = $mail;

		return $this;
	}

	/**
	 * Get the value of is_ban
	 */ 
	public function getIs_ban()
	{
		return $this->is_ban;
	}

	/**
	 * Set the value of is_ban
	 *
	 * @return  self
	 */ 
	public function setIs_ban($is_ban)
	{
		$this->is_ban = $is_ban;

		return $this;
	}
}
?>
