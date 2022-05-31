<?php


require('DAO/ContactDAO.php');
require('DAO/ClientDAO.php');
require('DAO/ProduitDAO.php');
require('DAO/CategorieDAO.php');
require('DAO/EntrepriseDAO.php');

class ControllerAdmin
{
	public static function includeView($admin_page)
	{
		require_once('pages/header/header.php');
		if ($admin_page == "admin_messages")
		{
			require_once('view_admin_messages.php');
		}
		elseif ($admin_page == "admin_ban")
		{
			require_once('view_admin_ban.php');
		}
		elseif ($admin_page == "admin_produit")
		{
			require_once('view_admin_produit.php');
		}
		elseif ($admin_page == "admin_categorie")
		{
			require_once('view_admin_categorie.php');
		}
		elseif ($admin_page == "admin")
		{
			require_once('view_admin.php');
		}
		//require_once('view_admin.php');
		require_once('pages/header/footer.php');
	}
	// return true si le client est admin
	public static function is_admin($id)
	{
		$bool = false;
		$admin = clientDAO::getAdmin($id);

		if ($admin->getIs_admin() == 1)
		{
			$bool = true;
		}
		return $bool;
	}
	
	public static function get_all_contact()
	{
		$tab_contact = ContactDAO::getAllContact();
		return $tab_contact;
	}

	//en rapport avec les clients
	public static function getNomAuteur($id)
	{
		$nom = ClientDAO::getclientById($id);
		$nom = $nom->getPseudo();
		return $nom;
	}
	public static function get_all_client()
	{
		$tab_client = ClientDAO::getAllClient();
		return $tab_client;
	}
	public static function ban_user_by_pseudo($pseudo)
	{
		$ban = ClientDAO::banUserByPseudo($pseudo);
	}
	public static function deban_user_by_pseudo($pseudo)
	{
		$deban = ClientDAO::debanUserByPseudo($pseudo);
	}

	// en rapport avec les produits
	public static function get_all_produit()
	{
		$tab_produit = ProduitDAO::getAllProduits();
		return $tab_produit;
	}
	public static function update_produit($content, $value, $id)
	{
		$update = ProduitDAO::updateProduit($content, $value, $id);
	}
	public static function delete_produit($id_produit)
	{
		$suppr = ProduitDAO::deleteProduit($id_produit);
	}
	public static function crea_produit($nom, $prix, $stock, $id, $file)
	{
		$extension = pathinfo($file['name'], PATHINFO_EXTENSION);	
		$extensionsAutorisees = array('jpg', 'jpeg', 'png');
		
		if (in_array($extension, $extensionsAutorisees))
		{
			if (move_uploaded_file($file['tmp_name'], 'images/' . $file['name']))
			{
				$path = "images/";
				$url = $path.$file['name'];
			}
		}
		$crea = ProduitDAO::creaProduit($nom, $prix, $stock, $id, $url);
	}

	// en rapport avec les catégories
	public static function get_all_cat()
	{
		$tab_cat = CategorieDAO::getAllCat();
		return $tab_cat;
	}
	public static function update_cat($nom, $id_cat)
	{
		$update = CategorieDAO::updateCat($nom, $id_cat);
	}
	public static function delete_cat($id_cat)
	{
		$delete = CategorieDAO::deleteCat($id_cat);
	}
	public static function crea_cat($nom_cat_new)
	{
		$crea = CategorieDAO::creaCat($nom_cat_new);
	}

	public static function redirectUser()
	{
		header('Location: index.php?page=accueil');
	}
	public static function redirectUser_ban($url)
	{
		header('Location:index.php?page=admin&admin='.$url);
	}

	public static function update_image($file, $id_produit)
	{
		$extension = pathinfo($file['name'], PATHINFO_EXTENSION);	
		$extensionsAutorisees = array('jpg', 'jpeg', 'png');
		
		if (in_array($extension, $extensionsAutorisees))
		{
			if (move_uploaded_file($file['tmp_name'], 'images/' . $file['name']))
			{
				$path = "images/";
				$url = $path.$file['name'];
				ProduitDAO::updateImage($url, $id_produit);
			}
		}
	}
	public static function get_tresorerie()
	{
		$ent = EntrepriseDAO::getEntreprise();
		$get = $ent->getTresorerie();
		return $get;
	}
}


?>