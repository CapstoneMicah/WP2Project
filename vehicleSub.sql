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
-- Table structure for table `vehicleSubmodel`
--

DROP TABLE IF EXISTS `vehicleSubmodel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicleSubmodel` (
  `submodelID` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`submodelID`)
) ENGINE=MyISAM AUTO_INCREMENT=267 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicleSubmodel`
--

LOCK TABLES `vehicleSubmodel` WRITE;
/*!40000 ALTER TABLE `vehicleSubmodel` DISABLE KEYS */;
INSERT INTO `vehicleSubmodel` VALUES (1,'& Country'),(2,'(HEV)'),(3,'(PHEV)'),(4,'1500 2WD'),(5,'1500 4WD'),(6,'1500 PICKUP 2WD'),(7,'250'),(8,'250 (Coupe)'),(9,'250 AWD'),(10,'250/IS 250C'),(11,'2WD'),(12,'2WD EX'),(13,'2WD EXL'),(14,'2WD LX'),(15,'2WD TOURING'),(16,'3'),(17,'3 DI 4-Door'),(18,'3 DI 5-Door'),(19,'3 Mustang'),(20,'3.0'),(21,'3.0 AWD'),(22,'3.2 AWD'),(23,'3.2 AWD PZEV'),(24,'3.2 FWD'),(25,'3.2 FWD PZEV'),(26,'300 4MATIC'),(27,'300h'),(28,'350'),(29,'350 (Convertible)'),(30,'350 (Coupe)'),(31,'350 4 MATIC'),(32,'350 4MATIC'),(33,'350 4Matic (Coupe)'),(34,'350 4MATIC (Station Wagon)'),(35,'350 AWD'),(36,'350 BLUETEC'),(37,'350 BLUETEC 4MATIC'),(38,'350/IS 350C'),(39,'370Z ROADSTER Touring'),(40,'370Z Touring'),(41,'400 HYBRID'),(42,'450 4MATIC'),(43,'450h'),(44,'450h AWD'),(45,'460'),(46,'460 AWD'),(47,'460 L AWD'),(48,'4S'),(49,'4WD'),(50,'4WD EX'),(51,'4WD EXL'),(52,'4WD FFV'),(53,'4WD HYBRID'),(54,'4WD LX'),(55,'4WD TOURING'),(56,'4X2'),(57,'4X4'),(58,'4X4 EXT.'),(59,'4X4 SUPER CAB'),(60,'4X4 SuperCrew SVT'),(61,'5'),(62,'55 AMG'),(63,'550'),(64,'550 (Convertible)'),(65,'550 (Coupe)'),(66,'550 4MATIC'),(67,'570'),(68,'600'),(69,'600h L'),(70,'63 AMG'),(71,'63 AMG (Station Wagon)'),(72,'63 AMG Black Series (coupe)'),(73,'65 AMG'),(74,'7'),(75,'A8 W12'),(76,'Abarth'),(77,'Allroad'),(78,'ALTIMA 2.5S'),(79,'ALTIMA 2.5SL'),(80,'ALTIMA 3.5SL'),(81,'AMG'),(82,'Armada SE 5.6l 4x4'),(83,'Awd'),(84,'AWD 3.2'),(85,'BLUE'),(86,'c'),(87,'Carrera'),(88,'Carrera 4'),(89,'Carrera 4 Cabriolet'),(90,'Carrera 4S'),(91,'Carrera 4S Cabriolet'),(92,'Carrera Cabriolet'),(93,'Carrera S'),(94,'Carrera S Cabriolet'),(95,'CC 4MOTION'),(96,'Cherokee'),(97,'Cherokee 4WD'),(98,'Clubman'),(99,'CONNECT'),(100,'Convertible'),(101,'Cooper'),(102,'Cooper Clubman'),(103,'Cooper Convertible'),(104,'Cooper Countryman'),(105,'Cooper S'),(106,'Cooper S Clubman'),(107,'Cooper S Convertible'),(108,'Cooper S Countryman'),(109,'Cooper S Countryman All4'),(110,'Cooper Works'),(111,'Cooper Works All4 Countryman'),(112,'Cooper Works Clubman'),(113,'Cooper Works Convertible'),(114,'Coupe'),(115,'COUPE QUATTRO'),(116,'CROSSTREK AWD'),(117,'CRUISER 2WD'),(118,'CRUISER 4WD'),(119,'CRUISER WAGON 4WD'),(120,'CUBE 1.8 S'),(121,'CUBE 1.8 SL'),(122,'DX/LX'),(123,'ECO'),(124,'EV'),(125,'EVOLUTION'),(126,'EWB'),(127,'EX'),(128,'EX37 AWD Journey'),(129,'EX37 Journey'),(130,'EXPRESS 2WD CARGO'),(131,'EXPRESS 2WD PASS'),(132,'EXPRESS 2WD PASS MDPV'),(133,'EXPRESS CONV 2WD CARGO'),(134,'Extended Wagon'),(135,'F'),(136,'Fe Sport'),(137,'FFV'),(138,'FFV 4X2'),(139,'FFV 4X4 Supercab'),(140,'FFV FWD Police'),(141,'fortwo (Coupe)'),(142,'fortwo electric drive (convertible)'),(143,'FWD'),(144,'FWD 3.2'),(145,'FWD FFV'),(146,'FX37 AWD'),(147,'FX37 RWD'),(148,'FX50 AWD'),(149,'G37 CONVERTIBLE Journey'),(150,'G37 CONVERTIBLE Sport 6MT'),(151,'G37 sedan Journey'),(152,'G37 sedan Sport 6MT'),(153,'G37X COUPE AWD'),(154,'Gran Turismo'),(155,'GT'),(156,'GT-R'),(157,'GTS'),(158,'HEV FWD'),(159,'Hybrid'),(160,'HYBRID 4WD'),(161,'Hybrid LE'),(162,'Hybrid XLE'),(163,'Italia Spyder'),(164,'JUKE SV'),(165,'JX35 AWD'),(166,'KING-5.6LE LWB'),(167,'KING-5.6LE SWB'),(168,'KING-5.6LE-SWB'),(169,'KOUP'),(170,'LX/EX/EXL'),(171,'M35h'),(172,'M37 Base'),(173,'M37X Base'),(174,'M56 Base'),(175,'M56x'),(176,'M56X Base'),(177,'MATRIX'),(178,'MAXIMA 4-DOOR SEDAN 3.5S'),(179,'MAXIMA SV'),(180,'MURANO AWD LE'),(181,'PATHFINDER 2WD Platinum'),(182,'PATHFINDER 4WD Platinum'),(183,'PICKUP'),(184,'Pickup 2WD'),(185,'Pickup FFV 2WD'),(186,'Pickup FFV 4WD'),(187,'Plug-in Hybrid'),(188,'Police'),(189,'Police AWD'),(190,'Police FFV AWD'),(191,'Police FFV FWD'),(192,'Police FFV, AWD'),(193,'PPV'),(194,'QUATTRO'),(195,'QUEST LE'),(196,'QX56 2WD'),(197,'QX56 4WD'),(198,'R'),(199,'R SPEC'),(200,'ROGUE AWD SV'),(201,'Rover'),(202,'Rover Evoque'),(203,'Rover Sport'),(204,'Rover Sport Supercharged'),(205,'Rover Supercharged'),(206,'RS'),(207,'S'),(208,'S AUTOMATIC'),(209,'S Hybrid'),(210,'S-IPS'),(211,'SDN 4WD'),(212,'sDrive28i'),(213,'sDrive35i'),(214,'sDrive35is'),(215,'SE 5.6L 4X4'),(216,'SENTRA S'),(217,'SENTRA SL'),(218,'SENTRA SV'),(219,'SFE'),(220,'SIERRA 2WD'),(221,'SILVERADO 2WD'),(222,'SILVERADO 4WD'),(223,'SILVERADO CLASSIC 2WD'),(224,'SPORT'),(225,'SPORT 2WD'),(226,'SPORT 4WD'),(227,'SPORTBACK'),(228,'SPORTWAGEN'),(229,'ST'),(230,'SUBURBAN 2WD'),(231,'Super Sport'),(232,'Supercharged'),(233,'Supersports'),(234,'T5 AWD'),(235,'T5 FWD'),(236,'T6 AWD'),(237,'TAHOE 2WD HYBRID'),(238,'TAHOE 4WD HYBRID'),(239,'TITAN 4WD Crew Cab XE LWB'),(240,'TOURING/TOURING-TE'),(241,'TUNDRA 2WD'),(242,'Turbo'),(243,'Turbo S'),(244,'v'),(245,'VAN'),(246,'VANTAGE'),(247,'VANTAGE S'),(248,'VERSA S'),(249,'VERSA SV'),(250,'VITARA'),(251,'VITARA 4WD'),(252,'WAGON'),(253,'WAGON AWD'),(254,'WAGON/OUTBACK SPORT AWD'),(255,'WGN/OUTBACK SPT AWD'),(256,'xB'),(257,'xD'),(258,'xDrive'),(259,'xDrive Coupe'),(260,'xDrive Gran Turismo'),(261,'xDrive28i'),(262,'xDrive35i'),(263,'xDrive50i'),(264,'xDriveM'),(265,'YUKON XL 4WD'),(266,'YUKON XL AWD'),(0,NULL);
/*!40000 ALTER TABLE `vehicleSubmodel` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-04 17:58:08
