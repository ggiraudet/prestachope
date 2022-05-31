
<main>
	<section class="pan">
		<?php
		
			$prix_total = 0;
			$quantite_total = 0;
			$cagnotte = ControllerPanier::get_cagnotte($_SESSION['id_client']);

			if (!empty($_GET['valid']) && empty($_SESSION['panier']))
			{
				?>
				<div class="validation">
					<p> <?php echo "Merci de votre achat sur la Brasserie des Sagnes!"; ?>
					<p> <?php echo "Votre commande a bien été enregistrer, et vous sera livrer dans les plus bref délais."; ?>
				</div>
				<?php
			}
			else
			{
			?>	

				<div class="head">
					<div class="panier_head">
					<p> Résumé de votre commande </p>
					</div>
				</div>
				<div class="panier">
					<div class="exemple">
						<div class="name">
							<p> Nom du produit </p>
						</div>
						<div class="box_ex">
							<p> Quantité </p>
						</div>
						<div class="box_ex">
							<p> Prix en € </p>
						</div>
						<div class="box_ex">
							<p> Total en € </p>
						</div>
						<div class="box_ex_end">
							<p> Supprimer </p>
						</div>
					</div>

					<?php
					if (isset($_SESSION['panier']))
					{
						foreach ($_SESSION['panier'] as $ligne)
						{
							//declarer les variables utiles
							$id_produit = $ligne[0];
							$prix = ControllerPanier::get_prix($id_produit);
							$nom_produit = ControllerPanier::get_nom_produit($id_produit);
							$quantite = $ligne[1];

							$prix_q = $prix * $quantite;

							$prix_total = $prix_total+$prix_q;

							$quantite_total = $quantite_total+$quantite;
					?>
						<div class="box_commande">
							<div class="name_content">
								<p> <?php echo $nom_produit; ?> </p>
							</div>
							<div class="box">
								<p> <?php echo $quantite; ?> </p>
							</div>
							<div class="box">
							<p> <?php echo $prix; ?> </p>
							</div>
							<div class="box">
							<p> <?php echo $prix_q; ?> </p>
							</div>
							<form class="box_suppr" action="index.php?page=panier" method="post">
								<input type="hidden" name="id_produit" value="<?php echo $id_produit; ?>">
								<input type="submit" value="supprimer">
							</form>
						</div>
					<?php
						}
					}
					?>
					<div class="total">
						<div class="name_content">
							<p> Total : </p>
						</div>
						<div class="box">
							<p> <?php echo $quantite_total ?> </p>
						</div>
						<div class="box_prix">
							<p> <?php echo $prix_total ?> </p>
						</div>
					</div>
				</div>

				<div class="head_bas">
					<div class="panier_head">
					<p> Votre cagnotte est de : <?php echo $cagnotte; ?> € </p>
					<?php if ($cagnotte < $prix_total)
					{
						?>
						<p> Votre cagnotte est insuffisante pour payer votre commande </p>
						<?php
					}
						?>
					</div>
				</div>

				<?php 
				if (isset($_SESSION['panier']))
				{
					if ($_SESSION['panier'] != null && $cagnotte > $prix_total)
					{
						?>
						<form class="valide_commande" action="" method="post">
							<input type="hidden" name="validation" value="1">
							<input type="hidden" name="prix_commande" value="<?php echo $prix_total; ?>">
							<input type="submit" value="Valider et payer ma commande">
						</form>
						<?php
					}
				}
			}
				?>
	</section>
</main>   
