<?php

require_once 'tools/databaselinker.php';
require_once 'DTO/ContactDTO.php';

class ContactDAO{
    public static function InsertContact($sujet, $contenu) 
    {
    $bdd= DataBaseLinker::getConnexion();
    //include_once'pages/inscription/View_inscription.php';

    $reponse = $bdd->prepare('INSERT into contact (sujet, contenu, date,id_client) VALUES (?, ?, CURRENT_TIMESTAMP, ?)');
    $reponse->execute(array($sujet,$contenu,$_SESSION["id_client"]));
    $resulte = $reponse->fetch();
    $reponse->execute();
    }

    public static function getAllContact()
    {
        $connex = DatabaseLinker::getConnexion();
        $state = $connex->prepare("SELECT * FROM contact");
        $state->execute();
        $resultats = $state->fetchAll();
        $tab_contact = [];
        if (empty($resultats)) 
            {
                $tab_contact = null;
            }
        else
        {
            foreach ($resultats as $lineResultat)
            {
                $contact = new ContactDTO();
                $contact->setId_contact($lineResultat['id_contact']);
                $contact->setSujet($lineResultat['sujet']);
                $contact->setContenu($lineResultat['contenu']);
                $contact->setDate($lineResultat['date']);
                $contact->setId_client($lineResultat['id_client']);
                $tab_contact[] = $contact;
            }
        }
        return $tab_contact;
    }

    

}

