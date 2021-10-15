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
-- Table structure for table `quizes`
--

DROP TABLE IF EXISTS `quizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quizes` (
  `quiz_id` int NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(50) NOT NULL,
  `difficulty_level` char(30) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `number_of_questions` int NOT NULL,
  `is_active` int NOT NULL,
  `active_timing` bigint NOT NULL DEFAULT '0',
  `inactive_timing` bigint NOT NULL DEFAULT '0',
  `Exam_key` varchar(30) NOT NULL,
  `key_access` tinyint NOT NULL,
  `show_evaluation` tinyint NOT NULL DEFAULT '0',
  `shuffle` tinyint NOT NULL,
  `time_duration` int NOT NULL,
  `marks_per_question` int NOT NULL,
  `negative_marking` double NOT NULL,
  `passing_percentage` int NOT NULL,
  `admin_email_id` int NOT NULL,
  `time_stamp` varchar(100) NOT NULL,
  `object_type` int NOT NULL,
  `fetch_limit` int NOT NULL,
  PRIMARY KEY (`quiz_id`),
  KEY `admin_email_id` (`admin_email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizes`
--

LOCK TABLES `quizes` WRITE;
/*!40000 ALTER TABLE `quizes` DISABLE KEYS */;
INSERT INTO `quizes` VALUES (103,'C++ Programming','Intermediate','This Online C Programming Test is specially designed for you by industry experts.',10,1,0,0,'991100',0,1,0,1800,1,0,60,24,'2020-12-14 23:36:05',1,0),(126,'Design and Analysis of Algorithms','Intermediate','Exam Key : daa@1999\r\n<br/>\r\n<br/>Design and Analysis of Algorithm is very important for designing algorithm to solve different types of problems in the branch of computer science and information technology.',10,0,0,0,'daa@1999',0,0,0,2700,0,0,0,24,'2020-12-15 14:54:36',1,0),(134,'CODE - C','Intermediate','C and C++ Programming based Questions.\r\nTypes\r\n-> Output based\r\n-> Error search\r\n-> Theory\r\n- >Architecture\r\n-> OOPS',5,1,1611859500,1611861300,'23031999',1,0,0,-1,1,0.5,50,24,'2020-12-15 14:54:23',1,0),(140,'Quantitative Aptitude 1.0','Beginner','Arithmetic Ability test helps measure one\'s numerical ability, problem solving and mathematical skills. ... Every aspirant giving Quantitative Aptitude Aptitude test tries to solve maximum number of problems with maximum accuracy and speed.',30,0,0,0,'QA2021',1,0,1,900,2,1,60,24,'2021-04-12 02:35:41',2,5),(141,'C Programming Basic','Beginner','Practice Test',15,1,0,0,'CP2021',1,0,0,900,2,1,50,24,'2021-04-12 14:33:29',1,0),(150,'General Aptitude 1.0','Intermediate','Quantitative Aptitude : 20 Questions\r\nLogical Reasoning : 20 Questions\r\nVerbal ability : 20 Questions',60,1,0,0,'GA2021',1,0,1,1800,2,1,60,24,'2021-04-15 04:33:11',2,15),(155,'Quantitative Aptitude SBI PO','Intermediate','Quantitative Aptitude\r\nSBI PO',30,1,0,0,'QASBIPO2021',1,0,0,3600,4,1,60,24,'2021-04-16 17:18:36',1,0),(156,'Logical Reasoning 1.0','Intermediate','Logical Reasoning Questions To Prepare For SBI PO Exams',30,0,0,0,'LR2021',1,0,0,3600,1,0,60,24,'2021-04-16 19:25:22',1,0),(167,'C++ Programming 2.0','Intermediate','Predict Output',5,0,0,0,'CP2021',0,0,1,-1,2,1,60,24,'2021-04-17 15:08:53',1,0),(169,'Verbal Ability Statements and Conclusion','Intermediate','The given Statements and Conclusions Quiz Questions will make you efficient in the topic. By taking this Quiz, it will improve your Communication skills in the statements formation also it overcomes the difficulties in different competitive level of exams.',15,0,0,0,'VA2021',1,0,1,1800,1,0,60,24,'2021-04-21 17:22:28',1,0),(170,'Python','Beginner','Nothing',5,0,0,0,'mypython',0,0,1,900,1,1,70,24,'2021-04-21 13:42:02',1,0),(171,'Verbal Ability Spotting Errors 1.0','Intermediate','You need to spot sentences and error which are grammatically incorrect. This error can be anything. From noun to pronoun to singular/plural to word usage they can be anything.',15,0,0,0,'VA2021',1,0,0,1800,1,0,60,24,'2021-04-21 15:54:52',1,0),(172,'Verbal Ability Spotting Errors 2.0','Intermediate','You need to spot sentences and error which are grammatically incorrect. This error can be anything. From noun to pronoun to singular/plural to word usage they can be anything.',10,0,0,0,'VA2021',1,0,0,900,1,0,60,24,'2021-04-21 17:07:07',1,0),(173,'Quantitative Aptitude 2.0','Beginner','Arithmetic Ability test helps measure one\'s numerical ability, problem solving and mathematical skills. ... Every aspirant giving Quantitative Aptitude Aptitude test tries to solve maximum number of problems with maximum accuracy and speed.',5,0,0,0,'QA2021',1,0,0,900,1,0,70,24,'2021-04-22 15:40:53',1,0),(174,'C Programming Predict Output','Intermediate','NA',10,1,0,0,'CP2021',1,0,0,900,1,0,60,24,'2021-04-22 19:05:15',1,0),(175,'Verbal Ability Spotting Errors 3.0','Intermediate','You need to spot sentences and error which are grammatically incorrect. This error can be anything. From noun to pronoun to singular/plural to word usage they can be anything.',15,0,0,0,'VA2021',1,0,1,1800,2,1,50,24,'2021-04-23 11:03:01',1,0),(176,'Sitting Arrangement','Intermediate','The information given specifies the position of a few or all the persons in the arrangement. The positions are specified through conditions like: a particular person is sitting right or left of the other person.\r\nYou have to determine the correct sitting order then answer the provided questions.',6,0,0,0,'SA2021',1,0,0,900,4,2,60,24,'2021-04-23 14:27:42',1,0),(177,'JAVA Building Concepts','Intermediate','Especially design to hone your skills.',5,1,0,0,'JAVA2021',0,0,0,-1,1,0,60,24,'2021-09-19 03:51:46',1,0),(180,'Cloze Test 1.0','Beginner','At certain points you are given a choice of four words one of which fits the meaning of the passage. Click on the option which you think is most suitable at the point.',10,1,0,0,'FB2021',1,1,0,900,1,0,60,46,'2021-09-24 06:00:04',1,0),(181,'BPSC HISTORY','Beginner','NA',38,1,0,0,'15111988',1,1,1,900,1,0,80,46,'2021-09-24 18:34:39',2,5),(182,'BPSC MATH','Beginner','NA',0,0,0,0,'15111988',0,0,0,900,1,0,80,46,'2021-09-24 19:24:59',2,0),(183,'BPSC BIO','Beginner','NA',0,0,0,0,'15111988',0,0,0,900,1,0,80,46,'2021-09-24 19:26:25',2,0),(184,'BPSC CHE','Beginner','NA',2,0,0,0,'15111988',0,0,0,-1,1,0,80,46,'2021-09-24 19:27:07',2,0),(185,'BPSC PHY','Beginner','NA',2,0,0,0,'15111988',0,0,0,-1,1,0,80,46,'2021-09-24 19:27:58',2,0),(186,'BPSC POLITY','Beginner','NA',9,0,0,0,'15111988',0,0,0,900,1,0,80,46,'2021-09-24 19:28:50',2,0),(187,'BPSC GEO','Beginner','NA',0,0,0,0,'15111988',0,0,0,900,1,0,80,46,'2021-09-24 19:29:37',2,0),(188,'Force and Friction','Beginner','Force and Friction',10,0,0,0,'23031999',0,0,0,900,4,1,60,24,'2021-09-29 17:15:14',1,100);
/*!40000 ALTER TABLE `quizes` ENABLE KEYS */;
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

-- Dump completed on 2021-10-15 17:30:06
