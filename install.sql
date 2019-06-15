CREATE DATABASE  IF NOT EXISTS `park` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci */;
USE `park`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 13.229.0.90    Database: park
-- ------------------------------------------------------
-- Server version	5.7.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `holding_create_date_time` datetime DEFAULT NULL,
  `holding_end_date_time` datetime DEFAULT NULL,
  `payment_create_date_time` datetime DEFAULT NULL,
  `arrival_date_time` datetime DEFAULT NULL,
  `leave_date_time` datetime DEFAULT NULL,
  `charge_amount` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `user_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `park_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `progress_time` int(11) DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,'2019-04-30 18:18:46','2019-04-30 18:48:46','2019-04-30 18:18:54','2019-04-30 18:18:54','2019-04-30 18:19:16','100','2','8',2,'complete'),(2,'2019-04-30 18:20:09','2019-04-30 18:50:09','2019-04-30 18:20:16','2019-04-30 18:20:16','2019-04-30 18:20:19','100','18','8',2,'complete'),(3,'2019-04-30 18:20:40','2019-04-30 18:50:40','2019-04-30 18:20:44','2019-04-30 18:20:44','2019-04-30 18:20:53','100','18','8',2,'complete'),(4,'2019-04-30 18:22:47','2019-04-30 18:52:47','2019-04-30 22:17:42','2019-04-30 22:17:42','2019-04-30 22:17:50','100','18','8',2,'complete'),(5,'2019-04-30 18:27:33','2019-04-30 18:57:33','2019-04-30 18:27:38','2019-04-30 18:27:38','2019-04-30 22:16:02','100','19','11',2,'complete'),(6,'2019-04-30 18:42:33','2019-04-30 19:12:33','2019-04-30 18:43:46','2019-04-30 18:43:46','2019-04-30 18:43:50','100','18','10',2,'complete'),(7,'2019-04-30 18:42:35','2019-04-30 19:12:35','2019-04-30 18:44:14','2019-04-30 18:44:14','2019-04-30 18:44:18','100','18','1',2,'complete'),(8,'2019-04-30 18:42:45','2019-04-30 19:12:45','2019-04-30 18:43:59','2019-04-30 18:43:59','2019-04-30 18:44:01','100','18','9',2,'complete'),(9,'2019-04-30 18:42:46','2019-04-30 19:12:46','2019-04-30 18:43:53','2019-04-30 18:43:53','2019-04-30 18:43:56','100','18','12',2,'complete'),(10,'2019-04-30 18:42:47','2019-04-30 19:12:47','2019-04-30 18:44:04','2019-04-30 18:44:04','2019-04-30 18:44:07','100','18','6',2,'complete'),(11,'2019-04-30 18:42:48','2019-04-30 19:12:48','2019-04-30 18:44:09','2019-04-30 18:44:09','2019-04-30 18:44:12','100','18','3',2,'complete'),(12,'2019-04-30 18:42:57','2019-04-30 19:12:57','2019-04-30 18:44:20','2019-04-30 18:44:20','2019-04-30 18:44:29','100','18','22',2,'complete'),(13,'2019-04-30 18:42:59','2019-04-30 19:12:59','2019-04-30 18:44:23','2019-04-30 18:44:23','2019-04-30 18:44:26','100','18','19',2,'complete'),(14,'2019-04-30 18:43:00','2019-04-30 19:13:00','2019-04-30 18:44:31','2019-04-30 18:44:31','2019-04-30 18:44:37','100','18','16',2,'complete'),(15,'2019-04-30 18:43:01','2019-04-30 19:13:01','2019-04-30 18:44:34','2019-04-30 18:44:34','2019-04-30 18:44:39','100','18','13',2,'complete'),(16,'2019-04-30 18:43:06','2019-04-30 19:13:06','2019-04-30 18:44:42','2019-04-30 18:44:42','2019-04-30 18:44:45','100','18','14',2,'complete'),(17,'2019-04-30 18:43:07','2019-04-30 19:13:07','2019-04-30 18:44:48','2019-04-30 18:44:48','2019-04-30 18:44:50','100','18','15',2,'complete'),(18,'2019-04-30 18:43:11','2019-04-30 19:13:11','2019-04-30 18:44:53','2019-04-30 18:44:53','2019-04-30 18:44:56','100','18','21',2,'complete'),(19,'2019-04-30 18:43:12','2019-04-30 19:13:12','2019-04-30 18:44:59','2019-04-30 18:44:59','2019-04-30 18:45:01','100','18','28',2,'complete'),(20,'2019-04-30 18:43:13','2019-04-30 19:13:13','2019-04-30 18:45:04','2019-04-30 18:45:04','2019-04-30 18:45:07','100','18','27',2,'complete'),(21,'2019-04-30 18:43:14','2019-04-30 19:13:14','2019-04-30 18:45:10','2019-04-30 18:45:10','2019-04-30 18:45:13','100','18','26',2,'complete'),(22,'2019-04-30 18:43:15','2019-04-30 19:13:15','2019-04-30 18:45:16','2019-04-30 18:45:16','2019-04-30 18:45:18','100','18','25',2,'complete'),(23,'2019-04-30 18:46:34','2019-04-30 19:16:34','2019-04-30 18:46:38','2019-04-30 18:46:38','2019-04-30 18:46:41','100','1','1',2,'complete'),(24,'2019-04-30 18:46:44','2019-04-30 19:16:44','2019-06-15 12:39:13',NULL,NULL,'100','1','1',2,'paid'),(25,'2019-04-30 18:50:41','2019-04-30 19:20:41',NULL,NULL,NULL,NULL,'1','10',NULL,'holding'),(26,'2019-04-30 18:51:04','2019-04-30 19:21:04',NULL,NULL,NULL,NULL,'1','12',NULL,'holding'),(27,'2019-04-30 18:51:05','2019-04-30 19:21:05',NULL,NULL,NULL,NULL,'1','9',NULL,'holding'),(28,'2019-04-30 18:51:06','2019-04-30 19:21:06',NULL,NULL,NULL,NULL,'1','6',NULL,'holding'),(29,'2019-04-30 18:51:07','2019-04-30 19:21:07',NULL,NULL,NULL,NULL,'1','3',NULL,'holding'),(30,'2019-04-30 18:51:09','2019-04-30 19:21:09',NULL,NULL,NULL,NULL,'1','22',NULL,'holding'),(31,'2019-04-30 18:51:13','2019-04-30 19:21:13',NULL,NULL,NULL,NULL,'1','19',NULL,'holding'),(32,'2019-04-30 18:51:15','2019-04-30 19:21:15',NULL,NULL,NULL,NULL,'1','16',NULL,'holding'),(33,'2019-04-30 18:51:16','2019-04-30 19:21:16',NULL,NULL,NULL,NULL,'1','13',NULL,'holding'),(34,'2019-04-30 18:51:20','2019-04-30 19:21:20',NULL,NULL,NULL,NULL,'1','14',NULL,'holding'),(35,'2019-04-30 18:51:21','2019-04-30 19:21:21',NULL,NULL,NULL,NULL,'1','15',NULL,'holding'),(36,'2019-04-30 18:51:25','2019-04-30 19:21:25',NULL,NULL,NULL,NULL,'1','21',NULL,'holding'),(37,'2019-04-30 18:51:26','2019-04-30 19:21:26','2019-04-30 18:51:38','2019-04-30 18:51:38','2019-04-30 18:51:41','100','1','28',2,'complete'),(38,'2019-04-30 18:51:27','2019-04-30 19:21:27',NULL,NULL,NULL,NULL,'1','27',NULL,'holding'),(39,'2019-04-30 18:51:28','2019-04-30 19:21:28',NULL,NULL,NULL,NULL,'1','26',NULL,'holding'),(40,'2019-04-30 18:51:29','2019-04-30 19:21:29',NULL,NULL,NULL,NULL,'1','25',NULL,'holding'),(41,'2019-04-30 18:51:43','2019-04-30 19:21:43',NULL,NULL,NULL,NULL,'1','28',NULL,'holding'),(42,'2019-04-30 22:53:53','2019-04-30 23:23:53','2019-04-30 22:54:12','2019-04-30 22:54:12','2019-05-01 00:02:56','100','18','8',2,'complete'),(43,'2019-05-01 00:03:00','2019-05-01 00:33:00','2019-05-01 00:03:07','2019-05-01 00:03:07','2019-05-01 00:03:30','100','18','8',2,'complete'),(44,'2019-05-01 00:05:30','2019-05-01 00:35:30','2019-05-01 00:05:54','2019-05-01 00:05:54','2019-05-01 00:06:10','100','18','8',2,'complete'),(45,'2019-05-01 00:07:39','2019-05-01 00:37:39','2019-05-01 00:08:24','2019-05-01 00:08:24','2019-05-01 01:17:44','100','18','8',2,'complete'),(46,'2019-05-01 01:20:14','2019-05-01 01:50:14','2019-05-01 01:20:26','2019-05-01 01:20:26','2019-05-01 01:20:33','100','20','8',2,'complete'),(47,'2019-05-01 01:32:04','2019-05-01 02:02:04','2019-05-01 01:32:12','2019-05-01 01:32:12','2019-05-01 01:32:31','100','20','8',2,'complete'),(48,'2019-05-01 01:34:43','2019-05-01 02:04:43','2019-05-01 01:35:05','2019-05-01 01:35:05','2019-05-01 01:39:32','100','21','8',2,'complete'),(49,'2019-05-01 01:39:41','2019-05-01 02:09:41',NULL,NULL,NULL,NULL,'21','4',NULL,'holding'),(50,'2019-05-01 01:39:45','2019-05-01 02:09:45',NULL,NULL,NULL,NULL,'21','7',NULL,'holding'),(51,'2019-05-01 01:39:47','2019-05-01 02:09:47',NULL,NULL,NULL,NULL,'21','11',NULL,'holding'),(52,'2019-05-01 01:41:35','2019-05-01 02:11:35','2019-05-01 01:41:45','2019-05-01 01:41:45','2019-05-01 01:42:10','100','23','8',2,'complete'),(53,'2019-05-01 01:46:41','2019-05-01 02:16:41','2019-05-01 01:47:04','2019-05-01 01:47:04','2019-05-01 01:48:28','100','24','8',2,'complete'),(54,'2019-05-01 01:50:02','2019-05-01 02:20:02','2019-05-01 01:50:12','2019-05-01 01:50:12','2019-05-01 01:50:36','100','25','8',2,'complete'),(55,'2019-05-01 02:08:14','2019-05-01 02:38:14','2019-05-01 02:11:53','2019-05-01 02:11:53','2019-05-01 02:13:51','100','25','8',2,'complete'),(56,'2019-05-01 02:14:07','2019-05-01 02:44:07','2019-05-01 02:14:12','2019-05-01 02:14:12','2019-05-01 02:14:17','100','25','8',2,'complete'),(57,'2019-05-01 02:35:50','2019-05-01 03:05:50','2019-05-01 02:35:59','2019-05-01 02:35:59','2019-05-01 02:36:06','100','25','8',2,'complete'),(58,'2019-05-01 02:36:12','2019-05-01 03:06:12','2019-05-01 02:36:15','2019-05-01 02:36:15','2019-05-01 02:36:20','100','25','8',2,'complete'),(59,'2019-05-01 02:36:38','2019-05-01 03:06:38','2019-05-01 02:36:46','2019-05-01 02:36:46',NULL,'100','25','8',2,'arrival');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parking`
--

DROP TABLE IF EXISTS `parking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `parking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `amount` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `size` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `operation_status` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking`
--

