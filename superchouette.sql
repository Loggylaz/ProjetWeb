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
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

/*Data for the table `article` */

insert  into `article`(`id`,`nom`,`prix`,`stock`,`poid`,`marque`,`categorieID`,`image`,`description`,`actif`) values 
(1,'Pomme',1.25,212,'100gr','Pink Lady',1,'public/images/no_image.png','',1),
(3,'Collier pour chien',5.00,12,NULL,'Royal Canin',7,'public/images/no_image.png',NULL,1),
(5,'Pastis',8.99,26,'1','51',1,'public/images/no_image.png','',1),
(9,'Papier Toilette',4.99,0,NULL,'Lotus',15,'public/images/no_image.png',NULL,1),
(10,'Chips Paprika',2.99,52,'150','Lays',10,'public/images/no_image.png',NULL,1),
(27,'Poire',2.45,10,'100gr','Conférence',1,'public/images/no_image.png','',1),
(33,'test',0.00,0,'','',1,'public/images/no_image.png','',1),
(64,'hjgjhg',12.00,0,'','',1,'public/images/no_image.png','',1),
(65,'sdfgfsgff',10.00,10,'100gr','Test',1,'public/images/no_image.png','dfgfd',1),
(66,'dhfdh',12.00,10,'100gr','Conférence',1,'public/images/no_image.png','dfgfd',1),
(67,'dfgdfg',12.00,10,'100gr','Test',1,'public/images/no_image.png','',1),
(68,'Testgfd',12.00,10,'100gr','Test',1,'public/images/no_image.png','',1),
(69,'test45000',10.00,10,'100gr','Test',1,'public/images/no_image.png','',1),
(70,'Herrewegen ljdgdfg',10.00,10,'100gr','Test',1,'public/images/no_image.png','',1),
(75,'Herrewegen ytu',12.00,0,'','',1,'public/images/no_image.png','',1),
(83,'Tomate',0.53,125,'56gr','Origine Espagne',1,'public/images/Tomatos.png','Belle tomate charnue importée d\'Espagne',1),
(84,'Bananes',0.69,59,'1kg','Chiquita',1,'public/images/Les bienfaits de la banane pour la santé.png','Banane Chiquita importé du Brésil',1),
(85,'wgfgsfd_sfkjhdsf',10.00,0,'','',1,'public/images/no_image.png','',1);

/*Table structure for table `categorie` */

DROP TABLE IF EXISTS `categorie`;

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `categorie` */

insert  into `categorie`(`id`,`nom`) values 
(1,'Fruits & Légumes'),
(2,'Boucherie'),
(3,'Boissons'),
(4,'Biscuits'),
(5,'Boulangerie'),
(6,'Ménage'),
(7,'Animaux'),
(8,'Alcool'),
(9,'Bébé'),
(10,'Chips'),
(11,'Crémerie'),
(12,'Poissonerie'),
(13,'Surgelés'),
(14,'Conserves'),
(15,'Soin'),
(16,'Autre');

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `commande` */

insert  into `commande`(`id`,`utilisateurID`,`statutID`,`total`,`date`) values 
(34,2,1,18.99,'2020-04-14 15:21:02'),
(35,2,1,21.97,'2020-04-14 15:26:37'),
(36,2,1,15.24,'2020-04-14 16:19:36'),
(51,2,1,3.70,'2020-04-21 14:49:48'),
(52,2,1,3.70,'2020-04-21 15:09:21'),
(53,2,1,3.70,'2020-04-21 15:10:11'),
(54,2,1,3.70,'2020-04-21 15:10:37'),
(55,2,1,87.11,'2020-04-21 15:31:12');

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
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;

/*Data for the table `commande_article` */

