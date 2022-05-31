<?php

class ProduitDTO
{
	private $id_produit;
	private $nom_produit;
	private $prix;
	private $stock;
	private $image;

	public function getImage()
	{
		return $this->image;
	}

	public function setImage($image)
	{
		$this->image = $image;

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

	/**
	 * Get the value of nom_produit
	 */ 
	public function getNom_produit()
	{
		return $this->nom_produit;
	}

	/**
	 * Set the value of nom_produit
	 *
	 * @return  self
	 */ 
	public function setNom_produit($nom_produit)
	{
		$this->nom_produit = $nom_produit;

		return $this;
	}

	/**
	 * Get the value of prix
	 */ 
	public function getPrix()
	{
		return $this->prix;
	}

	/**
	 * Set the value of prix
	 *
	 * @return  self
	 */ 
	public function setPrix($prix)
	{
		$this->prix = $prix;

		return $this;
	}

	/**
	 * Get the value of stock
	 */ 
	public function getStock()
	{
		return $this->stock;
	}

	/**
	 * Set the value of stock
	 *
	 * @return  self
	 */ 
	public function setStock($stock)
	{
		$this->stock = $stock;

		return $this;
	}
}
?>
