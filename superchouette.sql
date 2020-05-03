/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.38-MariaDB : Database - superchouette
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`superchouette` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `superchouette`;

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix` decimal(9,2) DEFAULT '0.00',
  `stock` int(10) DEFAULT NULL,
  `poid` varchar(10) DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `categorieID` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `actif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `categorieID` (`categorieID`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`categorieID`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

/*Data for the table `article` */

insert  into `article`(`id`,`nom`,`prix`,`stock`,`poid`,`marque`,`categorieID`,`image`,`description`,`actif`) values 
(1,'Citron',1.25,212,'100gr','Italie',1,'public/images/Comprar Limón ecológico online _ ECOagricultor.jpg','',1),
(3,'Laisse_pour_chien',8.99,12,'350gr','Royal Canin',7,'public/images/Porte-sacs à déjections, damier jaune et noir, s\'accroche à la laisse, pour marche avec son chien, entrainement propreté, accessoire canin.jpg','',1),
(5,'Pastis_Ricard',8.99,26,'1L','Ricard',8,'public/images/0f9d49a5-952c-45bf-b883-2e4047d41a98.png','',1),
(9,'Dove_Men+Care_Clean_Comfort_Body_&_Face_Wash_55ml',4.99,125,'55ml','Dove',15,'public/images/Dove Men+Care Clean Comfort Body & Face Wash 55ml.jpg','',1),
(10,'Chips_Lays_Classic',2.99,52,'150','Lays',10,'public/images/_Life is like a bag of potato chips__ --Girl in my….gif','',1),
(27,'Aubergine',2.10,45,'250gr','Aubergine Espagne',1,'public/images/eggplant.jpg','',1),
(33,'Chips_Lays_Bacon',3.45,26,'150gr','Lays',10,'public/images/7dc1be30-5fba-4b3c-b9d1-63f7c623c17d.png','',1),
(64,'Dorade_Royale',6.20,12,'650gr','/',12,'public/images/10 paniers de produits frais ou fermiers à se faire livrer _ poiscaille, la promesse d’un poisson frais.jpg','',1),
(65,'Chips_Lays_Fraise',9.99,1,'2gr','Lays',10,'public/images/823e8bf8-0eb0-471b-a344-f8df88356356.jpg','Chips ultra rare, 2 chips restants',1),
(66,'LU_petit_beurre_pocket',3.99,48,'250gr','LU',4,'public/images/3017760000062_PHOTOSITE_20200317_201532_0.jpg','Lu petit beurre pocket',1),
(67,'Brun_Gaufrette_',2.99,89,'100gr','Brun',4,'public/images/3017760221580_PHOTOSITE_20200320_175112_0.jpg','',1),
(68,'LU_Belvita_original_noisette_et_chocolat',4.50,85,'250gr','LU',4,'public/images/3017760803991_PHOTOSITE_20200320_174955_0.jpg','',1),
(69,'LOR_Rousquilles',3.45,86,'100gr','LOR',4,'public/images/3178880003170_PHOTOSITE_20191224_134722_0.jpg','',1),
(70,'Tuiles_sucrées_aux_amandes',2.45,48,'100gr','karrouf',4,'public/images/3270190173113_PHOTOSITE_20191119_190546_0.jpg','',1),
(75,'Accessoires_de_toilettage_3_pièces_pour_chien',12.00,15,'450gr','Maxi',7,'public/images/Accessoires de toilettage 3 pièces - Pour chien.jpg','',1),
(83,'Tomate',0.53,125,'56gr','Origine Espagne',1,'public/images/Tomatos.png','Belle tomate charnue importée d\'Espagne',1),
(84,'Bananes',0.69,59,'1kg','Chiquita',1,'public/images/Les bienfaits de la banane pour la santé.png','Banane Chiquita importé du Brésil',1),
(85,'Arbre_à_chat',150.00,2,'15kg','Royal Félin',7,'public/images/Arbre à chat _ Animalerie en ligne - Nourriture….png','',1),
(86,'Baguette_campagne',1.00,32,'200gr','Pain frais ! ',5,'public/images/Baguette maison - Recettes.jpg','',1),
(87,'Pois_Chiche_Allemand',1.00,40,'100gr','BönDuel',14,'public/images/Bonduelle Kichererbsen 265g bei REWE online bestellen!.png','',1),
(88,'Alpro_Soja_Vanille',2.00,15,'1L','Alpro',11,'public/images/Boisson végétale soja vanille ALPRO _ la brique de 1 l  à Prix Carrefour.jpg','',1),
(89,'Camembert_président',2.00,150,'150gr','Président',11,'public/images/Camembert  PRESIDENT _ la boite de 145 g  à Prix Carrefour.jpg','',1),
(90,'Liquide_vaisselle_Casino',1.00,156,'200ml','Casino',6,'public/images/Cdiscount_com.jpg','',1),
(91,'Coca_Cola',3.00,145,'2L','Coca Cola',3,'public/images/Coca-Cola Original Soft Drink 2L.jpg','',1),
(92,'Crème_hydratante_visage_corps_mains_nivea',2.00,120,'10ml','Nivea',15,'public/images/Crème hydratante visage corps mains NIVEA.jpg','',1),
(93,'Alpro_nature_sans_sucre',1.00,120,'48','Alpro',11,'public/images/Dessert soja nature sans sucre ALPRO.jpg','',1),
(94,'Fanta_Strawberry',3.00,150,'2L','Fanta',3,'public/images/Fanta Caffeine-Free Strawberry Soda, 2 L - Walmart_com.jpg','',1),
(95,'Pampers_Confort_Sec_Mega_Tamanho_XG_Com_34',10.00,450,'650gr','Pampers',9,'public/images/Fralda Pampers Confort Sec Mega Tamanho XG Com 34 Unidades.jpg','',1),
(96,'Fenouil',1.00,45,'250gr','Espagne',1,'public/images/Fennel Bulb.jpg','',1),
(97,'Frites_McCain_bio',2.45,30,'350gr','McCain',13,'public/images/Frites bio MC CAIN _ le sachet de 650g  à Prix Carrefour.jpg','',0),
(98,'Frites_McCain_bio',2.49,120,'350gr','McCain',13,'public/images/Frites bio MC CAIN _ le sachet de 650g  à Prix Carrefour.jpg','',1),
(99,'Gant_microfibre_ménage_3_en_1_Menatex',6.00,150,'150gr','Menatex',6,'public/images/Gant microfibre ménage 3 en 1 LA MENAGERE _ le gant  à Prix Carrefour.jpg','',1),
(100,'Gants_protection_produits_ménagers_Taille__L',4.00,100,'150gr','Gants',6,'public/images/Gants protection produits ménagers _ Taille_ L….jpg','',1),
(101,'Heineken',2.00,150,'33cl','Heineken',8,'public/images/HEINEKEN BEER.jpg','',1),
(102,'Homard',12.00,25,'800gr','/',12,'public/images/Homard à l\'Armoricaine pour 6 personnes - Recettes Elle à Table.png','',1),
(103,'Igora_Royal_8-0_Blond_Clair',8.00,12,'60ml','Igora',15,'public/images/Igora Royal 8-0 Blond Clair 60 ML.jpg','',1),
(104,'Pain_campagne',2.00,12,'800gr','Pain frais ! ',5,'public/images/Je vous en ai déjà parlé, je fais quasiment….jpg','',1),
(105,'Lait_bébé_en_poudre_1er_age_formule_épaissie_NIDAL',10.00,12,'1kg','Nestlé',9,'public/images/Lait bébé en poudre 1er âge formule épaissie NIDAL.jpg','',1),
(106,'Coquille_saint-Jacques',12.45,145,'1kg','/',12,'public/images/Pêché Maison, de la mer à l\'assiette - Poisson….jpg','',1),
(107,'Rosty_McCain',4.00,10,'250gr','McCain',13,'public/images/Rosty.png','',1),
(108,'Sprite',2.00,100,'2L','Sprite',3,'public/images/Sprite Caffeine-Free Lemon-Lime Soda, 2 L - Walmart_com.jpg','',1),
(109,'Rum_steak_boeuf_nourrit_a_l\'herbe',2.00,10,'150gr','Behance',2,'public/images/The Grass Fed Beef Co_ on Behance.gif','',1),
(110,'Boeuf_Wagyu',4.00,150,'250gr','Wagyu',2,'public/images/The world’s most expensive cut of beef is now being sold at ALDI… for a surprising price.png','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',1);

/*Table structure for table `categorie` */

DROP TABLE IF EXISTS `categorie`;

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `nomID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `categorie` */

insert  into `categorie`(`id`,`nom`,`nomID`) values 
(1,'Fruits & Légumes','fruits_legumes'),
(2,'Boucherie','boucherie'),
(3,'Boissons','boissons'),
(4,'Biscuits','biscuits'),
(5,'Boulangerie','boulangerie'),
(6,'Ménage','menage'),
(7,'Animaux','animaux'),
(8,'Alcool','alcool'),
(9,'Bébé','bebe'),
(10,'Chips','chips'),
(11,'Crémerie','cremerie'),
(12,'Poissonerie','poissonerie'),
(13,'Surgelés','surgeles'),
(14,'Conserves','conserves'),
(15,'Soin','soin'),
(16,'Autre','autre');

/*Table structure for table `commande` */

DROP TABLE IF EXISTS `commande`;

CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateurID` int(11) DEFAULT NULL,
  `statutID` int(11) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT '0.00',
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateurID` (`utilisateurID`),
  KEY `statutID` (`statutID`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`statutID`) REFERENCES `statut` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

/*Data for the table `commande` */

insert  into `commande`(`id`,`utilisateurID`,`statutID`,`total`,`date`) values 
(65,2,1,2.50,'2020-04-24 11:57:13'),
(66,2,1,2.50,'2020-04-24 11:58:14'),
(67,2,1,12.69,'2020-04-24 11:58:36'),
(68,2,1,1.25,'2020-04-24 12:03:00'),
(71,2,1,71.05,'2020-04-24 12:09:12'),
(72,3,1,232.00,'2020-04-26 10:14:53'),
(73,2,1,70.00,'2020-05-01 13:58:46');

/*Table structure for table `commande_article` */

DROP TABLE IF EXISTS `commande_article`;

CREATE TABLE `commande_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commandeID` int(11) DEFAULT NULL,
  `articleID` int(11) DEFAULT NULL,
  `prix` decimal(9,2) DEFAULT '0.00',
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commandeID` (`commandeID`),
  KEY `articleID` (`articleID`),
  CONSTRAINT `commande_article_ibfk_1` FOREIGN KEY (`commandeID`) REFERENCES `commande` (`id`),
  CONSTRAINT `commande_article_ibfk_2` FOREIGN KEY (`articleID`) REFERENCES `article` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

/*Data for the table `commande_article` */

insert  into `commande_article`(`id`,`commandeID`,`articleID`,`prix`,`quantite`) values 
(136,65,1,1.25,15),
(137,65,1,1.25,15),
(138,66,1,1.25,15),
(139,66,1,1.25,15),
(140,67,1,1.25,12),
(141,67,5,8.99,5),
(142,67,27,2.45,3),
(143,68,1,1.25,10),
(150,71,1,1.25,15),
(151,71,5,8.99,5),
(152,71,27,2.45,3),
(153,72,109,2.00,10),
(154,72,105,10.00,2),
(155,72,103,8.00,24),
(156,73,110,4.00,10),
(157,73,108,2.00,15);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`id`,`nom`) values 
(1,'Admin'),
(2,'Gérant'),
(3,'Client');

