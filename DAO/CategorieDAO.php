<?php

require_once 'tools/databaselinker.php';
require_once 'DTO/CategorieDTO.php';

class CategorieDAO{

    public static function getAllCat()
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("SELECT * FROM categorie");
        $state->execute();
        $resultats = $state->fetchAll();
        $tab = [];
        if (empty($resultats)) 
            {
                $tab = null;
            }
        else
        {
            foreach ($resultats as $lineResultat)
            {
                $cat = new CategorieDTO();
                $cat->setId_categorie($lineResultat['id_categorie']);
                $cat->setNom_categorie($lineResultat['nom_categorie']);
                $tab[] = $cat;
            }
        }
        return $tab;
    }
    public static function updateCat($nom, $id_cat)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("UPDATE categorie SET nom_categorie = ? WHERE id_categorie = ?");
        $state->bindParam(1, $nom);
        $state->bindParam(2, $id_cat);
        $state->execute();
    }
    public static function deleteCat($id_cat)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("DELETE FROM categorie WHERE id_categorie = ?");
        $state->bindParam(1, $id_cat);
        $state->execute();
    }
    public static function creaCat($nom_cat_new)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("INSERT into categorie (nom_categorie) VALUES (?)");
        $state->bindParam(1, $nom_cat_new);
        $state->execute();
    }




    public function CreateProduit($nom_produit,$prix,$stock)
    {
	 	$bdd= DataBaseLinker::getConnexion();
	    $reponse = $bdd->prepare('INSERT into produit (nom_produit,prix,stock) VALUES (?, ?, ?)');
	    $reponse->execute(array($nom_produit,$prix,$stock));
	    $resulte = $reponse->fetch();
		return $resulte;
    }

    public function ModifyProduit($nom_produit,$prix,$stock)
    {
    	$bdd= DataBaseLinker::getConnexion();
	    $reponse = $bdd->prepare('UPDATE produit SET nom_produit =$nom_produit,prix=$prix,stock=$stock');
	    $reponse->execute(array($nom_produit,$prix,$stock));
	    $resulte = $reponse->fetch();
	    return $resulte;
    }
    
    public function DeleteProduitbyId($id)
   {
   		$bdd= DataBaseLinker::getConnexion();
   		$id = $_GET['id'];
	    $reponse = $bdd->prepare("DELETE FROM produit Where id='?'");
	    $reponse->execute(array($id));
	    $resulte = $reponse->fetch();
		return $resulte;
   }
    
    
    
}
?>