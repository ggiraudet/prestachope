<?php

class PossederDTO
{
	private $id_categorie;
	private $id_produit;


	

	/**
	 * Get the value of id_categorie
	 */ 
	public function getId_categorie()
	{
		return $this->id_categorie;
	}

	/**
	 * Set the value of id_categorie
	 *
	 * @return  self
	 */ 
	public function setId_categorie($id_categorie)
	{
		$this->id_categorie = $id_categorie;

		return $this;
	}

	/**
	 * Get the value of id_produit
	 */ 
	public function getId_produit()
	{
		return $this->id_produit;
	}

	/**
	 * Set the value of id_produit
	 *
	 * @return  self
	 */ 
	public function setId_produit($id_produit)
	{
		$this->id_produit = $id_produit;

		return $this;
	}
}
?>
