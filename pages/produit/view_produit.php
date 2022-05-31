<main>
	<section class="pages_admin_message">
		<p>Nos Produits</p>
		<?php

		$allproduit =ControllerProduit::get_Produits();
		?>
		<div class="bloc1">
			<?php
			foreach ($allproduit as $key ) {		
			?>

				<div class="bloc2">		
					<div class="choix">
						<p><?php echo $key->getNom_produit().'<br>'; echo $key->getPrix(); ?></p>
						<img src="<?php echo $key->getImage(); ?>">
					
						<?php

						if (isset($_SESSION["id_client"]))
						{
						?>

						<p>Nombre de bières : </p>
						<form action="" method="post" class="formulaire">				
							<input type="number" id="bierre" name="quantite" required/> <br> <br>
							<input type="hidden" name="id_produit" value="<?php echo $key->getId_produit(); ?>"">
							<input type="submit" value="Commander" class="valider">
						</form>
						<?php
						}
						else
						{
							echo "<br>";
							echo "<br>";
							echo "<br>";
							echo "<br>";
							echo "<br>";
							echo "<br>";
						}
						?>
					</div>
				</div>
			<?php
				}
			?>
			
		</div>
	</section>
</main> 