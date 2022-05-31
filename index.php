<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>PrestaChop!</title>		
	</head>
	<body>
        <?php
         error_reporting(E_ALL);
         ini_set('display_errors', 'On');
        session_name("prestachop");
        session_start();
        require("/home/SIO/ggiraudet/public_html/prestachop/tools/databaselinker.php");
        DataBaseLinker::getConnexion();

        include_once("/home/SIO/ggiraudet/public_html/prestachop/tools/supercontroller.php");
        include_once("/home/SIO/ggiraudet/public_html/prestachop/tools/databaselinker.php");

        $page = "accueil";
        if (!empty($_GET["page"]))
        {
            $page = $_GET["page"];
        }
        SuperController::callPage($page);

        ?>
    </body>
</html>




