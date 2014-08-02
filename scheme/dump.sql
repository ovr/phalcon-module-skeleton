-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: phalcony-module
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
-- Table structure for table `User__Groups`
--

DROP TABLE IF EXISTS `User__Groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User__Groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User__Groups`
--

LOCK TABLES `User__Groups` WRITE;
/*!40000 ALTER TABLE `User__Groups` DISABLE KEYS */;
INSERT INTO `User__Groups` VALUES (1,'User'),(2,'Beta User'),(3,'Moderator'),(4,'Administrator'),(5,'Super Admin');
/*!40000 ALTER TABLE `User__Groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User__Users`
--

DROP TABLE IF EXISTS `User__Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User__Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '1',
  `email` varchar(45) NOT NULL,
  `nick` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nic` (`nick`),
  KEY `group` (`group_id`),
  CONSTRAINT `User__Users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `User__Groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='users';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User__Users`
--

LOCK TABLES `User__Users` WRITE;
/*!40000 ALTER TABLE `User__Users` DISABLE KEYS */;
INSERT INTO `User__Users` VALUES (1,'2014-07-31 00:00:00','2014-07-31 00:00:00',1,'zaets28rus@gmail.com','ovr','Дмитрий','Пацура',1,0),(2,'2014-08-01 00:00:00','2014-08-01 00:00:00',1,'nope@nope.com','xboston','Николай','Кирш',1,0),(3,'2014-08-01 00:00:00','2014-08-01 00:00:00',1,'nope@nope.com','niden','Nikolaos','Dimopoulos',1,0);
/*!40000 ALTER TABLE `User__Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-02  9:16:26
