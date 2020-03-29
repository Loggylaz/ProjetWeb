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
  `prix` decimal(9,2) NOT NULL,
  `stock` int(10) DEFAULT NULL,
  `poid` float DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `categorieID` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorieID` (`categorieID`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`categorieID`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `article` */

insert  into `article`(`id`,`nom`,`prix`,`stock`,`poid`,`marque`,`categorieID`,`image`) values 
(1,'Pomme',1.25,212,100,'Pink Lady',1,NULL),
(2,'Shampooing',2.45,52,500,'Dove',15,NULL),
(3,'Collier pour chien',5.00,12,NULL,'Royal Canin',7,NULL),
(5,'Pastis',8.99,26,1,'51',8,NULL);

/*Table structure for table `categorie` */

DROP TABLE IF EXISTS `categorie`;

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `categorie` */

insert  into `categorie`(`id`,`nom`) values 
(1,'Fruits & Légumes'),
(2,'Boucherie'),
(3,'Boissons'),
(4,'Buiscuits'),
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
(15,'Soin');

/*Table structure for table `commande` */

DROP TABLE IF EXISTS `commande`;

CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateurID` int(11) DEFAULT NULL,
  `statutID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateurID` (`utilisateurID`),
  KEY `statutID` (`statutID`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`statutID`) REFERENCES `statut` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `commande` */

/*Table structure for table `commande_article` */

DROP TABLE IF EXISTS `commande_article`;

CREATE TABLE `commande_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commandeID` int(11) DEFAULT NULL,
  `articleID` int(11) DEFAULT NULL,
  `prix` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commandeID` (`commandeID`),
  KEY `articleID` (`articleID`),
  CONSTRAINT `commande_article_ibfk_1` FOREIGN KEY (`commandeID`) REFERENCES `commande` (`id`),
  CONSTRAINT `commande_article_ibfk_2` FOREIGN KEY (`articleID`) REFERENCES `article` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `commande_article` */

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
  PRIMARY KEY (`id`),
  KEY `roleID` (`roleID`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `utilisateur` */

insert  into `utilisateur`(`id`,`login`,`mdp`,`email`,`rue`,`numero`,`cp`,`localite`,`pays`,`nom`,`prenom`,`roleID`) values 
(2,'Admin','$2y$10$rGhs4LaIWneDZ3Bu8TElzexBgU6oaelPHpJ24OYJwtar0pyfU1oFe','admin@admin.com','Rue de l\'administration','42','7110','AdminCity','Belgique','Adam','Ministrateur',1),
(3,'client','$2y$10$OgWT7RMwGOT2bN6iKGyoWeAP0enkbn2zmpf6K27XkslzR60MBFfGW','client@email.com',NULL,NULL,NULL,NULL,NULL,'client','client',3),
(18,'Manager','$2y$10$g0jBJ2uvw6o/G.S4Zpx4PuDdADVuFwBHzpoTamvvxo4BdeeRGhklu','Manager@superchouette.com',NULL,NULL,NULL,NULL,NULL,'Man','Ager',2),
(19,'gravatar','$2y$10$J5qCl6RpLfhJKpkqUTFo8OBFHDumLf0dZNB/H8flZRgW44aCutdl.','benoit.vandenh@hotmail.com',NULL,NULL,NULL,NULL,NULL,'Herrewegen','Benoit',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