/*Table structure for table `statut` */

DROP TABLE IF EXISTS `statut`;

CREATE TABLE `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `statut` */

insert  into `statut`(`id`,`nom`) values 
(1,'En attente'),
(2,'En cours de traitement'),
(3,'Refusé'),
(4,'Comfirmé');

/*Table structure for table `utilisateur` */

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rue` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `cp` varchar(20) DEFAULT NULL,
  `localite` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `roleID` int(11) NOT NULL,
  `actif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `roleID` (`roleID`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `utilisateur` */

insert  into `utilisateur`(`id`,`login`,`mdp`,`email`,`rue`,`numero`,`cp`,`localite`,`pays`,`nom`,`prenom`,`roleID`,`actif`) values 
(2,'Admin','$2y$10$rGhs4LaIWneDZ3Bu8TElzexBgU6oaelPHpJ24OYJwtar0pyfU1oFe','admin@admin.com','Rue de l\'administration','42','7110','AdminCity','Belgique','Ministrateur','Adam',1,1),
(3,'client','$2y$10$OgWT7RMwGOT2bN6iKGyoWeAP0enkbn2zmpf6K27XkslzR60MBFfGW','client@email.com',NULL,NULL,NULL,NULL,NULL,'client','client',3,1),
(18,'Manager','$2y$10$TMlpEwZDbcC1bxGZeoyPqefZI/WBDZsTR342cvtUEOST.JrhBjEB.','Manager@superchouette.com','','','','','','Man','Ager',2,1),
(19,'gravatar','$2y$10$J5qCl6RpLfhJKpkqUTFo8OBFHDumLf0dZNB/H8flZRgW44aCutdl.','benoit.vandenh@hotmail.com',NULL,NULL,NULL,NULL,NULL,'Herrewegen','Benoit',2,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
