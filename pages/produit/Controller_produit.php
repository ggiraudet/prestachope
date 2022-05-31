<?php

require('DAO/ProduitDAO.php');

class ControllerProduit
{
	public static function includeView()
	{
		require_once('pages/header/header.php');
		require_once('view_produit.php');
		require_once('pages/header/footer.php');
	}

	public static function redirectUser()
	{
		header('Location: index.php?page=panier');
	}
	public static function redirectUserAccueil()
	{
		header('Location: index.php?page=accueil');
	}

	public static function get_Produits()
	{
		$produit = ProduitDAO::getAllProduits();
		return $produit;
	}
	//Le panier possede l'id du produit dans la premiere colonne, et la quantite dans la seconde
	public static function get_last_index()
	{
		$cpt = 0;
		if (!isset($_SESSION['panier']))
		{
			$_SESSION["panier"] = array();
		}
		foreach ($_SESSION['panier'] as $ligne)
		{
			$cpt = $cpt + 1;
		}
		return $cpt;
	}

	public static function add_produit_panier($id_produit, $quantite)
	{
		if (!isset($_SESSION['panier']))
		{
			$_SESSION["panier"] = array();
		}
		$last_index = self::get_last_index();
		$_SESSION['panier'][$last_index] = array($id_produit, $quantite);
	}

}

?>