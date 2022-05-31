<?php

require('DAO/ClientDAO.php');

class ControllerModif_profil
{
	public static function includeView()
	{
		require_once('pages/header/header.php');
		require_once('view_profil.php');
		require_once('pages/header/footer.php');
	}
	
	public static function modifprofil($nom, $prenom, $mdp, $adresses, $mail, $id_client)
	{
		 ClientDAO::modif($nom, $prenom, $mdp, $adresses, $mail, $id_client);
	}
	
	public static function redirectUser()
	{
		header('Location: index.php?page=accueil');
	}

	public static function get_client($id){
		$client = ClientDAO::getclientById($id);
		return $client;
	}
}


?>