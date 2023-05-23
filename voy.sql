-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: voy
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adregister`
--

DROP TABLE IF EXISTS `adregister`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adregister` (
  `AdminId` int(32) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adregister`
--

LOCK TABLES `adregister` WRITE;
/*!40000 ALTER TABLE `adregister` DISABLE KEYS */;
INSERT INTO `adregister` VALUES (1,'Nahom','natnaelmenelik@gmail.com','123456'),(29,'natishimelis','natishimelisg@gmail.com','Nati@1234'),(30,'massbu','mahlet59@gmail.com','mahlet59');
/*!40000 ALTER TABLE `adregister` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `BlogID` int(11) NOT NULL AUTO_INCREMENT,
  `blogName` varchar(128) NOT NULL,
  `Content` text NOT NULL,
  `Likes` int(11) DEFAULT NULL,
  `CommentID` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`BlogID`),
  KEY `CommentID` (`CommentID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`CommentID`) REFERENCES `comment` (`CommentID`),
  CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (5,'What is body image','Body image refers to how an individual sees their own body and how attractive they feel themselves to be.\r\n              Many people have concerns about their body image. These concerns often focus on weight, skin, hair, or the shape or size of a certain body part.\r\n              However, body image does not only stem from what we see in the mirror. According to some studies, a range of beliefs, experiences, and generalizations also contribute.\r\n              Throughout history, people have given importance to the beauty of the human body. Society, media, social media, and popular culture often shape these views, and this can affect how a person sees their own body. However, popular standards are not always helpful.\r\n              Constant bombardment by media images can cause people to feel uncomfortable about their body, leading to distress and ill health. It can also affect work, social life, and other aspects of life. This article will look at positive and negative body image and provide some tips on how to improve body image',NULL,NULL,NULL,70,'2022-06-06 14:03:49'),(6,'Why sexual education is important','Adolescents in our country are growing up in a world where circumstances are quite different now ,concerning the benefits and risks in life, from those of their parents or grandparents. They need proper support not only to navigate the biological, social and cognitive transitions of their life but also to prevent cases of sexual harassment and abuse which are now increasing at an alarming rate.\r\n              Sex education is an essential tool to help them learn about a broad range of topics related to biological, psychological and sociocultural perspectives of individual beings as well as a key intervention to prevent and reduce sexual harassment, assault and abuse. It just needs to be delivered in an age-appropriate and engaging way based on science and facts.\r\n              However, this important subject is still taboo in our conservative society due to some misconceptions or lack of appropriate knowledge about sex ed. Here are some misconceptions that need to be addressed.',NULL,NULL,NULL,71,'2022-06-06 14:03:31');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `BlogID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  PRIMARY KEY (`CommentID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (18,'nmktad','nmktad - 2022.06.28 - 11.32.01am.jpg'),(19,'natishimelis','natishimelis - 2022.06.29 - 10.57.12pm.jpg');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_temp`
--

DROP TABLE IF EXISTS `password_reset_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_temp`
--

LOCK TABLES `password_reset_temp` WRITE;
/*!40000 ALTER TABLE `password_reset_temp` DISABLE KEYS */;
INSERT INTO `password_reset_temp` VALUES ('natishimelisg@gmail.com','875cce2b7cb7c35354a852f27ce7328b3fa913091f','2022-06-08 19:45:44'),('natishimelisg@gmail.com','93ecf27f4f4969b0b8f1c11fc148138d4c22f0b8f8','2022-06-08 19:46:19'),('natishimelisg@gmail.com','565fcf210a6636eae86278b0fc02a920040d7c0a4b','2022-06-08 19:46:39'),('natishimelisg@gmail.com','602f48e0370ec5c5f2a3e0cb2c738a48e06fe7cbaf','2022-06-08 19:47:21'),('nmktadesse@gmail.com','692fb3420cd37422c18dba31b23ae15b4e46a4a86b','2022-06-08 19:47:40'),('natishimelisg@gmail.com','0f3db46c9cfa1938e26877a78a33c6973dc11b1470','2022-06-09 19:40:05'),('natishimelisg@gmail.com','6cdb78bea9d74a4bb643a7f5387aabb0583cfd1c3a','2022-06-09 19:47:54'),('nmktadesse@gmail.com','e697ac5d251770b20d3efd596dd3a15fd4963bc42d','2022-06-09 19:54:55'),('nmktadesse@gmail.com','b45350f9072c3c5b03d0246c7e8005172cb5226ca6','2022-06-09 20:09:31'),('natishimelisg@gmail.com','90bb8b1b2fb0bb634a90eed0cf22a211bfeba43da2','2022-06-09 20:09:45'),('natishimelisg@gmail.com','bd2947681fe9f8ff3adb31e05bba6468faa3ad2a4a','2022-06-09 20:10:05'),('natishimelisg@gmail.com','0ac4a60edada09e3587c83df8af1654bfd3a4d3a89','2022-06-09 20:10:11'),('natishimelisg@gmail.com','7ab54feda2766b878a27f0a3bb1e78b7b2f6b460f5','2022-06-09 20:13:48'),('natishimelisg@gmail.com','a6ddaae52c5b9e137b08a909d3a51b4c170dd0a2dd','2022-06-09 23:35:50'),('okitta9388@gmail.com','375d6d05bd33ce545c807b06722bd8be87a981fa9d','2022-06-30 12:11:37');
/*!40000 ALTER TABLE `password_reset_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submittions`
--

DROP TABLE IF EXISTS `submittions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submittions` (
  `SubID` int(11) NOT NULL,
  `Article_title` varchar(128) NOT NULL,
  `Article_content` text NOT NULL,
  `Category` varchar(128) NOT NULL,
  `Author` varchar(128) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submittions`
