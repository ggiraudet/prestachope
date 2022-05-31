<main>
    <section class='pages_admin_message'>
		<div class="main">
			<div class="main_content">


				<a href="index.php?page=admin&admin=admin_messages">Voir les messages des utilisateurs</a>
				<a href="index.php?page=admin&admin=admin_ban">Accéder à la gestion des utilisateurs</a>
				<a href="index.php?page=admin&admin=admin_categorie">Accéder à l'administration des catégories</a>


				<p> Administration des produits </p>
				<?php

				$tabAllProduit = ControllerAdmin::get_all_produit();
				foreach ($tabAllProduit as $index)
				{
					?>
				<div class="class">
					<div class="nom_produit">
						<?php
						echo "Nom du produit : ".$index->getNom_produit(); 
						?>
							<form action="" method="post">
								<input type="text" name="nom_produit" placeholder="Nouveau nom">
								<input type="hidden" name="id" value="<?php echo $index->getId_produit(); ?>">
								<input type="submit" value="modifier">
							</form>
					</div>

					<div class="prix">
						<?php
						echo "Prix : ".$index->getPrix().'<br>';
						?>
							<form action="" method="post">
								<input type="text" name="prix" placeholder="Nouveau prix">
								<input type="hidden" name="id" value="<?php echo $index->getId_produit(); ?>">
								<input type="submit" value="modifier">
							</form>
					</div>

					<div class="stock">
						<?php
						echo "Stock : ".$index->getStock().'<br>';
						?>
							<form action="" method="post">
								<input type="text" name="stock" placeholder="Nouveau stock">
								<input type="hidden" name="id" value="<?php echo $index->getId_produit(); ?>">
								<input type="submit" value="modifier">
							</form>
					</div>

					<div class="image">
						<?php
						$url = $index->getImage();
						echo "Image : ".'<br>';
						?>
						<img src="<?php echo $url; ?>">
							<form action="" method="post" enctype="multipart/form-data">
								<input type="file" name="field-avatar"/>
								<input type="hidden" name="id" value="<?php echo $index->getId_produit(); ?>">
								<input type="submit" value="modifier">
							</form>
					</div>

					<div class="suppr">
						<p> Supprimer l'article <?php echo $index->getNom_produit() ?></p>
						<form action="" method="post">					
							<input type="hidden" name="id_produit" value="<?php echo $index->getId_produit(); ?>">
							<input type="submit" value="supprimer">
						</form>
					</div>
				</div>
					<?php
				}
				?>
				<div class="bottom">
					<p> Créer un nouveau produit </p>
					<form action="" method="post" enctype="multipart/form-data">
						<input type="text" name="nom_new" placeholder="Nom du nouveau produit" required/>
						<input type="text" name="prix_new" placeholder="Prix du nouveau produit (nombre)" required/>
						<input type="text" name="stock_new" placeholder="Stock du nouveau produit(entier)" required/>
						<input type="file" name="image_new"/ required/>
						<input type="hidden" name="id" value="<?php echo $index->getId_produit(); ?>">
						<input type="submit" value="Crée">
					</form>
				</div>



				
			</div>
		</div>
	</section>
</main>
		