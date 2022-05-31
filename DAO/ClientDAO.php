<?php

require_once 'tools/databaselinker.php';
require_once 'DTO/ClientDTO.php';





class ClientDAO{
    public static function InsertClient($nom, $prenom, $adresse, $password, $pseudo, $mail) {
    $bdd= DataBaseLinker::getConnexion();
    //include_once'pages/inscription/View_inscription.php';

    $reponse = $bdd->prepare('INSERT into client (nom, prenom, adresse,password,pseudo,mail,cagnotte,is_admin,is_ban) VALUES (?, ?, ?, ?, ?, ?, 150,0,0)');
    $reponse->execute(array($nom,$prenom,$adresse,(sha1($password)),$pseudo,$mail));
    $resulte = $reponse->fetch();
       /*
       if($resulte != null)
	   { 
           return true;
	   }
       else
       {
        return false;
       }
       */
      return true;
    }

public static function getclientByPseudo($pseudo, $password)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("SELECT * FROM client WHERE pseudo = ? AND password = ?");
        $state->bindParam(1, $pseudo);
        $state->bindParam(2, $password);
        $state->execute();
        $client = new ClientDTO();
        $lineResultat = $state->fetch();

        if (empty($lineResultat)) 
            {
                $client = null;
            }
        else
        {
            $client->setId_client($lineResultat['id_client']);
            $client->setNom($lineResultat['nom']);
            $client->setPrenom($lineResultat['prenom']);
            $client->setAdresse($lineResultat['adresse']);
            $client->setPassword($lineResultat['password']);
            $client->setPseudo($lineResultat['pseudo']);
            $client->setCagnotte($lineResultat['cagnotte']);
            $client->setIs_admin($lineResultat['is_admin']);
            $client->setIs_ban($lineResultat['is_ban']);
        }
        return $client;
    }



    public static function getclientById($id)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("SELECT * FROM client WHERE id_client = ?");
        $state->bindParam(1, $id);
        $state->execute();
        $client = new ClientDTO();
        $lineResultat = $state->fetch();

        if (empty($lineResultat)) 
            {
                $client = null;
            }
        else
        {
            $client->setId_client($lineResultat['id_client']);
            $client->setNom($lineResultat['nom']);
            $client->setPrenom($lineResultat['prenom']);
            $client->setAdresse($lineResultat['adresse']);
            $client->setPassword($lineResultat['password']);
            $client->setPseudo($lineResultat['pseudo']);
            $client->setMail($lineResultat['mail']);
            $client->setCagnotte($lineResultat['cagnotte']);
            $client->setIs_admin($lineResultat['is_admin']);
            $client->setIs_ban($lineResultat['is_ban']);
        }
        return $client;
    }
    public static function modif($nom, $prenom, $mdp, $adresse, $mail, $id_client)
    {
        $mdp = (sha1($mdp));
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("UPDATE client SET nom = ?, prenom = ?, password = ?, adresse = ?, mail = ? WHERE id_client = ?");
        $state->bindParam(1, $nom);
        $state->bindParam(2, $prenom);
        $state->bindParam(3, $mdp);
        $state->bindParam(4, $adresse);
        $state->bindParam(5, $mail);
        $state->bindParam(6, $id_client);
        $state->execute();
        //$reponse->execute(array($nom,$prenom,$adresse,(sha1($password)),$pseudo,$mail));
    }
    public static function getAllClient()
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("SELECT * FROM client");
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
                $client = new ClientDTO();
                $client->setId_client($lineResultat['id_client']);
                $client->setNom($lineResultat['nom']);
                $client->setPrenom($lineResultat['prenom']);
                $client->setAdresse($lineResultat['adresse']);
                $client->setPassword($lineResultat['password']);
                $client->setPseudo($lineResultat['pseudo']);
                $client->setCagnotte($lineResultat['cagnotte']);
                $client->setIs_admin($lineResultat['is_admin']);
                $client->setIs_ban($lineResultat['is_ban']);
                $tab[] = $client;
            }
        }
        return $tab;
    }



    public static function getAdmin($id)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("SELECT * FROM client WHERE id_client = ?");
        $state->bindParam(1, $id);
        $state->execute();
        $admin = new ClientDTO();
        $lineResultat = $state->fetch();
        
        if (empty($lineResultat)) 
        {
            $admin = null;
        }
        else
        {
            $admin->setId_client($lineResultat['id_client']);
            $admin->setNom($lineResultat['nom']);
            $admin->setPrenom($lineResultat['prenom']);
            $admin->setAdresse($lineResultat['adresse']);
            $admin->setPassword($lineResultat['password']);
            $admin->setPseudo($lineResultat['pseudo']);
            $admin->setCagnotte($lineResultat['cagnotte']);
            $admin->setIs_admin($lineResultat['is_admin']);

        }
    return $admin;
    }
    public static function banUserByPseudo($pseudo)
    {
        $test = 1;
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("UPDATE client SET is_ban = ? WHERE pseudo = ?");
        $state->bindParam(1, $test);
        $state->bindParam(2, $pseudo);
        $state->execute();
    }
    public static function debanUserByPseudo($pseudo)
    {
        $test = 0;
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("UPDATE client SET is_ban = ? WHERE pseudo = ?");
        $state->bindParam(1, $test);
        $state->bindParam(2, $pseudo);
        $state->execute();
    }

    public static function removeCagnotte($id_client, $montant_restant)
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("UPDATE client SET cagnotte = ? WHERE id_client = ?");
        $state->bindParam(1, $montant_restant);
        $state->bindParam(2, $id_client);
        $state->execute();
    }

}


