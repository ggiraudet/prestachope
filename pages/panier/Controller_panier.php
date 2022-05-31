<?php

require('DAO/CommandeDAO.php');
require('DAO/ProduitDAO.php');
require('DAO/ClientDAO.php');
require('DAO/EntrepriseDAO.php');

class ControllerPanier
{

	
	public static function includeView()
	{
		require_once('pages/header/header.php');
		require_once('view_panier.php');
		require_once('pages/header/footer.php');
	}
	

	public static function get_prix($id_produit)
	{
		$produit = ProduitDAO::getProduitById($id_produit);
		$prix = $produit->getPrix();
		return $prix;
	}

	public static function get_nom_produit($id_produit)
	{
		$produit = ProduitDAO::getProduitById($id_produit);
		$nom = $produit->getNom_produit();
		return $nom;
	}

	public static function get_cagnotte($id)
	{
		$client = ClientDAO::getclientById($id);
		$cagnotte = $client->getCagnotte();
		return $cagnotte;
	}

	public static function create_commande($prix_commande)
	{
		$insert_commande = CommandeDAO::createCommande($prix_commande);
	}

	public static function remove_cagnotte($id_client, $prix_commande)
	{
		$client = ClientDAO::getclientById($id_client);
		$montant = $client->getCagnotte();
		$montant_restant = $montant - $prix_commande;
		$remove = ClientDAO::removeCagnotte($id_client, $montant_restant);
	}

	public static function add_tresorerie($prix_commande)
	{
		$ent = EntrepriseDAO::getEntreprise();
		$montant = $ent->getTresorerie();
		$montant_total = $montant + $prix_commande;
		$add = EntrepriseDAO::addTresorerie($montant_total);
	}

	public static function delete_produit_panier($id_produit)
	{
		$cpt = 0;
		foreach ($_SESSION['panier'] as $ligne)
		{
			foreach ($ligne as $colonne)
			{
				if ($ligne[0] == $id_produit)
				{
					unset($_SESSION['panier'][$cpt]);
				}
			}
			$cpt = $cpt + 1;
		}
	}
	public static function delete_all_panier()
	{
		unset($_SESSION['panier']);
	}
	
	public static function redirectUser()
	{
		header('Location: index.php?page=panier');
	}
	public static function redirectUserAccueil()
	{
		header('Location: index.php?page=accueil');
	}
	public static function redirectUserCommande()
	{
		header('Location: index.php?page=panier&valid=1');
	}
}


?>