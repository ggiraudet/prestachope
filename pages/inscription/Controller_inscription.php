<?php
require ('DAO/ClientDAO.php');
class ControllerInscription{
    

    public function includeView(){
        require_once('pages/header/header.php');
		require_once('view_inscription.php');
		require_once('pages/header/footer.php');
    }
    public function redirectUser(){
        header('Location: index.php?page=connexion');
    }

    public function InsertClient($nom, $prenom, $adresse, $password, $pseudo, $mail){
    	$insert = ClientDAO::InsertClient($nom, $prenom, $adresse, $password, $pseudo, $mail);
		return $insert;
    }
/*
    public function testUser(){
    	if (isset($_REQUEST['nom'], $_REQUEST['prenom'],$_REQUEST['mail'], $_REQUEST['password'],$_REQUEST['adresse'],$_REQUEST['pseudo'])){
		  $message="Votre pseudo ou votre mail est déja utilisé";
		  $pseudo=$_POST['pseudo'];
		  $email=$_POST['email'];
		  $testusername = $bdd->prepare("SELECT * FROM `users` WHERE username=? ");
		  $testusername->execute(array($username));
		  $testemail = $bdd->prepare("SELECT * FROM `users` WHERE email=? ");
		  $testemail->execute(array($email));
		  $fintestusername = $testusername->fetchAll();
		  $fintestemail = $testemail->fetchAll();
		  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		      $emailvalide=1;
		  }
		  else {
		      $emailvalide=0;
		      $message="L'adresse email n'est pas valide";
		       }
		  }
	}
	*/
}
?>