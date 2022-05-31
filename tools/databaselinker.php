<?php

class DataBaseLinker{
 private static $dsn = 'mysql:host=192.168.153.10;dbname=202122_base02_ggiraudet';
 private static $user = 'ggiraudet';
 private static $password = 'btssio';
 private static $bdd = null;

 public static function getConnexion()
	{
		if (DataBaseLinker::$bdd==null)
		{
			DataBaseLinker::$bdd = new PDO(DataBaseLinker::$dsn,DataBaseLinker::$user,DataBaseLinker::$password); 
		}
		return DataBaseLinker::$bdd;
	}


    
     
}

?>