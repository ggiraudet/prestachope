<?php

class CategorieDTO
{
	private $id_categorie;
	private $nom_categorie;

	public function getId_categorie()
	{
		return $this->id_categorie;
	}

	public function setId_categorie($id_categorie)
	{
		$this->id_categorie = $id_categorie;

		return $this;
	}

	public function getNom_categorie()
	{
		return $this->nom_categorie;
	}


	public function setNom_categorie($nom_categorie)
	{
		$this->nom_categorie = $nom_categorie;

		return $this;
	}
}
?>
