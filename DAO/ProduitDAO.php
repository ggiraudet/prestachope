<?php

require_once 'tools/databaselinker.php';
require_once 'DTO/ProduitDTO.php';

class ProduitDAO{
    public function GetProduit() 
    {
    $bdd= DataBaseLinker::getConnexion();
    $reponse = $bdd->prepare('Select * from produit');
    $reponse->execute(array());
    $resulte = $reponse->fetchAll();
    return $resulte;
    }

    public static function getAllProduits()
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("SELECT * FROM produit");
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
                $produit = new ProduitDTO();
                $produit->setId_produit($lineResultat['id_produit']);
                $produit->setNom_produit($lineResultat['nom_produit']);
                $produit->setPrix($lineResultat['prix']);
                $produit->setStock($lineResultat['stock']);
                $produit->setImage($lineResultat['image']);
                $tab[] = $produit;
            }
        }
        return $tab;
    }
    public static function getProduitById($id_produit)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("SELECT * FROM produit WHERE id_produit = ?");
        $state->bindParam(1, $id_produit);
        $state->execute();
        $produit = new ProduitDTO();
        $lineResultat = $state->fetch();

        if (empty($lineResultat)) 
            {
                $client = null;
            }
        else
        {
                $produit->setId_produit($lineResultat['id_produit']);
                $produit->setNom_produit($lineResultat['nom_produit']);
                $produit->setPrix($lineResultat['prix']);
                $produit->setStock($lineResultat['stock']);
                $produit->setImage($lineResultat['image']);
        }
        return $produit;
    }
    public static function updateProduit($content, $value, $id)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("UPDATE produit SET $value = ? WHERE id_produit = ?");
        $state->bindParam(1, $content);
        $state->bindParam(2, $id);
        $state->execute();
    }
    public static function deleteProduit($id_produit)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("DELETE FROM produit WHERE id_produit = ?");
        $state->bindParam(1, $id_produit);
        $state->execute();
    }
    public static function creaProduit($nom, $prix, $stock, $id, $url)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("INSERT into produit (nom_produit, prix, stock, image) VALUES (?, ?, ?, ?)");
        $state->bindParam(1, $nom);
        $state->bindParam(2, $prix);
        $state->bindParam(3, $stock);
        $state->bindParam(4, $url);
        $state->execute();
    }




    public function CreateProduit($nom_produit,$prix,$stock, $url)
    {
	 	$bdd= DataBaseLinker::getConnexion();
	    $reponse = $bdd->prepare('INSERT into produit (nom_produit,prix,stock,image) VALUES (?, ?, ?, ?)');
	    $reponse->execute(array($nom_produit,$prix,$stock,$url));
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
   public static function updateImage($url, $id_produit)
   {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("UPDATE produit SET image = ? WHERE id_produit = ?");
        $state->bindParam(1, $url);
        $state->bindParam(2, $id_produit);
        $state->execute();
   }
    
    
    
}
?>