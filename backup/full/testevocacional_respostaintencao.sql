-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: testevocacional
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `respostaintencao`
--

DROP TABLE IF EXISTS `respostaintencao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respostaintencao` (
  `idRespostaIntencao` int(11) NOT NULL AUTO_INCREMENT,
  `idIntencao` int(11) NOT NULL,
  `idPerguntaRespota` int(11) NOT NULL,
  PRIMARY KEY (`idRespostaIntencao`),
  KEY `fk_respostaIntencao_Intencao1_idx` (`idIntencao`),
  KEY `fk_respostaIntencao_perguntaRespota1_idx` (`idPerguntaRespota`),
  CONSTRAINT `fk_respostaIntencao_Intencao1` FOREIGN KEY (`idIntencao`) REFERENCES `intencao` (`idIntencao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_respostaIntencao_perguntaRespota1` FOREIGN KEY (`idPerguntaRespota`) REFERENCES `perguntarespota` (`idPerguntaRespota`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostaintencao`
--

LOCK TABLES `respostaintencao` WRITE;
/*!40000 ALTER TABLE `respostaintencao` DISABLE KEYS */;
INSERT INTO `respostaintencao` VALUES (1,1,2),(2,1,4),(3,1,5),(4,1,7),(5,1,9),(6,1,11),(7,1,13),(8,1,15),(9,1,17),(10,1,19),(11,1,21),(12,1,24),(13,2,2),(14,2,3),(15,2,5),(16,2,7),(17,2,9),(18,2,11),(19,2,13),(20,2,15),(21,2,18),(22,2,20),(23,2,21),(24,2,23),(25,3,1),(26,3,3),(27,3,5),(28,3,7),(29,3,9),(30,3,11),(31,3,14),(32,3,15),(33,3,17),(34,3,19),(35,3,21),(36,3,23),(37,4,1),(38,4,3),(39,4,5),(40,4,8),(41,4,9),(42,4,11),(43,4,13),(44,4,15),(45,4,17),(46,4,19),(47,4,21),(48,4,24),(49,5,2),(50,5,4),(51,5,5),(52,5,7),(53,5,10),(54,5,11),(55,5,13),(56,5,15),(57,5,18),(58,5,19),(59,5,21),(60,5,24),(61,6,1),(62,6,3),(63,6,5),(64,6,7),(65,6,9),(66,6,11),(67,6,13),(68,6,15),(69,6,18),(70,6,20),(71,6,21),(72,6,24),(73,7,1),(74,7,3),(75,7,5),(76,7,7),(77,7,9),(78,7,11),(79,7,14),(80,7,15),(81,7,17),(82,7,19),(83,7,21),(84,7,23),(85,8,1),(86,8,3),(87,8,6),(88,8,8),(89,8,9),(90,8,11),(91,8,13),(92,8,15),(93,8,18),(94,8,19),(95,8,22),(96,8,23),(97,9,1),(98,9,3),(99,9,5),(100,9,7),(101,9,9),(102,9,11),(103,9,14),(104,9,15),(105,9,17),(106,9,19),(107,9,21),(108,9,23);
/*!40000 ALTER TABLE `respostaintencao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-27 18:47:08