insert  into `commande_article`(`id`,`commandeID`,`articleID`,`prix`,`quantite`) values 
(78,34,3,5.00,NULL),
(79,34,3,5.00,NULL),
(80,34,5,8.99,NULL),
(81,35,3,5.00,NULL),
(82,35,5,8.99,NULL),
(83,35,9,4.99,NULL),
(84,35,10,2.99,NULL),
(85,36,1,1.25,NULL),
(86,36,3,5.00,NULL),
(87,36,5,8.99,NULL),
(99,51,1,1.25,NULL),
(100,51,27,2.45,NULL),
(101,52,1,1.25,NULL),
(102,52,27,2.45,NULL),
(103,53,1,1.25,NULL),
(104,53,27,2.45,NULL),
(105,54,1,1.25,NULL),
(106,54,27,2.45,NULL),
(107,55,70,10.00,NULL),
(108,55,3,5.00,NULL),
(109,55,67,12.00,NULL),
(110,55,85,10.00,NULL),
(111,55,75,12.00,NULL),
(112,55,68,12.00,NULL),
(113,55,84,0.69,NULL),
(114,55,27,2.45,NULL),
(115,55,10,2.99,NULL),
(116,55,10,2.99,NULL),
(117,55,9,4.99,NULL),
(118,55,64,12.00,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `utilisateur` */

insert  into `utilisateur`(`id`,`login`,`mdp`,`email`,`rue`,`numero`,`cp`,`localite`,`pays`,`nom`,`prenom`,`roleID`,`actif`) values 
(2,'Admin','$2y$10$rGhs4LaIWneDZ3Bu8TElzexBgU6oaelPHpJ24OYJwtar0pyfU1oFe','admin@admin.com','Rue de l\'administration','42','7110','AdminCity','Belgique','Adam','Ministrateur',1,1),
(3,'client','$2y$10$OgWT7RMwGOT2bN6iKGyoWeAP0enkbn2zmpf6K27XkslzR60MBFfGW','client@email.com',NULL,NULL,NULL,NULL,NULL,'client','client',3,1),
(18,'Manager','$2y$10$TMlpEwZDbcC1bxGZeoyPqefZI/WBDZsTR342cvtUEOST.JrhBjEB.','Manager@superchouette.com','','','','','','Man','Ager',2,1),
(19,'gravatar','$2y$10$J5qCl6RpLfhJKpkqUTFo8OBFHDumLf0dZNB/H8flZRgW44aCutdl.','benoit.vandenh@hotmail.com',NULL,NULL,NULL,NULL,NULL,'Herrewegen','Benoit',2,1),
(20,'à','$2y$10$OWX10O8OBMSjhVqegR26juFlqBUJS3g61GT9obsnfPWNoVjDSbViy','ben@test.js',NULL,NULL,NULL,NULL,NULL,'lol','pd',3,1),
(21,'$','$2y$10$JQqOZRHLVq8ZL7cgUEibmeVgEsXiqZ/5lan1VHpEvw7ZgfVp38qm.','123@123.com',NULL,NULL,NULL,NULL,NULL,'123','123',3,1),
(22,'/*-/*/\'\"§\'\"è','$2y$10$oSGlojQHGCC4SvulRSkjfumNc1AtcosGI2heQ63z4jgJpgNB6BS4G','123@123.com',NULL,NULL,NULL,NULL,NULL,'123','123',3,1),
(23,'$^ret$ê','$2y$10$qVhrKInYI4BWBwe8yPJ3.uUyISLqT4FUE8PtjJc7QCVJgQqhL83JS','123@123.com',NULL,NULL,NULL,NULL,NULL,'123','123',3,1),
(24,'zerz\'(\'§($)à','$2y$10$eaJJx83M27Wlfyeu4LyBxeXW/5lZxRQtGzLuacXAyJL1zHDEc.kjq','123@123.com',NULL,NULL,NULL,NULL,NULL,'123','123',3,1),
(25,'ben et nuts','$2y$10$MgWdNNUTeSN7OEVayc/Kvei8Oer5T/n7hMI8nebHAHfTb4lij/liG','123@123.com',NULL,NULL,NULL,NULL,NULL,'123','132',3,1),
(26,'$^p^$\'\"(','$2y$10$h6b93oFmGpH.5SSGvcOU1.6.Gh/Idl9EmKwPkTxZ0BNvblIVuFsKG','123@123.com',NULL,NULL,NULL,NULL,NULL,'123','123',3,1),
(27,'éé','$2y$10$f6JhGORoKaMoCuUdn7/Hq.KmDVysHDc2wWFGGXCayH/UDN6LxuZSy','123@123.com',NULL,NULL,NULL,NULL,NULL,'1231','321',3,1),
(28,'test12','$2y$10$YLB1nOXQ1I7qE.crVv/zhuhXUEsXSvJe3I/HIhS2rnvZy4zHGAjLi','123@123.com',NULL,NULL,NULL,NULL,NULL,'123','123',3,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
