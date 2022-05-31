<?php


require('DAO/ClientDAO.php');

class ControllerConnexion
{
	public static function includeView()
	{
		require_once('pages/header/header.php');
		require_once('view_connexion.php');
		require_once('pages/header/footer.php');
	}
	// return true si le client existe en bdd
	public static function authenticate($pseudo, $password)
	{
		$bool = false;
		$client = clientDAO::getClientByPseudo($pseudo, $password);
		if ($client != null)
		{
			if ($client->getIs_ban() == 1)
			{
				$_SESSION['is_ban'] = true;
			}
			else
			{
				$_SESSION["id_client"] = $client->getId_client();
				$_SESSION["panier"] = array();
				$admin = clientDAO::getAdmin($_SESSION["id_client"]);
				if ($admin->getIs_admin() == 1)
				{
					$_SESSION["is_admin"] = $client->getIs_admin();
				}
			}
			$bool = true;
		}
		return $bool;
	}
	public static function isBan($id)
	{
		$bool = false;

		$user = ClientDAO::getclientById($id);
		$is_ban = $user->getIs_ban();
		if ($is_ban == 1)
		{
			$bool = true;
		}
		return $bool;
	}

	public static function redirectUser()
	{
		header('Location: index.php?page=accueil');
	}
	public static function redirectUser_ban()
	{
		header('Location: index.php?page=connexion&error=ban');
	}
	public static function redirectUser_syntaxe()
	{
		header('Location: index.php?page=connexion&error=syntaxe');
	}
}


?>