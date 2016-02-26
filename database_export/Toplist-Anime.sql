CREATE DATABASE  IF NOT EXISTS `toplist_animes` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `toplist_animes`;
-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: toplist_animes
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `Animecategories`
--

DROP TABLE IF EXISTS `Animecategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Animecategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anime_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Animes_has_Categories_Categories1_idx` (`category_id`),
  KEY `fk_Animes_has_Categories_Animes1_idx` (`anime_id`),
  CONSTRAINT `fk_Animes_has_Categories_Animes1` FOREIGN KEY (`anime_id`) REFERENCES `Animes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Animes_has_Categories_Categories1` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Animecategories`
--

LOCK TABLES `Animecategories` WRITE;
/*!40000 ALTER TABLE `Animecategories` DISABLE KEYS */;
/*!40000 ALTER TABLE `Animecategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Animelikes`
--

DROP TABLE IF EXISTS `Animelikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Animelikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anime_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `likes` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Animelikes` (`anime_id`,`user_id`,`likes`),
  KEY `fk_Animes_has_Users_Users2_idx` (`user_id`),
  KEY `fk_Animes_has_Users_Animes1_idx` (`anime_id`),
  CONSTRAINT `fk_Animes_has_Users_Animes1` FOREIGN KEY (`anime_id`) REFERENCES `Animes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Animes_has_Users_Users2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Animelikes`
--

LOCK TABLES `Animelikes` WRITE;
/*!40000 ALTER TABLE `Animelikes` DISABLE KEYS */;
INSERT INTO `Animelikes` VALUES (2,2,1,'1'),(6,2,2,'1'),(25,2,3,'1'),(26,2,4,'1'),(27,2,5,'1'),(36,2,6,'1'),(63,2,9,'1'),(29,4,1,'1'),(28,4,5,'1'),(38,4,6,'1'),(50,4,8,'1'),(60,4,9,'1'),(43,5,1,'1'),(46,5,2,'1'),(45,5,5,'1'),(40,5,6,'1'),(66,5,9,'1'),(52,6,1,'1'),(56,6,9,'1'),(55,8,1,'1'),(71,8,2,'1'),(64,8,9,'1'),(72,9,1,'1');
/*!40000 ALTER TABLE `Animelikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Animes`
--

DROP TABLE IF EXISTS `Animes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Animes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `picture` text,
  `release_year` int(11) DEFAULT NULL COMMENT '\n	',
  `total_episodes` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Animes`
--

LOCK TABLES `Animes` WRITE;
/*!40000 ALTER TABLE `Animes` DISABLE KEYS */;
INSERT INTO `Animes` VALUES (2,'Completed','Bleach','Shinigami','http://orig14.deviantart.net/06f6/f/2011/233/7/6/bleach___back_in_black_by_nekozumi-d478nxh.jpg',2004,322,'0000-00-00 00:00:00','2015-10-31 02:37:00'),(4,'On-going','Naruto','Ninjas','http://pre15.deviantart.net/31da/th/pre/f/2013/182/a/c/naruto_sasuke_fan_art_by_amatera_tsukuyomi-d6bgvxf.png',1999,622,NULL,NULL),(5,'Complete','Full Metal Alchemist','Edward Elric. State Alchemist','http://img11.deviantart.net/e955/i/2010/045/e/a/full_metal_alchemist_by_digitalninja.jpg',2003,51,NULL,NULL),(6,'Ongoing','One Punch Man','Ownage','http://i.ytimg.com/vi/444RWByNOGg/maxresdefault.jpg',2015,10,NULL,NULL),(8,'Completed','Hajime No Ippo','Boxing','http://vignette2.wikia.nocookie.net/ippo/images/d/d3/Ippo_makunouchi.jpg/revision/20090109034918',1995,123,NULL,NULL),(9,'Completed','Dragon Ball Z','Dragon\'s Balls',NULL,2002,999,NULL,'2016-02-26 09:07:52');
/*!40000 ALTER TABLE `Animes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Categories`
--

DROP TABLE IF EXISTS `Categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categories`
--

LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reviewlikes`
--

