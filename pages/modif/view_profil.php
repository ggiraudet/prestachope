<?php
$client = controllerModif_profil::get_client($_SESSION['id_client']);
?>

<main>

	<section class="pages">
		
		<div class="profil">
			<h1> Changer vos informations </h1>
			<form action="" method="post">
				<div> Votre nom est : <?php echo $client->getNom();?></div>
				<div class="txt_field">
					<input type="text" name="nom" required/>
					
					<span></span>
                    <label>Changer son nom</label> 
				</div>
				<div> Votre prenom est : <?php echo $client->getPrenom();?></div>
				<div class="txt_field">
					<input type="text" name="prenom"  required/>
					<span></span>
                    <label>Changer son prénom</label>
				</div>
				<div> Votre adresse est : <?php echo $client->getAdresse();?></div>
				<div class="txt_field">
					<input type="text" name="adresses"  required/>
					<span></span>
                    <label>Changer son adresse<?php ?></label>
				</div >
				<div> Votre mail est : <?php echo $client->getMail();?></div>
				<div class="txt_field">
					<input type="text" name="mail"  required/>
					<span></span>
                    <label>Changer son mail</label>
				</div ">
				<div class="txt_field">
					<input type="password" name="mdp"  required/>
					<span></span>
                    <label>Changer son mot de passe</label>
				</div>
				<div>
					<input type="submit" value="Modifier">
				</div>
			</form>
	</div> 
	</section>
</main>