--

LOCK TABLES `submittions` WRITE;
/*!40000 ALTER TABLE `submittions` DISABLE KEYS */;
INSERT INTO `submittions` VALUES (11,'Nahom Temam','','','','2022-05-26 09:14:39',2),(12,'Test','Test','Test','NahomTM','2022-06-07 02:24:55',2),(13,'test 2','<p><em><strong>test</strong></em> this <u>paragraph</u></p>\r\n',' any','NahomTM','2022-06-07 08:33:29',2),(18,'test4','<p>hello again</p>\r\n','test4','Anonymous','2022-06-08 12:49:43',72);
/*!40000 ALTER TABLE `submittions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `IsWriter` tinyint(1) NOT NULL DEFAULT 0,
  `imagePath` varchar(128) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'Nahom','Temam','NahomTM','exopain2930@gmail.com','$2y$10$x2J.FwKy7BvFi0H9Cskj5uJxtYi5MLmwYbbo3Cz3lpeHS.R6ZWKWG',1,NULL,'2022-05-24 06:36:52',NULL),(4,'Nati','mina','yared','natenael@email.com','$2y$10$lIQ28cjs7PpZ31AR2x8UEO6FHtmhJefXKvFsiWqpBh3M4ovqWmN.a',1,NULL,'2022-05-24 18:41:53',NULL),(70,'Nathnael','Mekonnen','nmktad','nmktadesse@gmail.com','$2y$10$.SY7k6E2cpnbH4L6eB8rE.c2HXyJptyTbPvjfZRaScSTpIDsvzu/W',1,NULL,'2022-06-08 17:54:17',NULL),(71,'Nathnael','Shimelis','natishimelis','natishimelisg@gmail.com','$2y$10$8i7QuOrdP/pIIaqNyStgRuwfXk8HrQDZhZbfZdM94y0elC4WFQ0zK',1,NULL,'2022-06-06 14:04:32',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `validform`
--

DROP TABLE IF EXISTS `validform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `validform` (
  `FormID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(128) NOT NULL,
  `Why` text NOT NULL,
  `CV` varchar(128) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`FormID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `validform_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `validform`
--

LOCK TABLES `validform` WRITE;
/*!40000 ALTER TABLE `validform` DISABLE KEYS */;
INSERT INTO `validform` VALUES (7,'Nahom Temam','\r\n          reason to be a writer      ','../storage/validation_form_uploadsNahom TemamScreenshot (1).png','2022-05-24 06:35:02',2),(8,'Nati mina','\r\n                sasdhghdgsadgkashd','../storage/validation_form_uploads/Nati minaScreenshot (1).png','2022-05-24 18:40:37',4);
/*!40000 ALTER TABLE `validform` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-30 11:17:18
