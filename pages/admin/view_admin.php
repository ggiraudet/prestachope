<main>
<?php $tresorerie = ControllerAdmin::get_tresorerie(); ?>
    <section class='pages_admin_message'>
		<div class="main_page">
			<div class="main_content">
				<p> Bienvenue Administrateur  </p>
				<a href="index.php?page=admin&admin=admin_messages">Voir les messages des utilisateurs</a>
				<a href="index.php?page=admin&admin=admin_ban">Accéder à la gestion des utilisateurs</a>
				<a href="index.php?page=admin&admin=admin_produit">Accéder à l'administration des produits</a>
				<a href="index.php?page=admin&admin=admin_categorie">Accéder à l'administration des catégories</a>
			</div>
			<div class="bottom_tresor">
				<p> Le montant de la trésorerie est de <?php echo $tresorerie."€"; ?> </p>
			</div>
		</div>
	</section>
</main>
		