DROP TABLE IF EXISTS `Reviewlikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reviewlikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `likes` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Reviews_has_Users_Users1_idx` (`user_id`),
  KEY `fk_Reviews_has_Users_Reviews1_idx` (`review_id`),
  CONSTRAINT `fk_Reviews_has_Users_Reviews1` FOREIGN KEY (`review_id`) REFERENCES `Reviews` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reviews_has_Users_Users1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reviewlikes`
--

LOCK TABLES `Reviewlikes` WRITE;
/*!40000 ALTER TABLE `Reviewlikes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Reviewlikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reviews`
--

DROP TABLE IF EXISTS `Reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anime_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Animes_has_Users_Users1_idx` (`user_id`),
  KEY `fk_Animes_has_Users_Animes_idx` (`anime_id`),
  CONSTRAINT `fk_Animes_has_Users_Animes` FOREIGN KEY (`anime_id`) REFERENCES `Animes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Animes_has_Users_Users1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reviews`
--

LOCK TABLES `Reviews` WRITE;
/*!40000 ALTER TABLE `Reviews` DISABLE KEYS */;
INSERT INTO `Reviews` VALUES (1,6,1,'So funny. Comical but creative artwork. A very entertaining, easy to get into anime!','One punch man review'),(2,6,1,'Review! :D','Wan Pan Man'),(3,6,1,'Review! :D','Wan Pan Man'),(4,6,1,'working?','TEsting'),(5,6,1,'working??','TEsting'),(6,6,1,'working???','TEsting'),(7,6,1,'AGain!','Testing'),(8,6,1,'AGain!','Testing'),(9,6,1,'Cool!','Testing'),(10,6,1,'Anotehr :D','WANPAN'),(11,6,1,'Anotehr :D','WANPAN'),(12,6,1,'Anotehr :D!!','WANPAN');
/*!40000 ALTER TABLE `Reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `picture` varchar(45) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `dobmonth` varchar(45) DEFAULT NULL,
  `dobday` int(11) DEFAULT NULL,
  `dobyear` int(11) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'Mike','Lim',NULL,NULL,'0','1337','mike@gmail.com','bfd9f0cc586164634e1b9a255069ca5f','USA','January',1,2002,'Male','2015-10-30 12:11:38','2015-10-30 12:11:38'),(2,'Helen','Chu',NULL,NULL,'0',NULL,'helen@gmail.com','bfd9f0cc586164634e1b9a255069ca5f','CAN','December',8,1990,'Female','2015-10-30 12:21:44','2015-10-30 12:21:44'),(3,'Raymond','Chu',NULL,NULL,'0',NULL,'ray@gmail.com','bfd9f0cc586164634e1b9a255069ca5f','CAN','January',4,1995,'Male','2015-10-30 14:52:01','2015-10-30 14:52:01'),(4,'Testing','Again',NULL,NULL,'0',NULL,'testing@gmail.com','bfd9f0cc586164634e1b9a255069ca5f','AFG','January',2,1999,'Male','2015-10-30 14:54:16','2015-10-30 14:54:16'),(5,'Earth','Shaker',NULL,NULL,'0',NULL,'earthshaker@gmail.com','bfd9f0cc586164634e1b9a255069ca5f','AFG','March',9,1993,'Male','2015-10-30 15:16:24','2015-10-30 15:16:24'),(6,'Crystal','Maiden',NULL,NULL,'0',NULL,'crystalmaiden@gmail.com','bfd9f0cc586164634e1b9a255069ca5f','ISL','June',11,1993,'Female','2015-10-30 16:29:11','2015-10-30 16:29:11'),(7,'Jugger','Naut',NULL,NULL,'0',NULL,'juggernaut@gmail.com','bfd9f0cc586164634e1b9a255069ca5f','AGO','August',15,1993,'Male','2015-10-30 17:06:59','2015-10-30 17:06:59'),(8,'Batman','Wayne',NULL,NULL,'0',NULL,'batman@gmail.com','bfd9f0cc586164634e1b9a255069ca5f','GAB','September',11,1992,'Male','2015-10-30 17:09:14','2015-10-30 17:09:14'),(9,'helen','chu',NULL,NULL,'0',NULL,'ms.helenc@live.com','61f53850b3d48a2f9c013b839a619ad5','CAN','December',8,1990,'Female','2015-11-20 12:36:32','2015-11-20 12:36:32');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-26 10:24:40
