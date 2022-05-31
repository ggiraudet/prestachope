
DROP DATABASE IF EXISTS prestachope_bdd2;
CREATE DATABASE prestachope_bdd2;
USE prestachope_bdd2;


/*/////////////////////////////////////////////////////////////////*/

CREATE TABLE categorie (
    id_categorie INT PRIMARY KEY  AUTO_INCREMENT,
    nom_categorie varchar(50)
);
   
INSERT INTO categorie (id_categorie, nom_categorie) VALUES
(2, '25cl/33cl'),
(3, '75cl/2l'),
(4, '5/10l' );

    /*//////////////////////////////////////////////////////////*/


CREATE TABLE  client(
    id_client INT  PRIMARY KEY  AUTO_INCREMENT,
    nom varchar(50),
    prenom varchar(50),
    adresse varchar(50),
    password varchar(50),
    pseudo varchar(50),
    mail varchar(50),
    cagnotte float ,
    is_admin tinyint,
    is_ban tinyint
);


INSERT INTO client (id_client, nom, prenom, adresse, password, pseudo, mail, cagnotte, is_admin, is_ban) VALUES
(1, 'admin', 'admin', '5 rue admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin@gmail.com', 150.0, 1, 0),
(2, 'ban', 'ban', '5 rue ban', '2580d49ff4060824fc921008b52e8e6cd9380570', 'ban', 'ban@gmail.com', 150.0, 0, 1),
(3, 'client', 'client', '5 rue client', 'd2a04d71301a8915217dd5faf81d12cffd6cd958', 'client', 'client@gmail.com', 150.0, 0, 0);



    /*//////////////////////////////////////////////////////////*/



CREATE TABLE  commande(
    id_commande INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT,
    id_produit varchar(111),
    prixtotal float,
    date DATE,
    quantite varchar(111),
    FOREIGN KEY (id_client) REFERENCES client (id_client)
 );

INSERT INTO commande(id_commande,id_client,id_produit,prixtotal,date,quantite) VALUES
(7, 3, '2', 1.75, '2021-05-16', '1'),
(2, 3, '2 / 4 / 7', 24.75, '2021-05-16', '5 / 5 / 5');

/*//////////////////////////////////////////////////////////*/



CREATE TABLE contact (
  id_contact INT PRIMARY KEY  AUTO_INCREMENT,
  sujet varchar(50),
  contenu varchar(50),
  date DATE,
  id_client INT,
  FOREIGN KEY (id_client) REFERENCES client (id_client)
);


INSERT INTO contact (id_contact, sujet, contenu, date, id_client) VALUES
(1, 'sujet 1', 'Voici le contenu du message', '2021-04-09', 2),
(2, 'sujet 1', 'Voici le contenu du message 1', '2021-04-09', 3),
(3, 'sujet 1', 'Voici le contenu du message 2', '2021-04-09', 1),
(4, 'sujet 1', 'Voici le contenu du message 3', '2021-04-09', 2);


  /*//////////////////////////////////////////////////////////*/



CREATE TABLE   produit (
  id_produit INT PRIMARY KEY AUTO_INCREMENT,
  nom_produit varchar(50),
  prix float,
  stock INT,
  image varchar(111)
);


INSERT INTO produit (id_produit, nom_produit, prix, stock, image) VALUES
(2, 'Bière-Gonomie', 1.75, 9, 'images/bièregonomie.png'),
(3, 'Bière-Mite', 1.99, 36, 'images/bièremite.png'),
(4, 'Bière-Ambrée', 0.65, 54, 'images/bièreblonde.png'),
(5, 'Bière-Blonde 2L', 4.65, 54, 'images/biere_blonde2l.png'),
(6, 'Bière-Mite 2L', 5.15, 54, 'images/biere_mite2l.png'),
(7, 'Bière-Ambrée 2L', 2.55, 54, 'images/bièregonomie.png'),
(8, 'Bière-Gonomie fut', 1.65, 54, 'images/futambree.png'),
(9, 'Bière-Blonde fut', 13.65, 54, 'images/futblonde.png'),
(10, 'Bière-Ambrée fut', 8.65, 107, 'images/futambréepng.png');

/*//////////////////////////////////////////////////////////*/



CREATE TABLE posseder (
  id_categorie INT,
  id_produit INT,
  PRIMARY KEY (id_categorie,id_produit),
  FOREIGN KEY (id_categorie) REFERENCES categorie (id_categorie),
  FOREIGN KEY(id_produit) REFERENCES produit (id_produit)
);
INSERT INTO posseder(id_categorie, id_produit) VALUES
(2, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 8),
(4, 9),
(4, 10);

/*///////////////////////////////////////////////////////////*/

CREATE TABLE entreprise (
  id_entreprise INT PRIMARY KEY,
  tresorerie float 
);

INSERT INTO entreprise (id_entreprise, tresorerie) VALUES
(1, 500);
