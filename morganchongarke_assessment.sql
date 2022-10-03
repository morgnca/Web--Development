-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: morganchongarke_assessment
-- ------------------------------------------------------
-- Server version 	8.0.30-0ubuntu0.20.04.2
-- Date: Thu, 15 Sep 2022 21:57:28 +0000

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `drinks`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drinks` (
  `drink_id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `drink_name` varchar(20) NOT NULL,
  `price` float unsigned NOT NULL,
  `available` enum('true','false') NOT NULL,
  `dairy` enum('true','false') NOT NULL,
  `vegetarian` enum('true','false') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`drink_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drinks`
--

LOCK TABLES `drinks` WRITE;
/*!40000 ALTER TABLE `drinks` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `drinks` VALUES (1,'Up & Go',3.2,'true','true','true'),(2,'Berry Smoothie',5.5,'false','false','true'),(3,'Pump Water',3.5,'true','false','true'),(4,'Ice Tea',4,'true','false','true'),(5,'E2',2.8,'true','false','true'),(6,'Keri Juice',3.3,'false','false','true'),(7,'Powerade',4.3,'false','false','true'),(8,'Hot Chocolate',4,'true','true','true'),(9,'Espresso Coffee',4.5,'true','true','true'),(10,'Herbal Tea',3,'false','false','true'),(11,'English Tea',3.5,'true','true','true');
/*!40000 ALTER TABLE `drinks` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `drinks` with 11 row(s)
--

--
-- Table structure for table `foods`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foods` (
  `food_id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `food_name` varchar(20) NOT NULL,
  `price` float unsigned NOT NULL,
  `available` enum('true','false') NOT NULL,
  `dairy` enum('true','false') NOT NULL,
  `vegetarian` enum('true','false') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foods`
--

LOCK TABLES `foods` WRITE;
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `foods` VALUES (1,'Beef Nachos',5.5,'true','true','false'),(2,'Bean Nachos',5.5,'false','true','true'),(3,'Salad',4.5,'false','false','true'),(4,'Sausage Roll',3,'false','true','true'),(5,'Panini',5,'true','true','false'),(6,'Ham Sandwich',3,'true','true','false'),(7,'Cheese Sandwich',3,'true','true','true'),(8,'Bacon & Egg Slice',5,'true','true','false'),(9,'Berry Muesli',4,'true','true','true'),(10,'BLT Sandwich',5.5,'true','false','false'),(11,'Chicken on Rice',6,'true','false','false'),(12,'Sushi 4x Packet',5,'false','false','false'),(13,'Croissant',4.5,'true','true','true'),(14,'Scone',3.5,'false','true','true'),(15,'Nutella Muffin',3.5,'true','true','true'),(16,'Caramel Slice',3.5,'false','true','true'),(17,'Lolly Cake',3.5,'false','true','true'),(18,'Cake',4,'true','true','true'),(19,'Choc Chip Cookie',2,'false','true','true'),(20,'Waffle',3,'false','true','true'),(21,'Jelly',1.8,'false','false','true'),(22,'Fruit Salad',4.5,'true','false','true');
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `foods` with 22 row(s)
--

--
-- Table structure for table `specials`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specials` (
  `week` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `food_id` tinyint unsigned NOT NULL,
  `drink_id` tinyint unsigned NOT NULL,
  `new_price` float unsigned NOT NULL,
  PRIMARY KEY (`week`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specials`
--

LOCK TABLES `specials` WRITE;
/*!40000 ALTER TABLE `specials` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `specials` VALUES (1,16,4,4.5),(2,5,7,5),(3,4,3,4.8),(4,17,2,4.5),(5,9,8,6),(6,14,6,4.8),(7,13,3,5),(8,15,4,5.5),(9,22,5,5.3),(10,7,11,4.8),(11,14,1,4),(12,15,5,8.3);
/*!40000 ALTER TABLE `specials` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `specials` with 12 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Thu, 15 Sep 2022 21:57:28 +0000
