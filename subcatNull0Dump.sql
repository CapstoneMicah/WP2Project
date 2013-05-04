-- MySQL dump 10.13  Distrib 5.1.66, for redhat-linux-gnu (i386)
--
-- Host: localhost    Database: mdetamor
-- ------------------------------------------------------
-- Server version	5.1.66-log

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
-- Table structure for table `partCategoryConfig`
--

DROP TABLE IF EXISTS `partCategoryConfig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partCategoryConfig` (
  `configID` int(4) NOT NULL AUTO_INCREMENT,
  `categoryID` int(4) NOT NULL,
  `subcategoryID` int(4) DEFAULT '0',
  PRIMARY KEY (`configID`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partCategoryConfig`
--

LOCK TABLES `partCategoryConfig` WRITE;
/*!40000 ALTER TABLE `partCategoryConfig` DISABLE KEYS */;
INSERT INTO `partCategoryConfig` VALUES (1,1,1),(2,1,9),(3,1,10),(4,1,11),(5,1,12),(6,2,9),(7,3,4),(8,3,14),(9,3,15),(10,3,16),(11,3,31),(12,4,4),(13,4,3),(14,4,2),(15,4,25),(16,5,3),(17,5,2),(18,7,28),(19,7,18),(20,7,19),(21,7,21),(22,7,25),(23,8,6),(24,8,7),(25,8,33),(26,8,34),(27,9,0),(28,9,25),(29,9,26),(30,9,27),(31,10,0),(32,12,22),(33,12,23),(34,12,24),(35,13,30),(36,13,31),(37,13,17),(38,14,32),(39,14,37),(40,16,36),(41,16,35),(42,17,0),(43,18,8);
/*!40000 ALTER TABLE `partCategoryConfig` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partSubcategory`
--

DROP TABLE IF EXISTS `partSubcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partSubcategory` (
  `subcategoryID` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`subcategoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partSubcategory`
--

LOCK TABLES `partSubcategory` WRITE;
/*!40000 ALTER TABLE `partSubcategory` DISABLE KEYS */;
INSERT INTO `partSubcategory` VALUES (1,'Handles'),(2,'Alternators'),(3,'Batteries'),(4,'Cables'),(5,'Coilovers'),(6,'Shocks'),(7,'Springs'),(8,'Motors'),(9,'Glass'),(10,'Hinges'),(11,'Latches'),(12,'Locks'),(13,'Seals'),(14,'Radios'),(15,'Amplifiers'),(16,'Speakers'),(17,'Dashboard'),(18,'Distributor'),(19,'Ignition Coils'),(20,'ECU'),(21,'Spark Plugs'),(22,'Head Lights'),(23,'Tail lights'),(24,'Fog Lights'),(25,'Sensors'),(26,'Valve Covers'),(27,'Belts'),(28,'Starters'),(29,'Radiators'),(30,'Seats'),(31,'Accessories'),(32,'Rotors'),(33,'Control Arms'),(34,'Knuckles'),(35,'Tie Rods'),(36,'Rack/Pinion'),(37,'Calipers'),(0,NULL);
/*!40000 ALTER TABLE `partSubcategory` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-04 15:18:16