LOCK TABLES `parking` WRITE;
/*!40000 ALTER TABLE `parking` DISABLE KEYS */;
INSERT INTO `parking` VALUES (1,'A1','50','1',22.3123397,114.2238104,'inactive','active'),(2,'A2','50','1',22.3254694,114.2046898,'active','active'),(3,'A3','50','1',22.3234889,114.2087693,'inactive','active'),(4,'A4','50','1',22.3123397,114.2238104,'inactive','active'),(5,'A5','50','1',22.3254694,114.2046898,'active','active'),(6,'A6','50','1',22.3234889,114.2087693,'inactive','active'),(7,'A7','40','1',22.3123397,114.2238104,'inactive','active'),(8,'A8','50','1',22.3254694,114.2046898,'inactive','active'),(9,'A9','50','1',22.3234889,114.2087693,'inactive','active'),(10,'A10','50','1',22.3123397,114.2238104,'inactive','active'),(11,'A11','50','1',22.3254694,114.2046898,'inactive','active'),(12,'A12','50','1',22.3234889,114.2087693,'inactive','active'),(13,'A13','50','1',22.3123397,114.2238104,'inactive','active'),(14,'A14','50','1',22.3254694,114.2046898,'inactive','active'),(15,'A15','50','1',22.3234889,114.2087693,'inactive','active'),(16,'A16','40','1',22.3123397,114.2238104,'inactive','active'),(17,'A17','50','1',22.3254694,114.2046898,'active','active'),(18,'A18','50','1',22.3234889,114.2087693,'active','active'),(19,'A19','50','1',22.3234889,114.2087693,'inactive','active'),(20,'A20','40','1',22.3123397,114.2238104,'active','active'),(21,'A21','50','1',22.3254694,114.2046898,'inactive','active'),(22,'A22','50','1',22.3234889,114.2087693,'inactive','active'),(23,'A23','40','1',22.3123397,114.2238104,'active','active'),(24,'A24','50','1',22.3254694,114.2046898,'active','active'),(25,'A25','50','1',22.3234889,114.2087693,'inactive','active'),(26,'A26','40','1',22.3123397,114.2238104,'inactive','active'),(27,'A27','50','1',22.3254694,114.2046898,'inactive','active'),(28,'A28','50','1',22.3234889,114.2087693,'inactive','active'),(29,'A29','40','1',22.3123397,114.2238104,'active','active'),(30,'A30','50','1',22.3254694,114.2046898,'active','active'),(31,'A31','50','1',22.3234889,114.2087693,'active','active'),(32,'A32','50','1',22.3254694,114.2046898,'active','active'),(33,'A33','50','1',22.3234889,114.2087693,'active','active'),(34,'A34','50','1',22.3254694,114.2046898,'active','active'),(35,'A35','50','1',22.3234889,114.2087693,'active','active'),(36,'A36','50','1',22.3254694,114.2046898,'active','active'),(37,'A37','50','1',22.3234889,114.2087693,'active','active');
/*!40000 ALTER TABLE `parking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `license` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT 'default_user.png',
  `hkid` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'11','11'),(2,'22','22'),(3,'33','33'),(4,'hk123','Y546380'),(5,'3','3'),(6,'g123','y5666666'),(7,'HK1234','Y546380'),(8,'HK7890','Y546386'),(9,'FUFK5866','FJGI75969'),(10,'q123457','y3333333'),(11,'CD1234','Y8888888'),(12,'AB1234','Y7777777'),(13,'VB1234','Y7666666'),(14,'BH1234','Y7468288'),(15,'HJ1234','Y2473839'),(16,'CD1626','Y277819929'),(17,'HD7177','YFHJDKJD'),(18,'AB1234','Y5463805'),(19,'PC1234','Y5678900'),(20,'ER1234','Y5555555'),(21,'FF1234','Y7777777'),(22,'UI1234','Y0000000'),(23,'GG1234','Y6666666'),(24,'HH3456','Y2222222'),(25,'SS3456','Y9999999');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_park_booking`
--

DROP TABLE IF EXISTS `view_park_booking`;
/*!50001 DROP VIEW IF EXISTS `view_park_booking`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_park_booking` AS SELECT 
 1 AS `id`,
 1 AS `code`,
 1 AS `amount`,
 1 AS `size`,
 1 AS `parking_status`,
 1 AS `booking_id`,
 1 AS `holding_create_date_time`,
 1 AS `holding_end_date_time`,
 1 AS `payment_create_date_time`,
 1 AS `charge_amount`,
 1 AS `booking_status`,
 1 AS `user_id`,
 1 AS `user_license`,
 1 AS `user_hkid`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_park_booking`
--

/*!50001 DROP VIEW IF EXISTS `view_park_booking`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_park_booking` AS select `parking`.`id` AS `id`,`parking`.`code` AS `code`,`parking`.`amount` AS `amount`,`parking`.`size` AS `size`,`parking`.`status` AS `parking_status`,`booking`.`id` AS `booking_id`,`booking`.`holding_create_date_time` AS `holding_create_date_time`,`booking`.`holding_end_date_time` AS `holding_end_date_time`,`booking`.`payment_create_date_time` AS `payment_create_date_time`,`booking`.`charge_amount` AS `charge_amount`,`booking`.`status` AS `booking_status`,`booking`.`user_id` AS `user_id`,`users`.`license` AS `user_license`,`users`.`hkid` AS `user_hkid` from ((`parking` left join `booking` on((`parking`.`id` = `booking`.`park_id`))) left join `users` on((`booking`.`user_id` = `users`.`id`))) where (`booking`.`status` is not null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-15 12:46:29
