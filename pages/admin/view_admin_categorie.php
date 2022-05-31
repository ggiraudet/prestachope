<main>

    <section class='pages_admin_message'>
		<div class="main">
			<div class="main_content">

				<a href="index.php?page=admin&admin=admin_messages">Voir les messages des utilisateurs</a>
				<a href="index.php?page=admin&admin=admin_ban">Accéder à la gestion des utilisateurs</a>
				<a href="index.php?page=admin&admin=admin_produit">Accéder à l'administration des produits</a>
				
				<p> Administration des catégories </p>
				<?php

				$tabAllCat = ControllerAdmin::get_all_cat();
				foreach ($tabAllCat as $index)
				{
					?>
					<div class="class">
						<div class="nom_produit">
							<?php
							echo "nom de la catégorie : ".$index->getNom_categorie(); 
							?>
								<form action="" method="post">
									<input type="text" name="nom_cat" placeholder="Nouveau nom">
									<input type="hidden" name="id" value="<?php echo $index->getId_categorie(); ?>">
									<input type="submit" value="modifier">
								</form>
						</div>

						<div class="suppr">
							<p> supprimer la catégorie <?php echo $index->getNom_categorie() ?></p>
							<form action="" method="post">					
								<input type="hidden" name="id_cat" value="<?php echo $index->getId_categorie(); ?>">
								<input type="submit" value="supprimer">
							</form>
						</div>
					</div>
					<?php
					echo '<br>';
				}
				?>

					<p> Créer une nouvelle catégorie </p>
					<div class="bottom">
						<form action="" method="post">
							<input type="text" name="nom_cat_new" placeholder="Nom de la nouvelle catégorie">
							<input type="submit" value="Crée">
						</form>
					</div>
			</div>
		</div>
	</section>
</main>
		