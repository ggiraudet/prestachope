<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">   
        <link rel="stylesheet" href="assets/css/connexion.css" />
    </head>
    <body>
        
        <header >
			<nav >
                <div class="titre">
                    <a href="index.php">
                        <img src="images/logo.png" class="logo" alt='image logo'>
                    </a>	
                    <a href="index.php" class="lien-titre">
                        <h1 class="txt-titre"> Brasserie des sagnes !</h1>
                    </a>	
                </div>
                <div class="nav_bar">
                    <ul>
                    <?php 
                    if (isset($_SESSION["id_client"]))
                    {
                        if (isset($_SESSION['is_admin']))
                            {
                            ?>
                            <li id='adim_p'><a href ="index.php?page=admin">Partie administrateur</a></li>
                            <li id='deco'><a class="border" href ="index.php?page=deconnexion">Se déconnecter</a></li>
                            <li id='profil'><a href ="index.php?page=profil"> Profil </a></li>
                    <?php
                            }
                        else
                        {
                        ?>
                        <li id='page'><a class="border_left" href ="index.php?page=contact">Contactez-nous!</a></li>
                        <li id='deco'><a class="border_left" href ="index.php?page=deconnexion">Se déconnecter</a></li>
                        <li id='profil'><a class="border_left" href ="index.php?page=profil"> Profil </a></li>
                        <li id='profil'><a class="border_left" href ="index.php?page=produit"> Produits </a></li>
                        <li id='profil'><a href ="index.php?page=panier"> Panier </a></li>

                        <?php 
                        }
                        
                    }
                    else
                    {
                        ?>
                        <li id='conect_p'><a class="border_left" href ="index.php?page=connexion">Connectez-vous</a></li>
                        <li id='profil'><a class="border_left" href ="index.php?page=produit"> Produits </a></li>
                        <li id ='add_p'><a href ="index.php?page=inscription">Inscrivez-vous</a></li>

                    <?php
                    }

                    ?>
                        
                        
                    </ul>
                </div>
			</nav>
			
		</header> 

    </body>
</html>