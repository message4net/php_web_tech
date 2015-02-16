-- MySQL dump 10.11
--
-- Host: localhost    Database: bookshop
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
-- Table structure for table `book_cart`
--

DROP TABLE IF EXISTS `book_cart`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `book_cart` (
  `chat_ID` int(12) NOT NULL auto_increment,
  `user_ID` varchar(30) default NULL,
  `book_ID` int(12) default NULL,
  `chat_session_ID` varchar(32) default NULL,
  `buy_num` int(12) default '1',
  `order_ID` int(10) default '0',
  `cart_time` int(12) default NULL,
  PRIMARY KEY  (`chat_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `book_cart`
--

LOCK TABLES `book_cart` WRITE;
/*!40000 ALTER TABLE `book_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_class`
--

DROP TABLE IF EXISTS `book_class`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `book_class` (
  `book_class_id` int(5) NOT NULL auto_increment,
  `book_class_name` varchar(30) default NULL,
  `book_type_id` int(12) default NULL,
  PRIMARY KEY  (`book_class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `book_class`
--

LOCK TABLES `book_class` WRITE;
/*!40000 ALTER TABLE `book_class` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_hot`
--

DROP TABLE IF EXISTS `book_hot`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `book_hot` (
  `hot_ID` int(10) NOT NULL auto_increment,
  `book_ID` int(10) default NULL,
  `hot_order` int(10) default NULL,
  PRIMARY KEY  (`hot_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `book_hot`
--

LOCK TABLES `book_hot` WRITE;
/*!40000 ALTER TABLE `book_hot` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_hot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_inf`
--

DROP TABLE IF EXISTS `book_inf`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `book_inf` (
  `bookid` int(12) NOT NULL auto_increment,
  `book_no` varchar(30) default NULL,
  `book_name` varchar(40) default NULL,
  `author` varchar(30) default NULL,
  `publisher` varchar(40) default NULL,
  `pub_date` datetime default NULL,
  `price` float default NULL,
  `price_m` float default NULL,
  `price_l_price` float default NULL,
  `book_storenum` int(4) default NULL,
  `book_class_id` int(5) default NULL,
  `book_type_id` int(4) default NULL,
  `book_index` mediumtext,
  `book_abstract` mediumtext,
  `book_level` tinyint(1) default '1',
  `book_level_pic` varchar(255) default NULL,
  `book_pic` varchar(255) default NULL,
  `input_date` datetime default NULL,
  `book_bs` varchar(2) default NULL,
  `book_view` int(10) default NULL,
  PRIMARY KEY  (`bookid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `book_inf`
--

LOCK TABLES `book_inf` WRITE;
/*!40000 ALTER TABLE `book_inf` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_inf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_new`
--

DROP TABLE IF EXISTS `book_new`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `book_new` (
  `new_ID` int(10) NOT NULL auto_increment,
  `book_ID` int(10) default NULL,
  `new_order` int(10) default NULL,
  PRIMARY KEY  (`new_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `book_new`
--

LOCK TABLES `book_new` WRITE;
/*!40000 ALTER TABLE `book_new` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_new` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_recommend`
--

DROP TABLE IF EXISTS `book_recommend`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `book_recommend` (
  `recom_ID` int(10) NOT NULL auto_increment,
  `book_ID` int(10) default NULL,
  `recom_order` int(10) default NULL,
  PRIMARY KEY  (`recom_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `book_recommend`
--

LOCK TABLES `book_recommend` WRITE;
/*!40000 ALTER TABLE `book_recommend` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_recommend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_type`
--

DROP TABLE IF EXISTS `book_type`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `book_type` (
  `book_type_id` int(4) NOT NULL auto_increment,
  `book_type_name` varchar(30) default NULL,
  PRIMARY KEY  (`book_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `book_type`
--

LOCK TABLES `book_type` WRITE;
/*!40000 ALTER TABLE `book_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_fmoney`
--

DROP TABLE IF EXISTS `order_fmoney`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `order_fmoney` (
  `fmoney_ID` int(10) NOT NULL auto_increment,
  `order_fmoney` tinyint(2) default NULL,
  PRIMARY KEY  (`fmoney_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `order_fmoney`
--

LOCK TABLES `order_fmoney` WRITE;
/*!40000 ALTER TABLE `order_fmoney` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_fmoney` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_info`
--

DROP TABLE IF EXISTS `order_info`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `order_info` (
  `order_ID` int(10) NOT NULL auto_increment,
  `user_name` varchar(30) default NULL,
  `order_post` varchar(10) default NULL,
  `order_addr` varchar(255) default NULL,
  `order_phone` varchar(20) default NULL,
  `order_mail` varchar(30) default NULL,
  `order_send` tinyint(2) default NULL,
  `order_num` int(4) default NULL,
  `order_money` float default '0',
  `order_state` tinyint(2) default '0',
  `order_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `order_not` text,
  PRIMARY KEY  (`order_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `order_info`
--

LOCK TABLES `order_info` WRITE;
/*!40000 ALTER TABLE `order_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_send`
--

DROP TABLE IF EXISTS `order_send`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `order_send` (
  `send_ID` int(10) NOT NULL auto_increment,
  `order_send` tinyint(2) default NULL,
  PRIMARY KEY  (`send_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `order_send`
--

LOCK TABLES `order_send` WRITE;
/*!40000 ALTER TABLE `order_send` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_send` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_message`
--

DROP TABLE IF EXISTS `user_message`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user_message` (
  `M_ID` int(10) NOT NULL auto_increment,
  `book_ID` int(10) default NULL,
  `user_ID` varchar(30) default NULL,
  `message_content` text,
  `message_time` int(12) default NULL,
  PRIMARY KEY  (`M_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `user_message`
--

LOCK TABLES `user_message` WRITE;
/*!40000 ALTER TABLE `user_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_message` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-16 10:07:03
