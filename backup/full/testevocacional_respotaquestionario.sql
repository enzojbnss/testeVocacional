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
-- Table structure for table `respotaquestionario`
--

DROP TABLE IF EXISTS `respotaquestionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respotaquestionario` (
  `idrespotaquestionario` int(11) NOT NULL AUTO_INCREMENT,
  `idQuestionario` int(11) NOT NULL,
  `idPerguntaRespota` int(11) NOT NULL,
  PRIMARY KEY (`idrespotaquestionario`),
  KEY `fk_respotaquestionario_questionario1_idx` (`idQuestionario`),
  KEY `fk_respotaquestionario_perguntaRespota1_idx` (`idPerguntaRespota`),
  CONSTRAINT `fk_respotaquestionario_perguntaRespota1` FOREIGN KEY (`idPerguntaRespota`) REFERENCES `perguntarespota` (`idPerguntaRespota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_respotaquestionario_questionario1` FOREIGN KEY (`idQuestionario`) REFERENCES `questionario` (`idQuestionario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respotaquestionario`
--

LOCK TABLES `respotaquestionario` WRITE;
/*!40000 ALTER TABLE `respotaquestionario` DISABLE KEYS */;
INSERT INTO `respotaquestionario` VALUES (1,1,1),(2,1,4),(3,1,5),(4,1,8),(5,1,9),(6,1,12),(7,1,13),(8,1,16),(9,1,17),(10,1,20),(11,1,21),(12,1,24);
/*!40000 ALTER TABLE `respotaquestionario` ENABLE KEYS */;
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
