<footer>
			<div id='lien'>
			<?php
			if (isset($_SESSION["id_client"]))
                    {   
						?>
						<div id="bouton">
						<ul id="navigation">
						<li><a href="index.php?page=inscription" >Inscription</a></li>
						<li><a href="index.php?page=connexion" >Connexion</a></li>						
						<li><a href="index.php?page=profil" >Profil</a></li>
						<li><a href="index.php?page=deconnexion" >Déconnexion</a></li>
					</ul>
				</div>
				<div id="bouton1">
					<ul id="navigation">
						
						<li><a href="index.php?page=accueil" >Page accueil</a></li>
						<li><a href="index.php?page=panier" >Panier</a></li>
						<li><a href="index.php?page=profil" >Profil</a></li>
						<li><a href="index.php?page=produit" >Nos produits</a></li>
					</ul>
				</div>
				
				<?php
					}else{ ?>
						<div id = "bouton">
							<ul>
							<li><a href="index.php?page=produit" >Nos produits</a></li>
							</ul>
						</div>
						<div id="bouton1">
						<ul id="navigation">
						<li><a href="index.php?page=inscription" >Inscription</a></li>
						<li><a href="index.php?page=connexion" >Connexion</a></li>
						
						</div>

					<?php } ?>
					<div id="bouton">
					<ul id="navigation">
						<li><a href="index.php?page=accueil" >Accueil</a></li>
						<li><a href="https://www.instagram.com" >Corentin</a></li>
						<li><a href="https://www.instagram.com/iamgaelmonfils/" >Gaël</a></li>
						<li><a href="https://www.instagram.com" >Paul</a></li>
					</ul>
				</div>
			</div>		
			<div id='copyrighteticons'>
				<div id='copyright' >
					<span>© fromSratch();2021</span>
				</div>
				<div id='icons'>
					<a href="http://www.twitter.fr"><i class="fa fa-twitter"></i></a>
					<a href="http://www.facebook.fr"><i class="fa fa-facebook"></i></a>
					<a href="https://www.twitch.tv"><i class="fa fa-twitch"></i></a>
					<a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
					<a href="http://www.google.com"><i class="fa fa-google"></i></a>
				</div>	
			</div>
		</footer>
	</body>