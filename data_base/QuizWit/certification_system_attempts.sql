-- MySQL dump 10.13  Distrib 8.0.26, for macos11 (x86_64)
--
-- Host: quizwit.cakcwgna7dgk.ap-south-1.rds.amazonaws.com    Database: certification_system
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `attempts`
--

DROP TABLE IF EXISTS `attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attempts` (
  `attempt_id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `fullname` char(30) NOT NULL,
  `registration_no` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `score` double NOT NULL,
  `total_marks` int NOT NULL,
  `correct` int NOT NULL,
  `wrong` int NOT NULL,
  `not_attempted` int NOT NULL,
  `pass_percentage` int NOT NULL,
  `no_of_questions` int NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`attempt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attempts`
--

LOCK TABLES `attempts` WRITE;
/*!40000 ALTER TABLE `attempts` DISABLE KEYS */;
INSERT INTO `attempts` VALUES (2,174,'PANKAJ GAUTAM','RA1811003030188','pankaj.gautam4012@gmail.com',2,10,2,4,4,60,10,'2021-09-23 11:59:14'),(5,174,'ISHWAR BAISLA','RA1811003030232','pankajgautam@gmail.com',0,10,0,0,10,60,10,'2021-09-24 11:02:19'),(6,181,'ISHWAR BAISLA','RA1811003030232','ishwar2303@gmail.com',1,5,1,3,1,80,5,'2021-09-24 19:12:20'),(7,103,'ISHWAR','RA1811003030232','ishwar2303@gmail.com',3,10,3,5,2,60,10,'2021-09-29 17:11:28'),(8,181,'JAY','111111','ajay1988du@gmail.com',3,5,3,2,0,80,5,'2021-10-06 14:20:45'),(9,181,'SHAILENDRA SINHA','1111111','shailendrasinha4379@gmail.com',4,5,4,1,0,80,5,'2021-10-06 14:21:16');
/*!40000 ALTER TABLE `attempts` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-15 17:30:08
