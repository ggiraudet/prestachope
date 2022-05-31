<?php

    class SuperController
    {
        public static function callPage($nom_page)
        {
            switch($nom_page)
            {
                case "connexion" : 
                    include_once("/home/SIO/ggiraudet/public_html/prestachop/pages/connexion/Controller_connexion.php");

                    $instanceController = new ControllerConnexion();

                    $instanceController->includeView();
                    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])) 
                    {
                        if ($instanceController->authenticate($_POST['pseudo'], (sha1($_POST['mdp']))) == true)
                        {
                            if (isset($_SESSION['is_ban']))
                            {
                                session_destroy();
                                $instanceController->redirectUser_ban();
                            }
                            else
                            {
                                $instanceController->redirectUser();
                            }
                        }
                        else
                        {
                            session_destroy();
                            $instanceController->redirectUser_syntaxe();
                        }
                    }
                    break;


                case "inscription" :
                    include_once("/home/SIO/ggiraudet/public_html/prestachop/pages/inscription/Controller_inscription.php");

                    $instanceController1 = new ControllerInscription();

                    $instanceController1->includeView();

                    if(!empty($_POST['nom']) && !empty($_POST['prenom'])&& !empty($_POST['adresse'])&& !empty($_POST['mail'])&& !empty($_POST['password'])&& !empty($_POST['pseudo'])) 
                    {
                        $insert = $instanceController1->InsertClient($_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['password'], $_POST['pseudo'], $_POST['mail']);
                        if ($insert == true)
                        {
                            $instanceController1->redirectUser();
                        }
                        else
                        {
                            echo 'error';
                        }
                    }
                    break;

                case "accueil" :
                    include_once("/home/SIO/ggiraudet/public_html/prestachop/pages/accueil/Controller_accueil.php");
                    print("Accueil");

                    $instanceController2 = new ControllerAccueil();
                    
                    $tab_client = 5;

                    $instanceController2->includeView();

                    break;

                case "contact" :
                    include_once("/home/SIO/ggiraudet/public_html/prestachop/pages/contact/Controller_contact.php");

                    $instanceController3 = new ControllerContact();

                    if (isset($_SESSION['id_client']) && !isset($_SESSION['is_admin']))
                    {
                        $instanceController3->includeView();

                        if(!empty($_POST['sujet']) && !empty($_POST['contenu'])) 
                        {
                            $insert = $instanceController3->InsertionContact($_POST['sujet'], $_POST['contenu']);
                            $instanceController3->redirectUser();

                        }
                    }
                    else
                    {
                        $instanceController3->redirectUser();
                    }
                    break;


                    case "profil" :
                        include_once("/home/SIO/ggiraudet/public_html/prestachop/pages/modif/Controller_profil.php");
    
                        $instanceController4 = new ControllerModif_profil();

                        if (isset($_SESSION['id_client']))
                        {
    
                            $instanceController4->includeView();

                            if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST["adresses"]) && !empty($_POST['mail']) && !empty($_POST['mdp'])) {
                                $insert = $instanceController4->modifprofil($_POST['nom'], $_POST['prenom'], $_POST['mdp'], $_POST["adresses"], $_POST['mail'], $_SESSION ['id_client']);
                                $instanceController4->redirectUser();
                            }
                        }

                        else
                        {
                            $instanceController4->redirectUser();
                        }
                        
    
                        break;
                case "deconnexion" :
                    session_destroy();
                    header('Location: index.php?page=accueil');

                    break;

                case "admin" :
                    include_once("/home/SIO/ggiraudet/public_html/prestachop/pages/admin/Controller_admin.php");

                    $instanceController5 = new ControllerAdmin();

                    if (isset($_SESSION["is_admin"]))
                    {
                    
                        $admin_page = "admin";
                        if (!empty($_GET['admin']))
                        {
                            $admin_page = $_GET['admin'];
                        }

                        if ($admin_page == "admin_messages")
                        {
                            $instanceController5->includeView($admin_page);
                        }
                        elseif ($admin_page == "admin_ban")
                        {
                            $instanceController5->includeView($admin_page);
                        }
                        elseif ($admin_page == "admin_produit")
                        {
                            $instanceController5->includeView($admin_page);
                        }
                        elseif ($admin_page == "admin_categorie")
                        {
                            $instanceController5->includeView($admin_page);
                        }
                        elseif ($admin_page == "admin")
                        {
                            $instanceController5->includeView($admin_page);
                        }

                        if(!empty($_POST['pseudo'])) 
                        {
                            $insert = $instanceController5->ban_user_by_pseudo($_POST['pseudo']);
                            $instanceController5->redirectUser_ban($admin_page);
                        }
                        if(!empty($_POST['pseudo_deban'])) 
                        {
                            $insert = $instanceController5->deban_user_by_pseudo($_POST['pseudo_deban']);
                            $instanceController5->redirectUser_ban($admin_page);
                        }
                        if(!empty($_POST['nom_produit']) || !empty($_POST['prix']) || !empty($_POST['stock'])) 
                        {
                            $nom_produit = 'nom_produit';
                            $prix = 'prix';
                            $stock = 'stock';

                            
                            if(!empty($_POST['nom_produit']))
                            {
                                $insert = $instanceController5->update_produit($_POST['nom_produit'], $nom_produit, $_POST['id']);
                                $instanceController5->redirectUser_ban($admin_page);
                            }
                            if(!empty($_POST['prix']))
                            {
                                $insert = $instanceController5->update_produit($_POST['prix'], $prix, $_POST['id']);
                                $instanceController5->redirectUser_ban($admin_page);
                            }
                            if(!empty($_POST['stock']))
                            {
                                $insert = $instanceController5->update_produit($_POST['stock'], $stock, $_POST['id']);
                                $instanceController5->redirectUser_ban($admin_page);
                            }
                        }
                        if (!empty($_POST['id_produit']))
                        {
                            $suppr = $instanceController5->delete_produit($_POST['id_produit']);
                            $instanceController5->redirectUser_ban($admin_page);
                        }
                        if (!empty($_POST['nom_new']) && !empty($_POST['prix_new']) && !empty($_POST['stock_new'] && !empty($_FILES['image_new']["name"])))
                        {
                            $creation = $instanceController5->crea_produit($_POST['nom_new'], $_POST['prix_new'], $_POST['stock_new'], $_POST['id'], $_FILES['image_new']);
                            $instanceController5->redirectUser_ban($admin_page);
                        }
                        if (!empty($_POST['nom_cat']))
                        {
                            $update = $instanceController5->update_cat($_POST['nom_cat'], $_POST['id']);
                            $instanceController5->redirectUser_ban($admin_page);
                        }
                        if (!empty($_POST['id_cat']))
                        {
                            $delete = $instanceController5->delete_cat($_POST['id_cat']);
                            $instanceController5->redirectUser_ban($admin_page);
                        }
                        if (!empty($_POST['nom_cat_new']))
                        {
                            $crea = $instanceController5->crea_cat($_POST['nom_cat_new']);
                            $instanceController5->redirectUser_ban($admin_page);
                        }

                        if (!empty($_FILES["field-avatar"]["name"]))
                        {
                            $instanceController5->update_image($_FILES['field-avatar'], $_POST['id']);
                            $instanceController5->redirectUser_ban($admin_page);
                        }
                    }
                    else
                    {
                        $instanceController5->redirectUser();
                    }
                    break;

                case "panier":
                    include_once("/home/SIO/ggiraudet/public_html/prestachop/pages/panier/Controller_panier.php");

                    $instanceController6 = new ControllerPanier();

                    if (isset($_SESSION['id_client']) && !isset($_SESSION['is_admin']))
                    {
                        if (!empty($_POST['id_produit']))
                        {
                            $delete = $instanceController6->delete_produit_panier($_POST['id_produit']);
                            $instanceController6->redirectUser();
                        }
                        if (!empty($_POST['validation']))
                        {
                            $addCommande = $instanceController6->create_commande($_POST['prix_commande']);
                            $remove_cagnotte = $instanceController6->remove_cagnotte($_SESSION['id_client'], $_POST['prix_commande']);
                            $add_tresorerie = $instanceController6->add_tresorerie($_POST['prix_commande']);
                            $deleteAll = $instanceController6->delete_all_panier();
                            $instanceController6->redirectUserCommande();
                        }
                        $instanceController6->includeView();
                    }
                    else
                    {
                        $instanceController6->redirectUserAccueil();
                    }
                    break;

                case "produit":
                    include_once("/home/SIO/ggiraudet/public_html/prestachop/pages/produit/Controller_produit.php");
                    
                     $instanceController7 = new ControllerProduit();

                     if (!isset($_SESSION['is_admin']))
                    {
                        if (!empty($_POST['id_produit']))
                            {
                                $insert = $instanceController7->add_produit_panier($_POST['id_produit'], $_POST['quantite']);
                                $instanceController7->redirectUser();
                            }
                        }
                        else
                        {
                            $instanceController7->redirectUserAccueil();
                        } $instanceController7->includeView();
                     break;

            }
        }
    }