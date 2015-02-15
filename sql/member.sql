-- MySQL dump 10.11
--
-- Host: localhost    Database: member
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log

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
-- Table structure for table `administer`
--

DROP TABLE IF EXISTS `administer`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `administer` (
  `userid` varchar(30) default NULL,
  `password` varchar(20) default NULL,
  `ip` varchar(20) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `administer`
--

LOCK TABLES `administer` WRITE;
/*!40000 ALTER TABLE `administer` DISABLE KEYS */;
INSERT INTO `administer` VALUES ('12345','12345','127.0.0.1');
/*!40000 ALTER TABLE `administer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `card` (
  `serial` int(5) NOT NULL auto_increment,
  `cardno` varchar(20) NOT NULL,
  `cardpsd` varchar(20) NOT NULL,
  `balance` float NOT NULL,
  `cardlevel` varchar(20) default NULL,
  `cardstatus` varchar(2) default NULL,
  `addtime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`serial`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `card`
--

LOCK TABLES `card` WRITE;
/*!40000 ALTER TABLE `card` DISABLE KEYS */;
INSERT INTO `card` VALUES (1,'62853966','333333',100,'普通卡','N','2015-02-13 06:42:44'),(2,'62852966','222222',500,'银卡','Y','2014-07-09 16:00:00'),(3,'62851966','111111',1000,'金卡','Y','2014-07-09 16:00:00'),(4,'62850966','0',10000,'钻石卡','Y','2014-07-09 16:00:00');
/*!40000 ALTER TABLE `card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usercard`
--

DROP TABLE IF EXISTS `usercard`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `usercard` (
  `serial` int(5) NOT NULL auto_increment,
  `userid` varchar(30) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  PRIMARY KEY  (`serial`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `usercard`
--

LOCK TABLES `usercard` WRITE;
/*!40000 ALTER TABLE `usercard` DISABLE KEYS */;
INSERT INTO `usercard` VALUES (1,'123456','62853966');
/*!40000 ALTER TABLE `usercard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `userinfo` (
  `serial` int(5) NOT NULL auto_increment,
  `userid` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) default NULL,
  `addr` varchar(20) default NULL,
  `post` varchar(30) default NULL,
  `phone` varchar(20) NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY  (`serial`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `userinfo`
--

LOCK TABLES `userinfo` WRITE;
/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
INSERT INTO `userinfo` VALUES (1,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(2,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(3,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(4,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(5,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(6,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(7,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(8,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(9,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(10,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(11,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00'),(12,'123456','fanyd','123456','','88888888','310010','88888888','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-15 10:01:17
