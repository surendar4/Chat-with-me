-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: chat_box
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.04.1

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
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `regd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `city` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data`
--

LOCK TABLES `data` WRITE;
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
INSERT INTO `data` VALUES (1,'surendar dharavath','1995-06-10','male','8714281098','2015-12-18 07:34:53','warangal','surendar1006@gmail.com'),(3,'bhukya pavan','1997-01-28','male','7396598103','2015-12-18 07:56:07','karimnagar','bhukyapavan100@gmail.com'),(4,'Kalyani','1998-10-18','female','9876543210','2015-12-18 08:02:05','hanamkonda','kalyani@gmail.com'),(5,'jithendar','1992-08-15','male','9000051173','2015-12-18 08:13:36','hyderabad','jithulfb@gmail.com'),(6,'sudhaker','1988-06-04','male','9948156180','2015-12-19 19:01:43','warangal','sudhaker@gmail.com'),(7,'kalyani dharavath','1997-10-18','female','9848161180','2015-12-21 15:46:02','hanamkonda','kalavathi@gmail.com'),(8,'ravi','0000-00-00','male','9493334681','2015-12-22 18:31:27','hnk','rs.ravinaik@gmail.com'),(9,'ramesh dharavath','1996-06-10','male','8978499481','2015-12-22 22:40:03','warangal','dharavath1996@gmail.com'),(10,'Dayakar','1998-02-13','male','9876543211','2015-12-23 17:12:48','hyd','ddayaker.gnwd@gmail.com'),(11,'Rohith','1996-02-06','male','9493931666','2015-12-30 18:22:55','clt','rohith_bunny@yahoo.co.in'),(12,'aditya','2015-12-31','male','9037489564','2015-12-31 21:03:04','calicut','aditya@gmail.com'),(13,'manu','0000-00-00','MALE','1234','2016-01-04 01:10:24','hyd','manu@manu.com');
/*!40000 ALTER TABLE `data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `dof` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `fid` (`fid`),
  KEY `id` (`id`),
  CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `data` (`id`),
  CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`id`) REFERENCES `data` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (8,1,'2015-12-22 18:34:29'),(1,8,'2015-12-22 18:34:29'),(10,1,'2015-12-24 07:56:24'),(1,10,'2015-12-24 07:56:24'),(12,1,'2015-12-31 21:05:27'),(1,12,'2015-12-31 21:05:27'),(1,13,'2016-01-04 01:15:35'),(13,1,'2016-01-04 01:15:35'),(4,5,'2016-01-17 00:35:15'),(5,4,'2016-01-17 00:35:15'),(4,6,'2016-01-17 00:35:17'),(6,4,'2016-01-17 00:35:17'),(4,11,'2016-01-17 00:35:19'),(11,4,'2016-01-17 00:35:19'),(4,7,'2016-01-17 00:35:22'),(7,4,'2016-01-17 00:35:22');
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'123','1995-06-10','8714281098','surendar1006@gmail.com'),(3,'pavan','1997-01-28','7396598103','bhukyapavan100@gmail.com'),(4,'123456','1998-10-18','9876543210','kalyani@gmail.com'),(5,'123','1992-08-15','9000051173','jithulfb@gmail.com'),(6,'123','1988-06-04','9948156180','sudhaker@gmail.com'),(7,'123456','1997-10-18','9848161180','kalavathi@gmail.com'),(8,'123','0000-00-00','9493334681','rs.ravinaik@gmail.com'),(9,'123','1996-06-10','8978499481','dharavath1996@gmail.com'),(10,'123','1998-02-13','9876543211','ddayaker.gnwd@gmail.com'),(11,'123','1996-02-06','9493931666','rohith_bunny@yahoo.co.in'),(12,'123','2015-12-31','9037489564','aditya@gmail.com'),(13,'manu','0000-00-00','1234','manu@manu.com');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `msg` varchar(400) DEFAULT NULL,
  `msgtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`),
  KEY `fid` (`fid`),
  KEY `id` (`id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `data` (`id`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id`) REFERENCES `data` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (85,1,3,'hiii','2016-01-17 00:38:03'),(86,1,5,'hii annaiah','2016-01-17 00:38:22'),(87,1,5,'fne w r u..??','2016-01-17 00:38:35'),(88,1,5,'avna','2016-01-17 00:38:40'),(89,12,1,'hii','2016-01-17 00:39:30'),(90,12,1,'m','2016-01-17 00:39:35'),(91,1,5,'jj','2016-01-17 00:40:07');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `dor` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,0,'2015-12-24 07:25:36'),(1,5,'2015-12-18 22:00:06'),(1,6,'2015-12-24 07:42:02'),(1,7,'2015-12-23 20:23:57'),(1,9,'2015-12-24 07:33:44'),(7,5,'2015-12-21 15:49:04'),(8,10,'2015-12-24 07:50:55'),(9,3,'2015-12-22 22:41:09'),(10,0,'2015-12-24 07:58:25'),(10,3,'2015-12-24 07:58:19'),(11,0,'2015-12-30 18:26:28'),(11,6,'2015-12-30 18:26:47'),(11,7,'2015-12-30 18:26:30'),(11,8,'2015-12-30 18:26:33'),(12,0,'2015-12-31 21:06:05'),(12,11,'2015-12-31 21:06:03'),(13,0,'2016-01-04 01:15:03'),(13,12,'2016-01-04 01:14:58');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-03  8:26:08
