-- MySQL dump 10.11
--
-- Host: localhost    Database: chat
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
-- Table structure for table `chatroom`
--

DROP TABLE IF EXISTS `chatroom`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `chatroom` (
  `id` int(11) NOT NULL auto_increment,
  `author` varchar(20) default NULL,
  `chattime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `emotion` varchar(20) default NULL,
  `action` varchar(20) default NULL,
  `color` varchar(20) default NULL,
  `text` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `chatroom`
--

LOCK TABLES `chatroom` WRITE;
/*!40000 ALTER TABLE `chatroom` DISABLE KEYS */;
INSERT INTO `chatroom` VALUES (1,'111','2015-02-16 06:58:27','','双手抱拳,作个辑道：各位朋友请了!','',''),(2,'zzz','2015-02-16 06:59:59','','板着脸，咬着牙说：不！我怎么这么笨','',''),(3,'zzz','2015-02-16 07:13:48','','开始认真考虑','',''),(4,'zzz','2015-02-16 07:14:12','','板着脸，咬着牙说：不！我怎么这么笨','',''),(5,'zzz','2015-02-16 07:16:12','','开始认真考虑','',''),(6,'111','2015-02-16 07:18:55','','双手抱拳,作个辑道：各位朋友请了!','',''),(7,'111','2015-02-16 07:19:07','','开始认真考虑','',''),(8,'111','2015-02-16 07:19:12','','摇了摇头，叹道：还不明白','',''),(9,'111','2015-02-16 07:19:26','','挺起胸膛，大声喊道：让我来说','',''),(10,'111','2015-02-16 07:53:57','难过的','','blue','asdfaf'),(11,'111','2015-02-16 07:54:19','难过的','','red','asdfaf'),(12,'111','2015-02-16 07:54:28','','','blue','asdf'),(13,'111','2015-02-16 07:54:34','傻呆呆的','','gray','sadfa');
/*!40000 ALTER TABLE `chatroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `name` varchar(20) default NULL,
  `password` varchar(20) default NULL,
  `is_online` set('1','0') default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'zzz','zzz','0'),(2,'111','111','0');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-16 10:07:19
