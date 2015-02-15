-- MySQL dump 10.11
--
-- Host: localhost    Database: guest
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
-- Table structure for table `guestlist`
--

DROP TABLE IF EXISTS `guestlist`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `guestlist` (
  `serial` int(11) NOT NULL auto_increment,
  `name` varchar(20) default NULL,
  `btime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `msg` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `btitle` varchar(30) default NULL,
  `flag` set('Y','N') default 'Y',
  PRIMARY KEY  (`serial`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `guestlist`
--

LOCK TABLES `guestlist` WRITE;
/*!40000 ALTER TABLE `guestlist` DISABLE KEYS */;
INSERT INTO `guestlist` VALUES (1,'fanyd','2015-02-15 06:16:47','test','fanyd@liujin.cn','test','Y'),(2,'abcd','2015-02-15 09:30:25','djalfdaf','acds@liujin.ccom','sdlfj','Y');
/*!40000 ALTER TABLE `guestlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replylist`
--

DROP TABLE IF EXISTS `replylist`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `replylist` (
  `serial` int(11) NOT NULL auto_increment,
  `name` varchar(20) default NULL,
  `btime` timestamp NOT NULL default '0000-00-00 00:00:00',
  `msg` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `btitle` varchar(30) default NULL,
  `flag` set('Y','N') default 'Y',
  PRIMARY KEY  (`serial`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `replylist`
--

LOCK TABLES `replylist` WRITE;
/*!40000 ALTER TABLE `replylist` DISABLE KEYS */;
INSERT INTO `replylist` VALUES (1,'fanyd','2015-02-15 06:16:47','test','fanyd@liujin.cn','test','Y'),(2,'sadfas','2015-02-15 09:50:09','asdfjsa;fa','asasdf@liujin.cn','sdlfj','Y');
/*!40000 ALTER TABLE `replylist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-15 10:01:14
