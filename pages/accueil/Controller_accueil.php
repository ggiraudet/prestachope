<?php

class ControllerAccueil
{
	
	public function includeView()
	{
		require_once('pages/header/header.php');
		require_once('view_accueil.php');
		require_once('pages/header/footer.php');
	}

}
?>