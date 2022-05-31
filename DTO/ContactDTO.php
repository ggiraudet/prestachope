<?php

class ContactDTO
{
	private $id_contact;
	private $sujet;
	private $contenu;
	private $date;
	private $id_client;


	

	/**
	 * Get the value of id_contact
	 */ 
	public function getId_contact()
	{
		return $this->id_contact;
	}

	/**
	 * Set the value of id_contact
	 *
	 * @return  self
	 */ 
	public function setId_contact($id_contact)
	{
		$this->id_contact = $id_contact;

		return $this;
	}

	/**
	 * Get the value of contenu
	 */ 
	public function getContenu()
	{
		return $this->contenu;
	}

	/**
	 * Set the value of contenu
	 *
	 * @return  self
	 */ 
	public function setContenu($contenu)
	{
		$this->contenu = $contenu;

		return $this;
	}

	/**
	 * Get the value of date
	 */ 
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * Set the value of date
	 *
	 * @return  self
	 */ 
	public function setDate($date)
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * Get the value of id_client
	 */ 
	public function getId_client()
	{
		return $this->id_client;
	}

	/**
	 * Set the value of id_client
	 *
	 * @return  self
	 */ 
	public function setId_client($id_client)
	{
		$this->id_client = $id_client;

		return $this;
	}

	/**
	 * Get the value of sujet
	 */ 
	public function getSujet()
	{
		return $this->sujet;
	}

	/**
	 * Set the value of sujet
	 *
	 * @return  self
	 */ 
	public function setSujet($sujet)
	{
		$this->sujet = $sujet;

		return $this;
	}
}
?>
