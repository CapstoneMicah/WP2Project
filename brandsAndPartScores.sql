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
-- Table structure for table `vehiclePartScore`
--

DROP TABLE IF EXISTS `vehiclePartScore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiclePartScore` (
  `vehicleConfigID` int(6) NOT NULL,
  `partID` int(6) NOT NULL,
  `upScore` int(4) NOT NULL DEFAULT '0',
  `downScore` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vehicleConfigID`,`partID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiclePartScore`
--

LOCK TABLES `vehiclePartScore` WRITE;
/*!40000 ALTER TABLE `vehiclePartScore` DISABLE KEYS */;
INSERT INTO `vehiclePartScore` VALUES (5,1,1,0),(1,5,5,0),(1,4,1,1),(1,3,1,3),(1,6,10,0),(1,7,1,0);
/*!40000 ALTER TABLE `vehiclePartScore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `brandID` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`brandID`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'SuperDoor'),(2,'A-1 CARDONE'),(3,'AAE'),(4,'ACC'),(5,'ACDELCO'),(6,'ACI'),(7,'ADVICS'),(8,'AIMCO'),(9,'AIR LIFT'),(10,'AIRTEX'),(11,'AUTOLINE'),(12,'AUTOLITE'),(13,'KELSEY-HAYES'),(14,'AUTOTEMP'),(15,'BALKAMP'),(16,'BECK/ARNLEY'),(17,'BOSCH'),(18,'BREMBO'),(19,'CARDONE SELECT'),(20,'CARLSON'),(21,'CHAMPION'),(22,'CHILTON'),(23,'CHRYSLER'),(24,'CTEK'),(25,'DAYCO'),(26,'DEEZA'),(27,'DELPHI'),(28,'DENSO'),(29,'DETROIT IRON'),(30,'DMGREENTECH'),(31,'DORMAN'),(32,'DURALAST'),(33,'EBC'),(34,'EXCEL'),(35,'FALCON'),(36,'FEDERAL PARTS'),(37,'FEDERATED'),(38,'FEL-PRO'),(39,'FENCO/FENWICK'),(40,'FLENNOR'),(41,'FORD'),(42,'FOUR SEASONS'),(43,'FRAM'),(44,'GATES'),(45,'GE'),(46,'GM'),(47,'GOODYEAR'),(48,'HAYNES'),(49,'HITACHI'),(50,'HUSKY'),(51,'MOTORCRAFT'),(52,'NGK'),(53,'NISSENS'),(54,'NORTHSTAR'),(55,'PENNZOIL'),(56,'PHILIPS'),(57,'PIONEER'),(58,'PLATINUM PRO'),(59,'PRO-TEC'),(60,'PROSPARK'),(61,'ENERGY'),(62,'PUROLATOR'),(63,'PYTHON'),(64,'QUAKER STATE'),(65,'SHERMAN'),(66,'SILVERLINE'),(67,'SNG SENSORS'),(68,'SPARTAN'),(69,'STANT'),(70,'SYLVANIA'),(71,'TIMBREN'),(72,'TIMKEN'),(73,'TOYOTA'),(74,'VALEO'),(75,'VALUCRAFT'),(76,'VICTOR REINZ');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-03 12:50:36
