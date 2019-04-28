-- MySQL dump 10.13  Distrib 5.7.24, for Linux (armv7l)
--
-- Host: localhost    Database: sas_judo
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `age_categories`
--

DROP TABLE IF EXISTS `age_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `age_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'name',
  `years` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `age_categories`
--

LOCK TABLES `age_categories` WRITE;
/*!40000 ALTER TABLE `age_categories` DISABLE KEYS */;
INSERT INTO `age_categories` VALUES (1,'Débutant',6,NULL,NULL),(2,'Mini-poussin',7,NULL,NULL),(3,'Poussin',9,NULL,NULL),(4,'Benjamin',11,NULL,NULL),(5,'Minime',13,NULL,NULL),(6,'Cadet',15,NULL,NULL),(7,'Junior',18,NULL,NULL),(8,'Senior',21,NULL,NULL);
/*!40000 ALTER TABLE `age_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'name',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `albums_user_id_foreign` (`user_id`),
  CONSTRAINT `albums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (1,'Adhérent 2016-2017',1,'2017-11-04 08:32:42','2017-11-04 08:32:42'),(2,'adhérent 2015 - 2016',1,'2017-11-04 08:33:10','2017-11-04 08:33:10'),(3,'05/12/2015 : TELETHON',1,'2017-11-13 15:57:17','2017-11-13 15:57:17'),(4,'15/01/2016 : KAGAMI BIRAKI (Cérémonie des Voeux)',1,'2017-11-13 15:59:33','2017-11-13 15:59:33'),(5,'DU 14 AU 16 MAI : STAGE ADULTES',1,'2017-11-13 16:03:33','2017-11-13 16:03:33'),(6,'MERCREDI 15 JUIN ASSEMBLEE GENERALE',1,'2017-11-13 16:06:58','2017-11-13 16:06:58'),(7,'SAMEDI 21 JANVIER 2017 :GALA DES ARTS MARTIAUX VEIGNÉ',1,'2017-11-13 16:12:19','2017-11-13 16:12:19'),(8,'DIMANCHE 04 DECEMBRE 2017 : TELETHON',1,'2017-11-13 16:15:12','2017-11-13 16:15:12'),(9,'Interclub montlouis 2018',1,'2018-04-02 07:26:31','2018-04-02 07:26:31'),(10,'Equipes benjamins / benjamines 2018',1,'2018-04-02 07:29:31','2018-04-02 07:29:31'),(11,'Equipes séniors département 2018',1,'2018-04-02 07:31:49','2018-04-02 07:31:49'),(12,'05 Janvier 2010',1,'2018-05-19 06:07:40','2018-05-19 06:07:40'),(13,'03 novembre 2010',1,'2018-05-19 06:28:40','2018-05-19 06:28:40'),(14,'22 novembre 2010',1,'2018-05-19 06:30:22','2018-05-19 06:30:22'),(15,'Mardi 12 Avril 2011',1,'2018-05-19 06:33:12','2018-05-19 06:33:12'),(16,'Mardi 19 Juillet 2011',1,'2018-05-19 06:34:27','2018-05-19 06:34:27'),(17,'SAS Judo',1,'2018-05-19 06:38:43','2018-05-19 06:38:43'),(18,'30 ans UJ37',1,'2018-06-04 10:48:17','2018-06-04 10:48:17'),(19,'Bourges 2018 Championnat de france',1,'2018-08-09 07:20:26','2018-08-09 07:20:26'),(20,'présentation sas judo',1,'2018-08-09 07:31:54','2018-08-09 07:31:54'),(21,'Chateau fraisier',1,'2018-08-09 07:48:02','2018-08-09 07:48:02'),(22,'La main à la pâte',1,'2018-08-09 08:34:21','2018-08-09 08:34:21'),(23,'Reconstruction dojo',1,'2018-08-14 05:30:26','2018-08-14 05:30:26'),(24,'Le Dojo renait de ses cendres',1,'2018-08-14 05:47:02','2018-08-14 05:47:02'),(25,'Inscription 2018/2019',1,'2018-08-19 06:47:12','2018-08-19 06:47:12'),(26,'championnat bassin minimes 30_09_2018',1,'2018-10-01 06:36:41','2018-10-01 06:36:41'),(27,'coupe minimes 13/10/2018',1,'2018-10-15 11:32:25','2018-10-15 11:32:25'),(28,'coupe jeune arbitre 2019',1,'2019-04-01 06:07:15','2019-04-01 06:07:15'),(29,'fondettes 2019',1,'2019-04-01 11:59:11','2019-04-01 11:59:11'),(30,'stage avoine 2019',1,'2019-04-11 10:39:21','2019-04-11 10:39:21');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albums_articles`
--

DROP TABLE IF EXISTS `albums_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums_articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `albums_articles_album_id_foreign` (`album_id`),
  KEY `albums_articles_article_id_foreign` (`article_id`),
  CONSTRAINT `albums_articles_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`),
  CONSTRAINT `albums_articles_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums_articles`
--

LOCK TABLES `albums_articles` WRITE;
/*!40000 ALTER TABLE `albums_articles` DISABLE KEYS */;
INSERT INTO `albums_articles` VALUES (3,3,7,NULL,NULL),(4,4,13,NULL,NULL),(5,5,14,NULL,NULL),(6,6,15,NULL,NULL),(7,7,16,NULL,NULL),(8,8,17,NULL,NULL),(9,9,20,NULL,NULL),(10,10,21,NULL,NULL),(11,11,22,NULL,NULL),(18,18,43,NULL,NULL),(19,19,46,NULL,NULL),(20,20,42,NULL,NULL),(21,21,41,NULL,NULL),(22,22,39,NULL,NULL),(23,23,38,NULL,NULL),(24,24,37,NULL,NULL),(25,25,47,NULL,NULL),(26,26,52,NULL,NULL),(27,27,53,NULL,NULL),(28,28,56,NULL,NULL),(29,29,57,NULL,NULL),(30,30,59,NULL,NULL);
/*!40000 ALTER TABLE `albums_articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albums_pictures`
--

DROP TABLE IF EXISTS `albums_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums_pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(10) unsigned NOT NULL,
  `picture_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `albums_pictures_album_id_foreign` (`album_id`),
  KEY `albums_pictures_picture_id_foreign` (`picture_id`),
  CONSTRAINT `albums_pictures_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`),
  CONSTRAINT `albums_pictures_picture_id_foreign` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums_pictures`
--

LOCK TABLES `albums_pictures` WRITE;
/*!40000 ALTER TABLE `albums_pictures` DISABLE KEYS */;
INSERT INTO `albums_pictures` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,3,5,NULL,NULL),(4,3,3,NULL,NULL),(5,3,7,NULL,NULL),(6,3,6,NULL,NULL),(7,3,4,NULL,NULL),(8,4,8,NULL,NULL),(9,5,9,NULL,NULL),(10,5,10,NULL,NULL),(11,5,11,NULL,NULL),(12,5,12,NULL,NULL),(13,6,13,NULL,NULL),(14,6,14,NULL,NULL),(15,6,15,NULL,NULL),(16,7,16,NULL,NULL),(17,8,19,NULL,NULL),(18,8,17,NULL,NULL),(19,8,18,NULL,NULL),(20,9,20,NULL,NULL),(21,10,22,NULL,NULL),(22,10,21,NULL,NULL),(23,11,23,NULL,NULL),(24,12,25,NULL,NULL),(25,12,24,NULL,NULL),(26,13,26,NULL,NULL),(27,14,27,NULL,NULL),(28,15,30,NULL,NULL),(29,15,29,NULL,NULL),(30,15,28,NULL,NULL),(31,16,31,NULL,NULL),(32,16,33,NULL,NULL),(33,16,32,NULL,NULL),(34,16,34,NULL,NULL),(35,16,35,NULL,NULL),(36,16,36,NULL,NULL),(37,17,39,NULL,NULL),(38,17,38,NULL,NULL),(39,17,37,NULL,NULL),(40,18,45,NULL,NULL),(41,18,42,NULL,NULL),(42,18,40,NULL,NULL),(43,18,43,NULL,NULL),(44,18,44,NULL,NULL),(45,18,41,NULL,NULL),(46,18,46,NULL,NULL),(47,19,49,NULL,NULL),(48,19,50,NULL,NULL),(49,19,48,NULL,NULL),(50,19,53,NULL,NULL),(51,19,47,NULL,NULL),(52,19,51,NULL,NULL),(53,19,52,NULL,NULL),(54,19,54,NULL,NULL),(55,19,56,NULL,NULL),(56,19,55,NULL,NULL),(58,20,38,NULL,NULL),(59,20,39,NULL,NULL),(61,21,37,NULL,NULL),(63,23,61,NULL,NULL),(64,23,60,NULL,NULL),(65,24,64,NULL,NULL),(66,24,65,NULL,NULL),(67,24,66,NULL,NULL),(68,24,62,NULL,NULL),(69,24,63,NULL,NULL),(70,24,68,NULL,NULL),(71,24,67,NULL,NULL),(72,24,69,NULL,NULL),(73,24,70,NULL,NULL),(74,24,71,NULL,NULL),(75,24,72,NULL,NULL),(76,24,76,NULL,NULL),(77,24,74,NULL,NULL),(78,24,73,NULL,NULL),(79,24,75,NULL,NULL),(80,22,82,NULL,NULL),(81,22,78,NULL,NULL),(82,22,81,NULL,NULL),(83,22,79,NULL,NULL),(84,22,80,NULL,NULL),(85,22,77,NULL,NULL),(87,25,85,NULL,NULL),(88,25,84,NULL,NULL),(89,26,86,NULL,NULL),(90,26,87,NULL,NULL),(91,27,89,NULL,NULL),(92,28,90,NULL,NULL),(93,29,92,NULL,NULL),(94,29,91,NULL,NULL),(95,30,93,NULL,NULL);
/*!40000 ALTER TABLE `albums_pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'LA SELF DEFENSE A SAINT-AVERTIN',1,'2017-10-11 19:35:28','2017-10-11 19:43:57','<p class=\"titre\" style=\"margin: 5px 0px 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; font-size: 15px; color: rgb(0, 0, 166); text-align: justify; z-index: 3;\">Démonstration des techniques de&nbsp;self défense :&nbsp;<br style=\"margin: 0px; padding: 0px;\">Vidéo enregistrée lors du passage de 4ème Dan de Pascal AUGER.&nbsp;<br style=\"margin: 0px; padding: 0px;\"><br></p><p class=\"titre\" style=\"margin: 5px 0px 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; font-size: 15px; color: rgb(0, 0, 166); text-align: justify; z-index: 3;\">Dans le rôle d\'Uké :&nbsp;<br style=\"margin: 0px; padding: 0px;\">Christine VOISIN elle-même 4ème Dan</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: justify; z-index: 3; color: rgb(51, 51, 51); font-size: 14px;\"><br></p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: justify; z-index: 3; color: rgb(51, 51, 51); font-size: 14px;\">Cliquez sur le lien suivant :</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: justify; z-index: 3; color: rgb(51, 51, 51); font-size: 14px;\"><a href=\"https://youtu.be/emb8NI6Y_KU\" target=\"_blank\">4ème Dan Pascal Auger</a><br></p>'),(2,'PREVOIR : Certificat médical et/ou passeport signé du médecin',1,'2017-10-11 19:44:44','2017-10-11 19:44:44','<p class=\"titre\" style=\"margin: 5px 0px 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; font-size: 15px; color: rgb(0, 0, 166); text-align: justify; z-index: 3;\">1 enveloppe timbrée à vos nom et adresse<br style=\"margin: 0px; padding: 0px;\"></p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: justify; z-index: 3; color: rgb(51, 51, 51); font-size: 14px;\">Le réglement (voir rubrique \"cotisations\")</p>'),(3,'La rentrée est déjà loin',1,'2017-10-11 19:45:14','2017-10-11 19:45:14','<p class=\"titre\" style=\"margin: 5px 0px 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; font-size: 15px; color: rgb(0, 0, 166); text-align: justify; z-index: 3;\">Les premières compétitions ont déjà eu lieu<br style=\"margin: 0px; padding: 0px;\"></p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: justify; z-index: 3; color: rgb(51, 51, 51); font-size: 14px;\">Nos judokas ont bien défendu les couleurs de Saint-Avertin</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: justify; z-index: 3; color: rgb(51, 51, 51); font-size: 14px;\">voir la rubrique \"résultats\"</p>'),(4,'Un vice-champion du monde parmi nous !',1,'2017-10-11 19:49:16','2017-10-11 19:49:16','<p class=\"titre\" style=\"margin: 5px 0px 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; font-size: 15px; color: rgb(0, 0, 166); text-align: justify; z-index: 3;\">Le week end dernier (1er Octobre), avait lieu, en Italie les championnats du Monde Vétérants</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: justify; z-index: 3; color: rgb(51, 51, 51); font-size: 14px;\">Dans la catégorie des 39 - 45 ans, et en moins de 81 Kgs</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: justify; z-index: 3; color: rgb(51, 51, 51); font-size: 14px;\">Christophe MANETTE est arrivé deuxième. FELICITATIONS !!!!</p>'),(7,'05/12/2015 : TELETHON',1,'2017-11-02 06:51:08','2017-11-13 15:55:38','<p class=\"retrait\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-indent: 10px; color: rgb(102, 102, 102); font-size: 14px;\">Comme tous les ans la section Judo de Saint-Avertin Sports a participé au Téléthon avec le Karaté et la Gym form</p><p class=\"retrait\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-indent: 10px; color: rgb(102, 102, 102); font-size: 14px;\">Petits et Grands se sont \"éclatés\", sur le tapis</p><p class=\"retrait\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-indent: 10px; color: rgb(102, 102, 102); font-size: 14px;\">Les parents ont participé, en confectionnant des gâteaux, et en encourageant les enfants</p><p class=\"retrait\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-indent: 10px; color: rgb(102, 102, 102); font-size: 14px;\">Le somme récoltée n\'a pas été à la hauteur de nos espérances, s\'élevant seulement à 280€, malgré les efforts déployés à la buvette</p><p class=\"retrait\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-indent: 10px; color: rgb(102, 102, 102); font-size: 14px;\">Nous espérons faire mieux l\'an prochain !!!</p>'),(12,'Les membres du bureau',1,'2017-11-13 15:46:42','2018-08-14 06:46:57','<table class=\"table\">\n		<tbody><tr>\n			<th>Fonctions</th>\n			<th>Noms</th>\n			<th>Adresses</th> \n			<th>Téléphone</th>\n			<th>Courriels</th>\n		</tr>		\n		<tr>\n			<td><p class=\"clear\"><img src=\"/images/presidente.gif\"><br>Présidente&nbsp;</p></td>\n			<td><p>MAINGOURD</p><p>Patricia</p></td>\n			<td><p>15, Rue A. Bauchant <br>37550 SAINT-AVERTIN </p></td>	\n			<td><p>02.47.27.10.01<br>06.25.09.19.11 </p></td>\n			<td><p>pmaingourd1@gmail.com </p></td>\n		</tr>	\n		<tr>\n			<td>\n			<p class=\"clear\"><img src=\"/images/secretaire.gif\"><br>Secrétaire<br> </p></td>\n			<td><p>NYSZAK </p><p>Catherine</p></td>\n			<td><p><br>37550 SAINT-AVERTIN</p></td>\n			<td><p>06.07.66.74.66</p></td>\n			<td><p>c.nyszak@orange.fr</p></td>\n		</tr>	\n		<tr>\n			<td><p class=\"clear\"><img src=\"/images/tresorier.gif\"><br>Trésorière</p></td>\n			<td><p>CHESNAY</p><p>Françoise</p></td>\n			<td><p>37200 TOURS</p></td>\n			<td><p>06.07.10.00.75</p></td>\n			<td><p>chesfran37@orange.fr</p></td>\n		</tr>		\n		<tr>\n			<td rowspan=\"2\"><p class=\"clear\"><img src=\"/images/tresorier-1.gif\"><br>Trésoriers Adjoints </p></td>\n			<td><p>TOUCHARD</p><p>	Jean-Michel</p></td>\n			<td><p>37550 SAINT-AVERTIN</p></td>\n			<td><p>02.47.28.91.32</p><p>06.78.62.80.86</p></td>\n			<td><p>jm.touchard@wanadoo.fr</p></td>\n		</tr>		\n		<tr>\n			<td><p>TYMCZUK</p><p>Jean-Marc</p></td>\n			<td><p>14, Allée des Jardins<br>37550 SAINT-AVERTIN</p></td>\n			<td><p>02.47.27.77.32</p><p>06.80.45.86.01</p></td>\n			<td><p>jm.tymczuk@kami.fr</p></td>\n		</tr>		\n		<tr>\n			<td><p class=\"clear\"><img src=\"/images/journaux.gif\"><br>Correspondant Presse </p></td>\n			<td><p>JARAUD</p><p>Francis</p></td>\n			<td><p>28 Rue Toulouse Lautrec <br>37550 SAINT-AVERTIN</p></td>\n			<td><p>02.47.27.99.71</p><p>06.75.16.17.17</p></td>\n			<td><p>isafran@orange.fr</p></td>\n		</tr>\n		<tr>\n			<td><p class=\"clear\"><img src=\"/images/informatique.gif\"><br>Référent site </p></td>\n			<td><p>HARTMANN</p><p>Christophe</p></td>\n			<td><p>4 Rue Auguste Fouquet <br>37550 SAINT-AVERTIN</p></td>\n			<td><p></p>&nbsp;<p>06.65.71.19.75</p></td>\n			<td><p>chartmann35@gmail.com</p></td>\n		</tr>\n		<tr>\n			<td rowspan=\"2\"><p class=\"clear\"><img src=\"/images/employe.gif\"><br>Membres du bureau </p></td>\n			<td><p>CHAUVIN</p><p>Claude</p></td>\n			<td><p>19 Rue de la Ricottière</p><p>37170 CHAMBRAY LES TOURS</p></td>\n			<td><p>02.47.27.96.08</p><p>06.09.43.23.35</p></td>\n			<td><p>claude_cha@yahoo.fr</p></td>\n		</tr>	\n		<tr>	\n			<td><p>MAILLET</p><p>Alain</p></td>\n			<td><p>37550 SAINT-AVERTIN</p></td>\n			<td><p>06.66.69.38.71</p></td>\n			<td>maillet.alain@bbox.fr</td>\n		</tr>\n		<tr>\n			<td rowspan=\"3\">\n			<p class=\"clear\"><img src=\"/images/enseignant.gif\"><br>Enseignants </p></td>		\n			<td><p>AUGER</p><p>Pascal</p></td>\n			<td><p>9 Route de la Bouriolle</p><p>37320 ESVRES</p></td>\n			<td><p>02.47.26.52.55</p><p>06.89.42.22.12</p></td>\n			<td><p>calou.1963@orange.fr</p></td>\n		</tr>	\n		<tr>	\n			<td><p>LEBOUCHER</p><p>Alain</p></td>\n			<td><p>Les Régnières</p><p>37320 ESVRES</p></td>\n			<td><p>06.61.61.59.56</p></td>\n			<td><p>lebouchet.alain@wanadoo.fr</p></td>\n		</tr>	\n		<tr>\n			<td><p>LOPES</p><p>Thomas</p></td>\n			<td><p>88 Rue de Cangé</p><p>37550 SAINT-AVERTIN</p></td>\n			<td><p>06.73.73.73.28</p></td>\n			<td><p>thomas.lopes@gmx.fr</p></td>\n		</tr>	\n		<tr>\n			<td>\n			<p class=\"clear\"><img src=\"/images/coordinateur.gif\"><br>Coordinateur </p></td>		\n			<td><p>MAINGOURD</p><p>Olivier</p></td>\n			<td><p>5, Rue Paul Boivinet</p><p>37380 NOUZILLY</p></td>\n			<td><p>06.70.30.86.17</p></td>\n			<td><p>o.maingourd@laposte.net</p></td>\n		</tr>	\n		<tr><td><p class=\"clear\"><img src=\"/images/animation.gif\" width=\"75px\"><br>Animatrice </p></td>\n			<td><p>VOISIN</p><p>Christine</p></td>\n			<td><p>37000 TOURS</p></td>\n			<td><p>06.32.04.60.68</p></td>\n			<td><p>&nbsp;</p></td>\n		</tr>		\n	</tbody></table>'),(13,'15/01/2016 : KAGAMI BIRAKI (Cérémonie des Voeux)',1,'2017-11-13 15:53:05','2017-11-13 15:58:59','<p class=\"retrait\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-indent: 10px; color: rgb(102, 102, 102); font-size: 14px;\">Les 51 Clubs du département se sont retrouvés, comme tous les ans, pour la Cérémonie des Voeux à Ballan</p><p class=\"retrait\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-indent: 10px; color: rgb(102, 102, 102); font-size: 14px;\">Les diplômes des ceintures noires ont été remis :&nbsp;<br style=\"margin: 0px; padding: 0px;\">1er Dan à Antoine TYMSZUK et Sophie MOREL, et 2ème Dan à Justine AUGER</p><p class=\"retrait\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-indent: 10px; color: rgb(102, 102, 102); font-size: 14px;\">Ce fut également l\'occasion de remettre le challenge départemental 2015 :</p><p class=\"retrait\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-indent: 10px; color: rgb(102, 102, 102); font-size: 14px;\">Au classement général Saint Avertin arrive 3ème derrière le J.C. Touraine et l\'AS Chanceaux.</p><p class=\"retrait\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-indent: 10px; color: rgb(102, 102, 102); font-size: 14px;\">Ce résultat se décompose ainsi :&nbsp;<br style=\"margin: 0px; padding: 0px;\">Challenge Shin (investissement des clubs) St Avertin est troisième&nbsp;<br style=\"margin: 0px; padding: 0px;\">Challenge Taï (animations techniques et sportives) St Avertin est premier&nbsp;<br style=\"margin: 0px; padding: 0px;\">Challenge Shiaï (résultats des compétitions fédérales qualificatives pour le niveau National) St Avertin est quatrième</p>'),(14,'DU 14 AU 16 MAI : STAGE ADULTES',1,'2017-11-13 16:02:49','2017-11-13 16:02:49','<span style=\"color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Les judokas à partir de cadets ont participé, pour ceux qui s\'étaient inscrits à un stage multiactivités, concocté par Olivier et encadré par Thomas</span><div><span style=\"color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\"><br></span></div><div><span style=\"color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Le départ, en vélo, donné de chez Pascal AUGER s\'est fait par petits groupes de 4/5 pour des raisons de sécurité :</span></div><div><span style=\"color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Plusieurs étapes avec ravitaillement étaient prévues, et des \"voitures balais\" paraient à toutes éventualités</span></div><div><span style=\"color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">mais l\'ensemble des participants arrivaient au bout à savoir LA ROCHE POSAY</span></div><div><span style=\"color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\"><br></span></div><div><span style=\"color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Outre le vélo, le golf, et le canoë étaient du programme</span></div><div><span style=\"color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">A l\'issue des deux journées, tout le monde rentrait au bercail, fourbu mais ravi</span></div><div><span style=\"color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Pour l\'anecdote, lors d\'un arrêt pique nique, des habitants étaient sollicités pour faire réchauffer les parts de pizza !!!!&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Comic sans MS&quot;; font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">et à la fin du repas, ils revenaient avec .... le café !!!!</span></div>'),(15,'MERCREDI 15 JUIN ASSEMBLEE GENERALE',1,'2017-11-13 16:06:50','2017-11-13 16:06:50','<p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">De nombreux participants cette année encore à notre Assemblée Générale</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Les \"choses sérieuses\" commençaient, comme prévu, à 18h45, en présence de : de gauche à droite:</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Lionel HERIN, Présient du Comité départemental judo 37</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Laurent RAYMOND Adjoint aux sports à la Mairie de Saint Avertin</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Patricia MAINGOURD Présidente de la section judo</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Alain GUILLEMIN, Maire de Saint-Avertin</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Jean-Gérard PAUMIER, Président du Conseil Général</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Régis BATON, président du S.A.S.</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Danièle HARTMANN, trésorière de S.A.S.</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Pascal AUGER, responsable de l\'arbitrage et du ne waza</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\"></p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Christine VOISIN, animatrice partie jujitsu</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Olivier MAINGOURD, organisateur des stages</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Thomas LOPES, enseignant</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\"><br></p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Après les présentations, la Présidente donnait la parole à la secrétaire.</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Catherine donnait un bilan de toutes les activités faites au cours de la saison (stages, téléthon, animations, nouveaux sweats etc ...</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Puis Francis, en remplacement de la trésorière, en vacances, résumait la situation comptable du club, en présentant les comptes au 31 Mai, et le budget 2016-2017.</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Pas de majoration des cotisations pour la prochaine saison, hormis la répercution de l\'augmentation de la licence d\'1 Euro</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Le rapport de la secrétaire, celui du trésorier adjoint, les cotisations, le budget prévisionnel,soumis au vote, sont adoptés à l\'hunanimité.</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Christine faisait la présentation du jujitsu, et les enseignants donnaient les résultats, et récompensaient des judokas, non seulement pour leur résultats sportifs, mais surtout pour leur implication dans la vie du club.</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Le Maire Monsieur GUILLEMIN, Monsieur Jean Gérard PAUMIER, et Lionel HERIN prenaient la parole pour se féliciter des bons résultats du club, mais aussi pour souligner l\'ambiance au sein de celui-ci</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\"><br></p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Petit moment d\'émotion pour Alain MAILLET, qui arrête l\'animation, après près de 40 ans de \"bons et loyaux\" services. Cela méritait bien une récompense, en l\'occurence un KATANA, objet on ne peut plus symbolique pour un judoka</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Notons toutefois qu\'il entre dans le bureau (il y était d\'office en tant qu\'animateur)</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Contrairement aux années précédentes, le temps très incertain, n\'a pas permis que nous profitions de nos espaces verts, C\'est donc dans le Dojo que la Paëlla géante fut très appréciée.</p>'),(16,'SAMEDI 21 JANVIER 2017 :GALA DES ARTS MARTIAUX VEIGNÉ',1,'2017-11-13 16:11:57','2017-11-13 16:11:57','<p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Tous les deux ans le club de Veigné organise son gala des arts martiaux</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Cette fois encore le S.A.S. judo/jujitsu s\'est fait remarquer par une belle&nbsp;<br style=\"margin: 0px; padding: 0px;\">&nbsp;&nbsp; prestation des enfants (encadrés par 4 adultes)</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Un programme dynamique, avec un brin d\'humour, mais des techniques de qualité&nbsp;<br style=\"margin: 0px; padding: 0px;\">&nbsp; &nbsp; pour de jeunes enfants</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">&nbsp;</p><p class=\"centrer\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: center; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">Merci à tous les participants : Axelle, Gaïane, Estelle, Emma pour les filles.&nbsp;<br style=\"margin: 0px; padding: 0px;\">Soren, Reyane, Valentin, Titouan, Ilan, Alexis pour les garçons.&nbsp;<br style=\"margin: 0px; padding: 0px;\">Félicitations à Olivier le \"chorégr</p><p class=\"centrer\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: center; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\">aphe\" et à Antoine le \"D.J.\"</p><p class=\"centrer\" style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; text-align: center; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\"><br></p>'),(17,'DIMANCHE 04 DECEMBRE 2017 : TELETHON',1,'2017-11-13 16:14:32','2017-11-13 16:14:32','<a name=\"pascal\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\"><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;;\">Comme tous les ans, la section Judo/Jujitsu en collaboration avec le Karaté et la Gymnastique&nbsp;<a name=\"pascal\" style=\"margin: 0px; padding: 0px;\"></a></p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; display: inline !important;\">a participé au Téléthon</p></a><div><a name=\"pascal\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\"><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; display: inline !important;\"><br></p></a></div><div><a name=\"pascal\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-size: 14px; text-indent: 10px; background-color: rgb(255, 255, 255);\"><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;;\">Les enfants se sont mesurés aux plus grands. Ils avaient pu inviter des camarades à essayer</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;;\">La possibilité d\'un essai était valable également pour les adultes</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;;\">La buvette a bien fonctionné : merci aux \"crépières\"</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;;\">&nbsp;</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;;\">Les trois sections ont récolté 1060€ (en augmentation de près de 53% par rapport à l\'an passé)</p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;; display: inline !important;\"><a name=\"pascal\" style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;;\"></a></p><p style=\"margin: 0px; padding: 0px; font-family: &quot;Comic sans MS&quot;;\">Le judo ayant contribué à hauteur d\'environ 500€</p></a></div>'),(18,'COTISATIONS SAISON 2018 - 2019',1,'2017-11-27 06:48:57','2018-08-01 14:37:35','<table border=\"1\">\n<colgroup>\n<col width=\"208\" style=\"mso-width-source:userset;mso-width-alt:7606;width:156pt\">\n <col width=\"116\" span=\"5\" style=\"mso-width-source:userset;mso-width-alt:4242;\n width:87pt\">\n </colgroup><tbody><tr height=\"33\" style=\"mso-height-source:userset;height:24.75pt\">\n  <td height=\"33\">Catégories</td>\n  <td>Année naissance</td>\n  <td>Licence</td>\n  <td>Trimestre</td>\n  <td>1er Trimestre</td>\n  <td>Total Annuel&nbsp;&nbsp;</td>\n </tr>\n <tr height=\"20\" style=\"mso-height-source:userset;height:15.0pt\">\n  <td height=\"20\" class=\"xl70\" style=\"height:15.0pt;border-top:none\">&nbsp;</td>\n  <td class=\"xl76\" style=\"border-top:none\">&nbsp;</td>\n  <td class=\"xl71\" style=\"border-top:none;border-left:none\">Euros</td>\n  <td class=\"xl71\" style=\"border-top:none;border-left:none\">Euros</td>\n  <td class=\"xl71\" style=\"border-top:none;border-left:none\">Euros</td>\n  <td class=\"xl71\" style=\"border-top:none;border-left:none\">Euros</td>\n </tr>\n <tr height=\"40\" style=\"mso-height-source:userset;height:30.0pt\">\n  <td height=\"40\" class=\"xl63\" style=\"height:30.0pt\">Débutants (tes) et 1 cours</td>\n  <td class=\"xl78\">2012</td>\n  <td class=\"xl72\" style=\"border-left:none\">38,00</td>\n  <td class=\"xl69\" align=\"right\" style=\"border-left:none\">34,00</td>\n  <td class=\"xl69\" align=\"right\" style=\"border-left:none\">72,00</td>\n  <td class=\"xl69\" align=\"right\" style=\"border-left:none\">140,00</td>\n </tr>\n <tr height=\"40\" style=\"mso-height-source:userset;height:30.0pt\">\n  <td height=\"40\" class=\"xl63\" style=\"height:30.0pt;border-top:none\">Toutes\n  catégories 2 cours</td>\n  <td class=\"xl78\">2011 et avant</td>\n  <td class=\"xl72\" style=\"border-left:none\">38,00</td>\n  <td class=\"xl64\" align=\"right\" style=\"border-top:none;border-left:none\">45,00</td>\n  <td class=\"xl69\" align=\"right\" style=\"border-left:none\">83,00</td>\n  <td class=\"xl69\" align=\"right\" style=\"border-left:none\">173,00</td>\n </tr>\n <tr height=\"40\" style=\"mso-height-source:userset;height:30.0pt\">\n  <td height=\"40\" class=\"xl65\" style=\"height:30.0pt;border-top:none\">Ceintures Noires</td>\n  <td class=\"xl77\" style=\"border-top:none\">&nbsp;</td>\n  <td class=\"xl74\" style=\"border-top:none;border-left:none\">38,00</td>\n  <td class=\"xl66\" align=\"right\" style=\"border-top:none;border-left:none\">41,00</td>\n  <td class=\"xl66\" align=\"right\" style=\"border-top:none;border-left:none\">79,00</td>\n  <td class=\"xl66\" align=\"right\" style=\"border-top:none;border-left:none\">161,00</td>\n </tr></tbody></table><br>\n<br>\nTARIF DEGRESSIF : (uniquement sur plein tarif)\n<br>\nPour le 2ème adhérent : -25 €Pour le 3ème adhérent : -50 €Pour le 4ème adhérent : GratuitTarif spécial pour élève en section sportive (Corneille et Grammont) : 86,5€<table class=\"table\">\n<thead></thead>\n<tbody>\n<tr>\n</tr><tr></tr>\n\n<tr>\n</tr><tr></tr>\n\n<tr>\n</tr><tr></tr>\n\n<tr>\n</tr><tr></tr>\n\n</tbody>\n</table>\n<br>\n<br>\nNOTAS :\n <br>\n1er - Tout trimestre commencé est du, les remboursements seront étudiés au cas par cas suivant le motif de l\'arrêt des cours<br>\n2ème - Le tarif plein inclus l\'adhésion à  Saint-Avertin Sports. Celle-ci sera ajoutée (16,00 €) à  tout autre règlement.<br>\n3ème - 1/2 tarif (sur la cotisation) accordé aux enfants des sections judo des Lycées Corneille et Grammont.<br>'),(19,'Bonne Année',1,'2018-01-20 14:52:18','2018-01-20 14:52:18','<h1>Bonne et heureuse année</h1>'),(20,'Interclubs de MONTLOUIS (mini-poussins)',1,'2018-04-02 07:26:07','2018-04-02 07:26:57','Tous fier de leur médaille !'),(21,'Equipes benjamins / benjamines',1,'2018-04-02 07:28:25','2018-04-02 07:30:27','<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\">Equipe benjamins: 5ème&nbsp;</span><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\">Nassim, Titouan, Alexis, Danaël, Neloïs&nbsp;&nbsp;</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\"><br></span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\">Equipe benjamine (2ème)&nbsp;</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\">GaÏane, Axelle, Elsa, Maud, Estelle</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\"><br></span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\">Féliciation à tous et toutes !&nbsp;</span></div>'),(22,'Equipes séniors',1,'2018-04-02 07:31:31','2018-04-02 07:32:13','<div style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\">EQUIPE SAS 1 : 2ème</div><div style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SAS JUNIORS : 3 ème</div><div style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SAS VETERANS: 5 ème</div><div style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\"><br></div><div style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\">Bravo à tous</div>'),(36,'Inauguration en grande pompe',1,'2018-05-19 06:31:01','2018-08-14 05:54:45','<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%; page-break-before: always\">\n<b>Mercredi 14 Septembre 2011</b></p><div><p style=\"margin-bottom: 0cm; line-height: 100%\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\">Rentrée dans le\nDojo refait. Il manque la déco, du mobilier, mais nous retrouvons\n\"notre maison\".</p><br></div><div>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Vendredi 25\nNovembre 2011</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">Comme le dit la\nNouvelle République dans son article du 02/12/2011 : \"Inauguration\nen grande pompe\".</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Effectivement de\nnombreux responsables, politiques, sportifs représentant la Ville de\nSaint Avertin mais aussi le Département et même la région se sont\ndéplacés.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Tous (ou presque)\nles judokas et leurs familles sont là.</p></div><style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>'),(37,'Le Dojo renait de ses cendres',1,'2018-05-19 06:31:23','2018-08-14 05:50:42','<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>22 Novembre 2010</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">Enfin ce que nous\nattendions tous, .... l\'arrivée des ouvriers et des pelleteuses. \n</p><br><div>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>26 Novembre 2010 </b>\n</p><br></div><div>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">La Nouvelle\nRépublique informe du démarrage de la reconstruction du Dojo, et\nprécise que c\'est l\'entreprise Garcia qui assure la mise à nu des\nmurs.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Nous apprenons également que le montant versé par l\'assurance\ns\'élève à 830 000 Euros TTC environ.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Confirmation est faite que,\nsauf problème imprévu, nous devrions retrouver \"<span style=\"font-style: italic;\">notre Dojo</span>\"\nau début de la saison prochaine.</p><br></div><div>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Vendredi 07\nJanvier 2011</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Les travaux de\ndéblaiement sont terminés. La phase de reconstruction commence,\nmême si cela ne se voit pas beaucoup.</p><br></div><div>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Vendredi 04 Mars\n2011</b></p><br></div><div>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Le Dojo renait de\nses cendres. Bien sur il y a encore beaucoup à faire, mais\nd\'apercevoir les poutres du plafond est bien réconfortant. Par\nailleurs la deuxième image fait apparaitre les modifications de\n\"look\".</p><br></div><div>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Mardi 12 Avril\n2011</b></p>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">L\'avancée des\ntravaux nous laisse espérer que nous retrouverons notre Dojo dès la\nrentrée prochaine</p><br></div><div>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Mardi 19 Juillet\n2011</b></p><br></div><div>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Arrivée du tapis,\ninfrastructures intérieures terminées. Bon espoir de retrouver\n\"NOTRE\" Dojo dès la rentrée.</p><br></div><style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>'),(38,'Reconstruction du Dojo',1,'2018-05-19 06:31:40','2018-08-14 06:07:44','<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>09 Avril 2010</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">Nous relevons dans\nla NR l\'appel d\'offres pour la reconstruction du Dojo, à\nl\'identique.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Date limites de la\nréception des offres : 23 avril 2010 à 12 h 00</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b>12 Avril 2010</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">Toujours dans la NR,\nappel de mission de contrôle technique, et de coordination en\nmatière de SPS date limite de réception 29 Avril 2010 à 16 h 00&nbsp;&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Mai 2010</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Parution du <a href=\"http://www.ville-saint-avertin.fr/les-services-en-ligne/tous/dl-act/getviewcatalog/dl-cat/bulletin-municipal.html?tx_abdownloads_pi1%5Bcid%5D=49&amp;cHash=55b2cb054f\"><font color=\"#0000ff\"><u>Bulletin\nMunicipal de Saint-Avertin</u></font></a>, qui revient sur\nl\'évènement, et note la réactivité de tous les intervenants :\nClub, SAS et Mairie (page 37)</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b>04 Août 2010</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">Toujours dans la NR,\ncompte rendu de visites de chantier en Juillet par Monsieur le Maire\net quelques élus.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Nous apprenons que l\'Architecte retenu est le\nCabinet Bricchi-Desombre.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\">La grande salle est conservée, avec\naugmentation de la surface de Tatamis, et mise en place de tribunes.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Les skydomes seront supprimés pour éviter tout risque.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\">La toiture\net les murs seront mieux isolés et répondront aux normes d\'économie\nd\'énergie.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Sanitaires et vestiaires vont être aussi modifiés pour\nrépondre aux normes d\'accessibilité.</p>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">L\'appel d\'offres est\nlancé, les entreprises doivent répondre pour la mi septembre.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\">Les\ntravaux pourraient débuter dès l\'automne, pour une livraison des\nbâtiments prévue en septembre 2011.</p><style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style><style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style><style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style><style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>'),(39,'La main à la pâte',1,'2018-05-19 06:32:02','2018-08-14 06:10:41','<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Courant Février\n2010</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Les judokas\ns\'organisent, et professeurs et président mettent \"la main à\nla pâte\".</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">L\'installation de la\nsalle, qui nous a été allouée dans le Lycée Jules Romain\ns\'achève. Les judokas ont repris les entrainements, avec chaussettes\naux pieds et tee shirt à manches longues !!!, ...mais avec le\nsourire.</p>\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Les professeurs, la\nprésidente ont tout fait pour aménager cette salle au mieux :</p>\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Les tapis ont été\ndécoupés pour pouvoir être bloqués, des affiches ont été\ncollées... Nous avons retrouvé NOTRE Dojo.</p>\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Merci encore à tous\nceux qui nous ont soutenus, Mairie, Saint-Avertin Sports, Clubs\nenvironnants et .... tous les parents et adhérents.</p>\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Nous suivons de près\nl\'évolution de la situation, et espérons retrouver nos locaux le\nplus rapidement possibles<b>.</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b>19 Février\n2010&nbsp;</b>\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Nous avons pris nos\nmarques, amélioré l\'aménagement, en calant les tapis, en décorant\nles murs, et en maintenant nos traditionnels stages de vacances\nscolaires pour les plus jeunes.</p><div><br></div>'),(40,'2010 : L’INCENDIE DEVASTATEUR',1,'2018-05-19 06:34:08','2018-08-14 06:15:25','<div>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Mardi 05 Janvier\n2010</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b>&nbsp;</b>La Présidente du\nClub apprend que le Dojo a brûlé dans la nuit, très vite la\nnouvelle se répand, et de nombreux judokas se rendent sur place.</p>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Alain Leboucher est\ninterviewé par France Bleue. Et peu après Patricia Maingourd l\'est\npar TV Tours.</p>\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Pour visualiser\nl\'interview fait par TV Tours cliquer sur le lien suivant\n:<br>\n<a href=\"http://www.dailymotion.com/video/xbssfs_infos-tv-tours-sur-incendie-dojo-de_news\" target=\"_blank\"><font color=\"#0000ff\"><u>http://www.dailymotion.com/video/xbssfs_infos-tv-tours-sur-incendie-dojo-de_news</u></font></a></p>\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Tout le monde est\nparticulièrement choqué, du fait que ce sinistre, est sans aucun\ndoute \"criminel\".</p>\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Très vite, la\nsolidarité s\'organise, Ballan, Montlouis, le J.C.T., Esvres, Saint\nPierre des Corps, Chambray etc...proposent de nous attribuer des\nheures de cours.</p>\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Par ailleurs, la\nMairie de St Avertin, Le club Omnisport se démènent pour trouver\ndes solutions.</p>\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Tous les parents, et\nles adhérents sont prévenus par mail et/ou courrier, les cours sont\nsuspendus jusqu\'au 18 Janvier 2010.</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Lundi soir 11\nJanvier 20h00 salle des Fêtes de Saint-Avertin</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b>RÉUNION&nbsp;SINISTRE\nDOJO&nbsp;</b>\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">Suite au sinistre\nsurvenu le 05 Janvier dernier, une réunion d\'informations réunit,\ndans la Salle des Fêtes de Saint-Avertin, les responsables du Club,\nle Maire, Monsieur PAUMIER, et l\'adjoint aux Sports, Monsieur\nGUILLEMIN.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">De nombreux parents\nse sont déplacés, et nous apportent leur soutien. C\'est donc très\némue, que la Présidente du Club, Patricia Maingourd prend la\nparole, afin de les remercier, ainsi que tous les clubs, et autres\nsections du S.A.S. qui nous ont proposé leur aide. Elle expose\nensuite, le déroulement des évènements.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Des photos sont\nprojetées, pour que les adhérents puissent juger de l\'étendue des\ndégâts</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Monsieur le Maire\nprend la parole pour nous assurer de son soutien, et s\'engage à tout\nfaire pour réduire au maximum les délais. Les assurances ont déjà\nété contactées, les experts doivent rendre leurs conclusions\n(restauration ou démolition et reconstruction), et il semble qu\'un\ndélai de 15 mois pourrait être raisonnablement envisagé, pour\nretrouver nos installations, qui d\'un commun accord, Mairie et Club,\ndevraient être reconstruites au même endroit.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Quant à Monsieur\nGuillemin, il reprend, en détails, le fil des évènements de la\nnuit, puisqu\'il était sur place lors de l\'embrasement du Dojo.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">La réactivité des\nresponsables du club, de la Mairie de Saint-Avertin, en la personne\nde Monsieur PAUMIER, de Saint-Avertin Sports, en particulier Monsieur\nMIGEON, permet de pouvoir annoncer :</p><p style=\"margin-bottom: 0cm; line-height: 100%\">La reprise des cours\ndès lundi 18 Janvier 2010, dans une salle du Collège des Grands\nChamps, attribuée à la Section.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Les horaires des\ncours ne changent pas à l\'exception du Mercredi, où ils sont\ndécalés d\'une demi-heure. Cette solution nous permet de pouvoir\nfinir la saison, en attendant, peut-être, une meilleure installation\npour la saison prochaine.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Nous espérons que\ncette situation ne pénalisera personne, et que tous, enfants,\nadultes, jujitsu, compétiteurs pourront continuer à pratiquer leur\nsport favori.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Réunion\nd\'informations organisée par la Mairie. Nombreuse participation. Une\nsalle du Gymnase des Grands Champs, nous est attribuée, les cours\npourront reprendre dès le 18 Janvier, en conservant les mêmes\nhoraires : un exploit en fonction des circonstances.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Pendant ces deux\nsemaines, la présidente, les professeurs, des parents et adhérents\n\"déménagent\" ce qui peut être récupéré du Dojo et\nl\'entrepose chez quelques uns de nos adhérents.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n\n\n\n\n\n\n\n\n\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Les anciens tatamis,\nconservés sont remis au travail, la salle commence à être\naménagée.</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Vendredi 15\nJanvier 2010</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Un entrainement des\ncompétiteurs se fait à Montlouis (compétition le Samedi, et St\nAvertin sera présent)</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Lundi 18 Janvier\n2010</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Comme prévu les\ncours reprennent, la salle est basse, pas très chauffée, mais nous\nmettrons sweat et chaussettes ...</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b>Vendredi 22\nJanvier 2010</b></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><b><br></b></p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Traditionnel\ncérémonie des voeux du Maire, où les benjamins ont amené les\nlarmes aux yeux des participants, en évoquant la perte de \"leur\nseconde maison\".</p>\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</div><div><br></div>'),(41,'Gymnase Château Fraisier',1,'2018-05-19 06:34:59','2018-08-14 05:59:27','<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n<p style=\"margin-bottom: 0cm; line-height: 100%\">Quelques années\nplus tard, la salle de Léon Brûlon devenant trop petite, nous\nemménageons dans une salle du gymnase Château Fraisier (qui, au\ndépart devait servir de salle de réunion)</p><p style=\"margin-bottom: 0cm; line-height: 100%\">A partir de Décembre\n1990, la section s\'étoffe de cours de Jujitsu, avec 14 adhérents\ndont 5 femmes dès l\'ouverture. \n</p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Madame VOISIN\nparticipe a l\'animation de ces cours.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\">Devant\nl\'augmentation des pratiquants, la municipalité accepte la\nconstruction d\'un Dojo, qui sera mis en fonction en Décembre 1991 et\ninauguré officiellement le 15 Février 1992.&nbsp;&nbsp;</p>'),(42,'Présentation du SAS Judo',1,'2018-05-19 06:35:17','2018-08-16 20:25:08','<p style=\"margin-bottom: 0cm; line-height: 100%\">Le Judo Jujitsu est\nune des 26 sections rattachées au Club Omnisports de la ville de\nSaint-Avertin</p><p style=\"box-sizing: border-box; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255);\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Nous sommes affiliés\nà la <font color=\"#0000ff\"><u><a href=\"https://www.ffjudo.com/\" target=\"_blank\">F.F.J.D.A.</a></u></font></p><p style=\"margin-bottom: 0cm; line-height: 100%\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\">En\n1969, la Jeunesse et les Sports propose une initiation Judo, sous\nréserves que l\'activité soit développée.</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Cette\ninitiation sera assurée par Monsieur PINIER.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Dans la foulée\nMonsieur FRISQUE et son fils, judoka, aménagent la salle qui\ndeviendra le Dojo de Léon Brûlon.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\">En Octobre 1970, la section est\nofficiellement créée, et est rattachée à Saint-Avertin-Sports.</p><p style=\"box-sizing: border-box; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255);\">Le président est\nMonsieur PERRET et le professeur Monsieur SOUQUE</p><p style=\"margin-bottom: 0cm; line-height: 100%\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\">En Avril 1973, suite\nau départ précipité de Monsieur SOUQUE, il est fait appel à\nAlain LEBOUCHER, qui accepte d\'assurer l\'intérim jusqu\'à la\nfin de saison.&nbsp;</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Une trentaine d\'adhérents sont déjà inscrits. Il\nest rejoint, la saison suivante, par Monsieur Alain MAILLET\npour l\'assister. \n</p><p style=\"box-sizing: border-box; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255);\">\n	\n	\n	<style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>\n\n\n\n\n</p><p style=\"margin-bottom: 0cm; line-height: 100%\">Alain MAILLET s\'est arrêté à la saison&nbsp;<span style=\"background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\">2016-2017, Alain&nbsp;</span>LEBOUCHER continu d\'enseigner !</p><style type=\"text/css\">\n		@page { margin: 2cm }\n		p { margin-bottom: 0.25cm; direction: ltr; line-height: 115%; text-align: left; orphans: 2; widows: 2 }\n		a:link { color: #0000ff }\n	</style>'),(43,'30 ans UJ 37',1,'2018-06-04 10:46:58','2018-08-09 11:11:09','Le samedi 2 Juin,<div><br></div><div>L\'UJ 37 fêtait ses 30 ans</div><div>Merci aux jeunes d\'être venus, aux anciens d\'être venus</div><div><br></div><div><br></div><div><br></div><div><br></div>'),(44,'Licences',1,'2018-06-18 15:08:28','2018-06-18 15:08:28','<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; background-color: rgb(255, 255, 255);\">Les licences peuvent être prises dés maintenant..seront envoyées lorsque paiement et papiers (feuille inscription et CM) seront en règle.&nbsp;</span>'),(45,'Fin des cours le 29 Juin',1,'2018-06-22 12:18:58','2018-06-22 12:18:58','La fin des cours approche...<div><br></div><div>Avant de se reposer cet été,</div><div>N\'oubliez pas de venir pour les derniers cours.</div><div><br></div>'),(46,'Championnat de France par Equipes de Club',1,'2018-08-09 07:19:30','2018-08-09 07:21:04','<br class=\"Apple-interchange-newline\"><span style=\"color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Super journée à Bourges pour le Championnat de France par Equipes de Club, de l\'ambiance et du beau judo</span><div><span style=\"color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><br></span></div><div><span style=\"color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Merci à tous d\'être venu&nbsp;</span></div>'),(47,'Inscriptions 2018/2019',1,'2018-08-19 06:46:47','2018-08-23 05:33:32','Rendez vous à la journée des associations le Samedi 9 Septembre 2018<div>Au complexe sportif Henri Depierre (31 rue Frédéric Joliot-Curie) de 9h à 16h !</div><div><br></div><div><div>La nouvelle fiche d\'inscription est juste en dessous.</div></div>'),(48,'Reprise des cours saison 2018 / 2019',1,'2018-08-23 06:34:36','2018-08-23 06:34:36','La reprise des cours aura lieu le <span style=\"font-weight: bold;\">11 Septembre 2018</span> !<div>Bonne fin de vacances à tous et à très vite sur la tatamis !</div>'),(49,'Début des cours',1,'2018-09-11 07:15:00','2018-09-11 07:15:00','<p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">Reprise des cours ce soir !</p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">18h15 - 19h30 pour les Benjamins / Minimes</p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">19h30 - 21h pour les cadets / juniors / seniors</p>'),(50,'Open coupe minimes',1,'2018-09-27 11:24:26','2018-09-27 11:29:42','<div>L\'open coupe minimes se déroule le 30 Septembre 2018 à Tours !&nbsp;</div><div><br></div><div>Bonne compétition à tous et toutes !</div>'),(51,'Interclub Chanceaux 7 Octobre 2018 pour les benjamins / poussins',1,'2018-09-27 11:29:04','2018-09-27 11:29:04','Le 7 Octobre prochain se déroule l\'interclub de Chanceaux !&nbsp;<div><br></div><div>Benjamins / Benjamines</div><div>9h30 : -27, -30, -34, -50, +50</div><div>11h15 : -38, -42, -46</div><div><br></div><div>Poussins / Poussines</div><div>13h : -24, -34, , -38, -46, +46</div><div>14h30 : -27, -30, -42</div><div><br></div><div><br></div>'),(52,'Championnat bassins minimes (30/09/2018)',1,'2018-10-01 06:36:11','2018-10-01 06:36:11','Le 30 Septembre se déroulait le championnat bassins minimes.<div><br></div><div>Voici les résultats :</div><div><br></div><div><div style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">Elsa BOUVIER-MARTIN 1ère en -36</div><div style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">Gaïane SALLES &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2ème en -36</div><div style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">Estelle &nbsp;BROUHOT &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3ème -57</div><div style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">Théo LEMAITRE &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3ème -73</div><div style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">Axelle COURAUD &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 5ème - 57</div></div><div style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\"><br></div><div style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px;\">Tous qualifiés aux région minime à Orléans le 13 octobre.</span></div>'),(53,'Région minimes',1,'2018-10-15 11:31:59','2018-10-15 12:48:57','<p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">Les régions minimes ont eu lieu ce week-end</p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: #009032; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"text-decoration-line: underline;\">Gaiane Salles</span> : <span style=\"font-style: italic;\">1ère</span></p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color:#009032; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"text-decoration-line: underline;\">Elsa Bouvier Martin</span> <span style=\"font-style: italic;\">2ème</span></p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">Toutes les deux sont qualifiées au championnat de france minime !</p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); background-color: rgb(255, 255, 255);\"><span style=\"font-weight: bold; font-size: 16px;\">Félicitations !</span></p><p style=\"margin: 6px 0px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p>'),(54,'Vendredi 19 octobre 2018',1,'2018-10-19 13:29:39','2018-10-19 13:29:39','Ce soir entraînement avec quelques athlètes de l\'UJTM !<div><br></div><div>Venez nombreux !</div>'),(55,'Animation départementale',1,'2019-03-11 06:42:10','2019-03-11 06:42:10','Ce dimanche avait lieu l\'animation départementale équipe senior et équipe benjamin&nbsp;<div><br></div><div>En senior, les 2 équipes du SAS se placent 9ème &amp; 7ème.</div><div>En benjamin, l\'équipe se place 7ème.</div><div><br></div><div>Félicitation à tous !!!</div>'),(56,'Département benjamins 2019',1,'2019-04-01 06:06:53','2019-04-01 06:06:53','<p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">Léo 2ème (qualifié pour les régions à Orléans)</p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">Adelle, Nassim, Antoine 7ème</p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">Arbitrage :&nbsp;</p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">Maud 1ère sur 23 (qualifiée pour les régions à Orléans)</p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">Participation d\'Estelle, Titouan et Reyane&nbsp;</p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\"><br></p><p style=\"margin: 0px 0px 6px; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41); font-size: 14px; background-color: rgb(255, 255, 255);\">Félicitations !&nbsp;</p>'),(57,'Inter-club Fondettes 2019',1,'2019-04-01 11:57:36','2019-04-01 11:57:36','Voici les résultats de l\'inter-club de Fondettes :<div>&nbsp;Louann 4ème</div><div>&nbsp;Samuel 3ème</div><div>&nbsp;Clément 5ème</div><div><br></div><div>L\'équipe mini-poussine fini 18ème (Valentin, Antione, Jeanne, Abygaëlle, Guillaume)&nbsp;</div><div><br></div><div>Félicitation à tous et merci pour être venu !!!!!</div>'),(58,'Ceinture noire de Tim Velte',1,'2019-04-02 05:52:17','2019-04-02 05:52:17','Tim Velte a obtenu sa ceinture noire !!<div><br></div><div>Félicitations !!!!</div>'),(59,'Stage Avoine 2019',1,'2019-04-11 10:39:03','2019-04-11 10:39:03','Un petit souvenir du stage d\'Avoine !');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles_categories`
--

DROP TABLE IF EXISTS `articles_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_categories_category_id_foreign` (`category_id`),
  KEY `articles_categories_article_id_foreign` (`article_id`),
  CONSTRAINT `articles_categories_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  CONSTRAINT `articles_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_categories`
--

LOCK TABLES `articles_categories` WRITE;
/*!40000 ALTER TABLE `articles_categories` DISABLE KEYS */;
INSERT INTO `articles_categories` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,1,3,NULL,NULL),(4,1,4,NULL,NULL),(7,4,7,NULL,NULL),(12,3,12,NULL,NULL),(13,4,13,NULL,NULL),(14,4,14,NULL,NULL),(15,4,15,NULL,NULL),(16,4,16,NULL,NULL),(17,4,17,NULL,NULL),(18,6,18,NULL,NULL),(19,1,19,NULL,NULL),(20,1,20,NULL,NULL),(21,1,21,NULL,NULL),(22,1,22,NULL,NULL),(36,8,36,NULL,NULL),(37,8,37,NULL,NULL),(38,8,38,NULL,NULL),(39,8,39,NULL,NULL),(40,8,40,NULL,NULL),(41,8,41,NULL,NULL),(42,8,42,NULL,NULL),(43,1,43,NULL,NULL),(44,1,44,NULL,NULL),(45,1,45,NULL,NULL),(46,4,46,NULL,NULL),(47,1,47,NULL,NULL),(48,1,48,NULL,NULL),(49,1,49,NULL,NULL),(50,1,50,NULL,NULL),(51,1,51,NULL,NULL),(52,1,52,NULL,NULL),(53,1,53,NULL,NULL),(54,1,54,NULL,NULL),(55,1,55,NULL,NULL),(56,1,56,NULL,NULL),(57,1,57,NULL,NULL),(58,1,58,NULL,NULL),(59,1,59,NULL,NULL);
/*!40000 ALTER TABLE `articles_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'name',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'type',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Les news',NULL,NULL,'NewsFactory'),(3,'Le bureau',NULL,'2017-11-13 15:47:20','NewsFactory'),(4,'Les bons moments',NULL,NULL,'NewsFactory'),(6,'Cotisations',NULL,NULL,'NewsFactory'),(7,'Résultats',NULL,'2018-01-24 08:41:24','ResultatsFactory'),(8,'Historique','2017-11-13 15:30:20','2017-11-13 15:30:20','NewsFactory');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'name',
  `day` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche') COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `season_id` int(10) unsigned NOT NULL DEFAULT '1',
  `color` char(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `courses_teacher_id_foreign` (`teacher_id`),
  KEY `courses_season_id_foreign` (`season_id`),
  CONSTRAINT `courses_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`),
  CONSTRAINT `courses_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Mini Poussins 2009-2010','Lundi','17:00:00','18:00:00',1,NULL,'2017-11-26 12:53:36',1,'#E67E22'),(2,'Poussins 2007-2008','Lundi','18:00:00','19:00:00',1,NULL,'2017-11-13 15:22:29',1,'#E74C3C'),(3,'Jujitsu (Adultes) Christine Voisin','Lundi','20:15:00','21:30:00',1,NULL,'2018-02-10 08:35:49',1,'#1537B2'),(4,'Benjamins-Minimes 2004-2005 2006-(2007)','Mardi','18:15:00','19:30:00',1,NULL,'2017-11-13 15:23:03',1,'#27AE60'),(5,'Adultes (à partir de 2003)','Mardi','19:30:00','21:00:00',1,NULL,'2017-11-13 15:23:24',1,'#8E44AD'),(7,'Mini Poussins 2009-2010','Mercredi','17:30:00','18:30:00',1,NULL,'2017-11-13 15:29:00',1,'#E67E22'),(8,'Poussins 2007-2008','Mercredi','18:30:00','19:30:00',1,NULL,'2017-11-13 15:28:40',1,'#E74C3C'),(10,'Jujitsu (Adultes) Christine Voisin','Mercredi','20:00:00','21:30:00',1,NULL,'2018-02-10 08:36:02',1,'#1537B2'),(11,'Débutants 2011','Vendredi','17:00:00','18:00:00',1,NULL,'2017-11-13 15:25:20',1,'#3498DB'),(12,'Benjamins-Minimes 2004 2005-2006-(2007)','Vendredi','18:15:00','19:30:00',1,NULL,'2017-11-13 15:26:51',1,'#27AE60'),(13,'Adultes (à partir de 2003)','Vendredi','19:30:00','21:00:00',1,NULL,'2017-11-13 15:26:21',1,'#8E44AD'),(14,'Cours spécifiques : prépa grades, Kata, arbitrage, etc ...','Samedi','18:30:00','20:00:00',1,NULL,'2017-11-13 15:24:27',1,'#7F8C8D');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `season_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `minor_go_alone` tinyint(1) DEFAULT NULL,
  `major_take_off` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complementary_insurance` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscriptions`
--

LOCK TABLES `inscriptions` WRITE;
/*!40000 ALTER TABLE `inscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `judo_events`
--

DROP TABLE IF EXISTS `judo_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `judo_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('tournament','event','stage') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'event',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `judo_events`
--

LOCK TABLES `judo_events` WRITE;
/*!40000 ALTER TABLE `judo_events` DISABLE KEYS */;
INSERT INTO `judo_events` VALUES (1,'Critérium benjamins / benjamines','Dojo de Tours Pesée benjamins jusqu\'à -40kg : 09h00 - 09h30 | Pesée benjamins + de 40kg : 13h30 - 14h00 | Pesée benjamines : 13h30 - 14h00   Coupe du jeune arbitre Minimes 09h00','2018-02-10 09:00:00','2018-02-10 16:00:00','2018-02-10 08:11:27','2018-02-10 08:11:27','tournament'),(2,'AG Judo','AG','2018-06-08 18:00:00','2018-06-08 23:00:00','2018-04-09 05:53:46','2018-04-09 05:53:46','event');
/*!40000 ALTER TABLE `judo_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `judo_events_users`
--

DROP TABLE IF EXISTS `judo_events_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `judo_events_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judo_event_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `participate` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `judo_events_users_judo_event_id_foreign` (`judo_event_id`),
  KEY `judo_events_users_user_id_foreign` (`user_id`),
  CONSTRAINT `judo_events_users_judo_event_id_foreign` FOREIGN KEY (`judo_event_id`) REFERENCES `judo_events` (`id`),
  CONSTRAINT `judo_events_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `judo_events_users`
--

LOCK TABLES `judo_events_users` WRITE;
/*!40000 ALTER TABLE `judo_events_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `judo_events_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'firstname',
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lastname',
  `sexe` enum('Masculin','Féminin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Masculin',
  `birthday` datetime NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'address',
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'postal_code',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'city',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'phone',
  `red_list` tinyint(1) NOT NULL DEFAULT '1',
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mobile',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_12_27_072941_create_categories_table',1),(4,'2016_12_27_073100_create_articles_table',1),(5,'2016_12_27_074039_create_articles_categories_table',1),(6,'2016_12_27_075155_create_albums_table',1),(7,'2016_12_27_075228_create_pictures_table',1),(8,'2016_12_27_075426_create_judo_events_table',1),(9,'2016_12_27_075504_create_courses_table',1),(10,'2016_12_27_075543_create_seasons_table',1),(11,'2016_12_27_075704_create_seasons_registrations_table',1),(12,'2016_12_27_080829_add_seasons_id_to_courses',1),(13,'2016_12_27_081153_create_judo_events_users',1),(14,'2016_12_27_081948_create_albums_articles_table',1),(15,'2016_12_27_082027_create_albums_pictures_table',1),(16,'2017_02_20_092131_add_type_enum_to_judo_events_table',1),(17,'2017_02_23_113554_add_is_admin_to_users_table',1),(18,'2017_02_24_162333_add_firstname_and_lastname_to_users',1),(19,'2017_02_27_120730_add_is_teacher_to_users_table',1),(20,'2017_04_11_093132_create_age_categories',1),(21,'2017_04_11_093534_create_results_table',1),(22,'2017_04_12_065016_add_name_to_result_table',1),(23,'2017_04_13_075331_create_members_table',1),(24,'2017_04_13_080020_create_inscriptions_table',1),(25,'2017_04_17_084223_change_content_text_to_long_text_on_articles_table',1),(26,'2017_04_23_081847_add_type_to_categories_table',1),(27,'2017_07_22_082806_add_debug_to_user_table',1),(28,'2017_10_25_071057_add_color_to_age_category_table',2),(29,'2017_10_25_073054_add_color_to_courses_table',2),(30,'2017_10_25_080120_remove_color_field_to_age_category_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'name',
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
INSERT INTO `pictures` VALUES (1,'41021.jpg','41021.jpg','2017-11-04 08:32:42','2017-11-04 08:32:42'),(2,'37838.jpg','37838.jpg','2017-11-04 08:33:10','2017-11-04 08:33:10'),(3,'81525.jpg','81525.jpg','2017-11-13 15:57:16','2017-11-13 15:57:16'),(4,'88340.jpg','88340.jpg','2017-11-13 15:57:16','2017-11-13 15:57:16'),(5,'85734.jpg','85734.jpg','2017-11-13 15:57:17','2017-11-13 15:57:17'),(6,'97021.jpg','97021.jpg','2017-11-13 15:57:17','2017-11-13 15:57:17'),(7,'81533.jpg','81533.jpg','2017-11-13 15:57:17','2017-11-13 15:57:17'),(8,'69691.jpg','69691.jpg','2017-11-13 15:59:33','2017-11-13 15:59:33'),(9,'34649.jpeg','34649.jpeg','2017-11-13 16:03:33','2017-11-13 16:03:33'),(10,'58599.jpeg','58599.jpeg','2017-11-13 16:03:33','2017-11-13 16:03:33'),(11,'94107.jpeg','94107.jpeg','2017-11-13 16:03:33','2017-11-13 16:03:33'),(12,'84593.jpeg','84593.jpeg','2017-11-13 16:03:33','2017-11-13 16:03:33'),(13,'72017.jpeg','72017.jpeg','2017-11-13 16:06:58','2017-11-13 16:06:58'),(14,'66297.jpeg','66297.jpeg','2017-11-13 16:06:58','2017-11-13 16:06:58'),(15,'60493.jpeg','60493.jpeg','2017-11-13 16:06:58','2017-11-13 16:06:58'),(16,'30410.jpg','30410.jpg','2017-11-13 16:12:19','2017-11-13 16:12:19'),(17,'34112.jpg','34112.jpg','2017-11-13 16:15:11','2017-11-13 16:15:11'),(18,'98393.jpg','98393.jpg','2017-11-13 16:15:11','2017-11-13 16:15:11'),(19,'71095.jpg','71095.jpg','2017-11-13 16:15:11','2017-11-13 16:15:11'),(20,'48735.jpeg','48735.jpeg','2018-04-02 07:26:30','2018-04-02 07:26:30'),(21,'30002.jpeg','30002.jpeg','2018-04-02 07:29:31','2018-04-02 07:29:31'),(22,'27736.jpeg','27736.jpeg','2018-04-02 07:29:31','2018-04-02 07:29:31'),(23,'94570.jpeg','94570.jpeg','2018-04-02 07:31:48','2018-04-02 07:31:48'),(24,'44703.jpg','44703.jpg','2018-05-19 06:07:40','2018-05-19 06:07:40'),(25,'87657.jpg','87657.jpg','2018-05-19 06:07:40','2018-05-19 06:07:40'),(26,'23537.gif','23537.gif','2018-05-19 06:28:40','2018-05-19 06:28:40'),(27,'25030.gif','25030.gif','2018-05-19 06:30:22','2018-05-19 06:30:22'),(28,'45121.jpg','45121.jpg','2018-05-19 06:33:11','2018-05-19 06:33:11'),(29,'56691.jpg','56691.jpg','2018-05-19 06:33:11','2018-05-19 06:33:11'),(30,'21446.jpg','21446.jpg','2018-05-19 06:33:11','2018-05-19 06:33:11'),(31,'61240.jpg','61240.jpg','2018-05-19 06:34:27','2018-05-19 06:34:27'),(32,'34424.jpg','34424.jpg','2018-05-19 06:34:27','2018-05-19 06:34:27'),(33,'15958.jpg','15958.jpg','2018-05-19 06:34:27','2018-05-19 06:34:27'),(34,'70670.jpg','70670.jpg','2018-05-19 06:34:27','2018-05-19 06:34:27'),(35,'45789.jpg','45789.jpg','2018-05-19 06:34:27','2018-05-19 06:34:27'),(36,'62468.jpg','62468.jpg','2018-05-19 06:34:27','2018-05-19 06:34:27'),(37,'41769.jpg','41769.jpg','2018-05-19 06:38:42','2018-05-19 06:38:42'),(38,'48397.jpg','48397.jpg','2018-05-19 06:38:43','2018-05-19 06:38:43'),(39,'53341.jpg','53341.jpg','2018-05-19 06:38:43','2018-05-19 06:38:43'),(40,'66431.jpeg','66431.jpeg','2018-06-04 10:48:16','2018-06-04 10:48:16'),(41,'81909.jpeg','81909.jpeg','2018-06-04 10:48:16','2018-06-04 10:48:16'),(42,'61874.jpeg','61874.jpeg','2018-06-04 10:48:16','2018-06-04 10:48:16'),(43,'51361.jpeg','51361.jpeg','2018-06-04 10:48:17','2018-06-04 10:48:17'),(44,'92133.jpeg','92133.jpeg','2018-06-04 10:48:17','2018-06-04 10:48:17'),(45,'68465.jpeg','68465.jpeg','2018-06-04 10:48:17','2018-06-04 10:48:17'),(46,'16473.jpeg','16473.jpeg','2018-06-04 10:48:17','2018-06-04 10:48:17'),(47,'82454.jpg','82454.jpg','2018-08-09 07:20:16','2018-08-09 07:20:16'),(48,'63130.jpg','63130.jpg','2018-08-09 07:20:16','2018-08-09 07:20:16'),(49,'88882.jpg','88882.jpg','2018-08-09 07:20:17','2018-08-09 07:20:17'),(50,'73645.jpg','73645.jpg','2018-08-09 07:20:17','2018-08-09 07:20:17'),(51,'50499.jpg','50499.jpg','2018-08-09 07:20:18','2018-08-09 07:20:18'),(52,'76820.jpg','76820.jpg','2018-08-09 07:20:20','2018-08-09 07:20:20'),(53,'47309.jpg','47309.jpg','2018-08-09 07:20:21','2018-08-09 07:20:21'),(54,'77592.jpg','77592.jpg','2018-08-09 07:20:21','2018-08-09 07:20:21'),(55,'32806.jpg','32806.jpg','2018-08-09 07:20:21','2018-08-09 07:20:21'),(56,'39990.jpg','39990.jpg','2018-08-09 07:20:21','2018-08-09 07:20:21'),(57,'64070.jpg','64070.jpg','2018-08-09 07:31:54','2018-08-09 07:31:54'),(58,'74397.jpg','74397.jpg','2018-08-09 07:48:02','2018-08-09 07:48:02'),(59,'60716.jpg','60716.jpg','2018-08-09 08:34:19','2018-08-09 08:34:19'),(60,'97883.gif','97883.gif','2018-08-14 05:30:26','2018-08-14 05:30:26'),(61,'38178.gif','38178.gif','2018-08-14 05:30:26','2018-08-14 05:30:26'),(62,'15903.jpg','15903.jpg','2018-08-14 05:47:01','2018-08-14 05:47:01'),(63,'53087.jpg','53087.jpg','2018-08-14 05:47:01','2018-08-14 05:47:01'),(64,'20908.jpg','20908.jpg','2018-08-14 05:47:01','2018-08-14 05:47:01'),(65,'35674.jpg','35674.jpg','2018-08-14 05:47:01','2018-08-14 05:47:01'),(66,'57343.jpg','57343.jpg','2018-08-14 05:47:01','2018-08-14 05:47:01'),(67,'81206.jpg','81206.jpg','2018-08-14 05:47:01','2018-08-14 05:47:01'),(68,'60288.jpg','60288.jpg','2018-08-14 05:47:01','2018-08-14 05:47:01'),(69,'88978.jpg','88978.jpg','2018-08-14 05:47:01','2018-08-14 05:47:01'),(70,'59408.jpg','59408.jpg','2018-08-14 05:47:01','2018-08-14 05:47:01'),(71,'78417.jpg','78417.jpg','2018-08-14 05:47:01','2018-08-14 05:47:01'),(72,'71793.jpg','71793.jpg','2018-08-14 05:47:02','2018-08-14 05:47:02'),(73,'26441.jpg','26441.jpg','2018-08-14 05:47:02','2018-08-14 05:47:02'),(74,'28516.jpg','28516.jpg','2018-08-14 05:47:02','2018-08-14 05:47:02'),(75,'36263.jpg','36263.jpg','2018-08-14 05:47:02','2018-08-14 05:47:02'),(76,'69590.jpg','69590.jpg','2018-08-14 05:47:02','2018-08-14 05:47:02'),(77,'77325.jpg','77325.jpg','2018-08-14 06:20:10','2018-08-14 06:20:10'),(78,'26384.jpg','26384.jpg','2018-08-14 06:20:10','2018-08-14 06:20:10'),(79,'76075.jpg','76075.jpg','2018-08-14 06:20:10','2018-08-14 06:20:10'),(80,'23706.jpg','23706.jpg','2018-08-14 06:20:10','2018-08-14 06:20:10'),(81,'96423.jpg','96423.jpg','2018-08-14 06:20:10','2018-08-14 06:20:10'),(82,'79785.jpg','79785.jpg','2018-08-14 06:20:10','2018-08-14 06:20:10'),(83,'54599.jpg','54599.jpg','2018-08-19 06:47:12','2018-08-19 06:47:12'),(84,'24028.png','24028.png','2018-08-21 06:45:55','2018-08-21 06:45:55'),(85,'40786.png','40786.png','2018-08-21 06:45:56','2018-08-21 06:45:56'),(86,'18564.jpg','18564.jpg','2018-10-01 06:36:41','2018-10-01 06:36:41'),(87,'92923.jpg','92923.jpg','2018-10-01 06:38:12','2018-10-01 06:38:12'),(88,'97296.jpg','97296.jpg','2018-10-01 06:38:14','2018-10-01 06:38:14'),(89,'90976.jpg','90976.jpg','2018-10-15 11:32:24','2018-10-15 11:32:24'),(90,'75724.jpeg','75724.jpeg','2019-04-01 06:07:15','2019-04-01 06:07:15'),(91,'82012.jpg','82012.jpg','2019-04-01 11:59:10','2019-04-01 11:59:10'),(92,'59116.jpg','59116.jpg','2019-04-01 11:59:11','2019-04-01 11:59:11'),(93,'63316.jpg','63316.jpg','2019-04-11 10:39:21','2019-04-11 10:39:21');
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `season_id` int(11) NOT NULL,
  `locality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'locality',
  `contest_at` datetime NOT NULL,
  `informations` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,2,'Tours','2018-01-21 08:40:20','[{\"name\": \"Xavier Proffit\", \"place\": \"2ème\", \"ageCategory\": {\"label\": \"Minime\", \"value\": 5}}, {\"name\": \"Théo Lemaitre\", \"place\": \"2ème\", \"ageCategory\": {\"label\": \"Minime\", \"value\": 5}}]','2018-01-24 08:40:21','2018-01-24 08:40:21','Coupe départmentale minime'),(2,2,'Tours','2018-02-04 00:00:00','[{\"name\": \"Thomas Zannier\", \"place\": \"2ème\", \"ageCategory\": {\"label\": \"Cadet\", \"value\": 6}}, {\"name\": \"Thibault Proffit\", \"place\": \"7ème\", \"ageCategory\": {\"label\": \"Cadet\", \"value\": 6}}]','2018-01-29 09:03:29','2018-02-04 09:01:31','Championnat bassin sud cadet'),(3,2,'Fondette','2018-02-05 00:00:00','[{\"name\": \"Titouan Drouye\", \"place\": \"1er\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Elsa Bouvier Martin\", \"place\": \"1ère\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Gaiane Salles\", \"place\": \"1ère\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Estelle Brouhot\", \"place\": \"1ère\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Adelle Moriceau\", \"place\": \"1ère\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}, {\"name\": \"Nathan Seigneuret\", \"place\": \"2ème\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}, {\"name\": \"Léa Delacouture\", \"place\": \"2ème\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}, {\"name\": \"Julian Boscher\", \"place\": \"2ème\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}, {\"name\": \"Thibault Aps\", \"place\": \"2ème\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}, {\"name\": \"Benjamin Boschman\", \"place\": \"3ème\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}, {\"name\": \"Bochra Behillil\", \"place\": \"3ème\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}, {\"name\": \"Mehdi Zhar\", \"place\": \"3ème\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}, {\"name\": \"Nelois Vezard\", \"place\": \"3ème\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Gaetan Moulin\", \"place\": \"3ème\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}, {\"name\": \"Louise Albert\", \"place\": \"4ème\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}, {\"name\": \"Emma Ropero\", \"place\": \"4ème\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Elisee Gyan\", \"place\": \"4ème\", \"ageCategory\": {\"label\": \"Poussin\", \"value\": 3}}]','2018-02-05 07:03:44','2018-02-05 07:07:42','Interclub fondette'),(4,2,'Tours','2018-04-08 04:49:09','[{\"name\": \"Elsa\", \"place\": \"1ère\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Gaiane\", \"place\": \"1ère\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Léo\", \"place\": \"1ère\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Estelle\", \"place\": \"2ème\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Axelle\", \"place\": \"3ème\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Danael\", \"place\": \"3ème\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Lilian\", \"place\": \"4ème\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Maud\", \"place\": \"5ème\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Titouan\", \"place\": \"5ème\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}]','2018-04-09 05:52:38','2018-04-09 05:52:38','Département benjamins / benjamines'),(5,2,'Orléans','2018-05-27 04:05:50','[{\"name\": \"Estelle Brouhot\", \"place\": \"5ème\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Gaiane Salles\", \"place\": \"9ième\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}, {\"name\": \"Elsa Bouvier Martin\", \"place\": \"7ième\", \"ageCategory\": {\"label\": \"Benjamin\", \"value\": 4}}]','2018-05-28 06:08:34','2018-05-28 06:08:34','Région benjamin / benjamine');
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `season_registrations`
--

DROP TABLE IF EXISTS `season_registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `season_registrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `season_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `season_registrations_season_id_foreign` (`season_id`),
  KEY `season_registrations_user_id_foreign` (`user_id`),
  CONSTRAINT `season_registrations_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`),
  CONSTRAINT `season_registrations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `season_registrations`
--

LOCK TABLES `season_registrations` WRITE;
/*!40000 ALTER TABLE `season_registrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `season_registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seasons`
--

DROP TABLE IF EXISTS `seasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seasons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'name',
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seasons`
--

LOCK TABLES `seasons` WRITE;
/*!40000 ALTER TABLE `seasons` DISABLE KEYS */;
INSERT INTO `seasons` VALUES (1,'2017','2017-01-01 18:37:21','2017-12-31 18:37:21',NULL,NULL),(2,'2018','2018-01-01 18:37:21','2018-12-31 18:37:21',NULL,NULL),(3,'2019','2019-01-01 18:37:21','2019-12-31 18:37:21',NULL,NULL);
/*!40000 ALTER TABLE `seasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_teacher` tinyint(1) NOT NULL DEFAULT '0',
  `is_debug` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Christophe Hartmann','chartmann.35@gmail.com','$2y$10$6DcfJ3QnD7frE3CgoF0eVOzDhB/JoWKDj1VH441iPjja.RBDb8ok.',NULL,NULL,'2017-10-27 13:04:11',1,'Christophe','Hartmann','4 rue Auguste Fouquet 37550 Saint Avertin','0665711975',1,1),(2,'CHESNAY Françoise','chesfran37@orange.fr','$2y$10$5lcgVF//YtciztT6.yLQV.MvwCyz3EcnDLrye7.r79hgi3Lfz9V.W',NULL,'2017-11-17 10:30:57','2017-11-17 10:30:57',0,'0','0','0','0',0,0),(3,'Claude Chauvin','claude_cha@yahoo.fr','$2y$10$p/fX6O5Rhd80RAqjnay5F.nKFkAo0y5IJakh9vd1QfGboW3bczJeS',NULL,'2018-09-25 05:40:02','2018-09-25 05:40:22',1,'0','0','0','0',0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-21  7:09:29
