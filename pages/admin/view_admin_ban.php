<main>

    <section class='pages_admin_message'>
		<div class="main">
			<div class="main_content">


				<a href="index.php?page=admin&admin=admin_messages">Voir les messages des utilisateurs</a>
				<a href="index.php?page=admin&admin=admin_produit">Accéder à l'administration des produits</a>
				<a href="index.php?page=admin&admin=admin_categorie">Accéder à l'administration des catégories</a>

					<p>Administration des clients </p>

				<?php
					$tabAllClient = ControllerAdmin::get_all_client();
					foreach ($tabAllClient as $index)
					{
						?>
						<?php
							if ($index->getIs_ban() == 0)
							{
								?>
								<div class="ban">
									<?php
									echo "Voulez vous bannir l'utilisateur ".$index->getPseudo()." ?";
									?>
									<form action="" method="post">
										<input type="hidden" name="pseudo" value="<?php echo $index->getPseudo();?>">
										<input type="submit" value="Bannir">
									</form>
								</div>
							<?php
							}
							elseif ($index->getIs_ban() == 1)
							{
								?>
								<div class="ban">
									<?php
									echo "Voulez vous débannir l'utilisateur ".$index->getPseudo()." ?";
									?>
									<form action="" method="post">
										<input type="hidden" name="pseudo_deban" value="<?php echo $index->getPseudo();?>">
										<input type="submit" value="Débannir">
									</form>
								</div>
							<?php
						}
					}

					?>
			</div>
		</div>
	</section>
</main>
		