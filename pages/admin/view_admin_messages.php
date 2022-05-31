<main>
    <section class="pages_admin_message">
		<div class="main">
			<div class="main_content">

				<a href="index.php?page=admin&admin=admin_ban">Accéder à la gestion des utilisateurs</a>
				<a href="index.php?page=admin&admin=admin_produit">Accéder à l'administration des produits</a>
				<a href="index.php?page=admin&admin=admin_categorie">Accéder à l'administration des catégories</a>

				<p> Les messages envoyés par les utilisateurs </p>
				<?php
					$tabAllContact = ControllerAdmin::get_all_contact();
					foreach ($tabAllContact as $index)
					{
						?>
						<div class="message">
						<?php
							$nom_auteur = ControllerAdmin::getNomAuteur($index->getId_client());
							echo "Sujet du message : ".$index->getSujet().'<BR>';
							echo "Contenu : ".$index->getContenu().'<br>';
							echo "Envoyer le : ".$index->getDate().'<br>';
							echo "par ".$nom_auteur.'<br>';
						?>
						</div>
						<?php
					}
					?>
		</div>
	</section>
</main>
		