<?php 
$error = "";
if (isset($_GET['error']))
{
	if ($_GET['error'] == "ban")
	{
		$error = "Désolé, votre compte a été suspendu";
	}
	else if ($_GET['error'] == "syntaxe")
	{
		$error = "Pseudo ou mot de passe érroné";
	}
}


?>


<main>
	<section class='base'>
		<div class="connection">
			<?php 
			if (isset($_GET['error']))
			{
				?>
				<div class="main_error">
					<div class="error">
						<p> <?php echo $error; ?> </p>
					</div>
				</div>
				<?php
			}
			else
			{
				?>
				<h1> Connectez-vous! </h1>
				<?php
			}
			?>
			<form action="" method="post">
				<div class="txt_field">
					<input type="text" name="pseudo" required/>
					<span></span>
                    <label> Votre pseudo</label>
				</div>
				<div class="txt_field">
					<input type="password" name="mdp"  required/>
					<span></span>
                    <label> Mot de passe</label>
				</div>
				<div >
					<input type="submit" name="submit" value="Se connecter">
				</div>
			</form>
		</div>
	</section>
</main>
		