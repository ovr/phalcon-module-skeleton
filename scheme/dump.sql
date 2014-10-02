-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: phalcon-module
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
-- Table structure for table `Catalog__Categories`
--

DROP TABLE IF EXISTS `Catalog__Categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Catalog__Categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Catalog__Categories`
--

LOCK TABLES `Catalog__Categories` WRITE;
/*!40000 ALTER TABLE `Catalog__Categories` DISABLE KEYS */;
INSERT INTO `Catalog__Categories` VALUES (1,'Amazon Kindle'),(2,'Baby Products (excluding apparel)'),(3,'Books'),(4,'Camera & Photo'),(5,'Cell Phones'),(6,'Consumer Electronics'),(7,'Electronics Accessories'),(8,'Home & Garden'),(9,'Kindle Accessories and Amazon Fire TV Accesso'),(10,'Music');
/*!40000 ALTER TABLE `Catalog__Categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Catalog__Products`
--

DROP TABLE IF EXISTS `Catalog__Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Catalog__Products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category` (`category_id`),
  CONSTRAINT `Catalog__Products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Catalog__Categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Catalog__Products`
--

LOCK TABLES `Catalog__Products` WRITE;
/*!40000 ALTER TABLE `Catalog__Products` DISABLE KEYS */;
INSERT INTO `Catalog__Products` VALUES (1,'2014-08-02 00:00:00','2014-08-02 00:00:00','Getting Started with Phalcon',13.68,3,1,0);
/*!40000 ALTER TABLE `Catalog__Products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OAuth__Users`
--

DROP TABLE IF EXISTS `OAuth__Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OAuth__Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `social_id` smallint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OAuth__Users`
--

LOCK TABLES `OAuth__Users` WRITE;
/*!40000 ALTER TABLE `OAuth__Users` DISABLE KEYS */;
/*!40000 ALTER TABLE `OAuth__Users` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2014-10-02 23:17:23
