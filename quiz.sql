-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: quiz
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` tinytext NOT NULL,
  `course_title` text NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'IT223','Database Management and Administration'),(2,'IT222','Structures of Programming Languages'),(3,'IT221','Computer Maintenance and Troubleshooting'),(4,'IT224','Discrete Structures');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `enrolled_students`
--

DROP TABLE IF EXISTS `enrolled_students`;
/*!50001 DROP VIEW IF EXISTS `enrolled_students`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `enrolled_students` AS SELECT 
 1 AS `enrollment_id`,
 1 AS `user_name`,
 1 AS `user_id`,
 1 AS `course_id`,
 1 AS `course_code`,
 1 AS `course_title`,
 1 AS `enrollment_date`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL AUTO_INCREMENT,
  `enrollment_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`enrollment_id`),
  KEY `fk_enrollment_user1_idx` (`user_id`),
  KEY `fk_enrollment_course1_idx` (`course_id`),
  CONSTRAINT `fk_enrollment_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_enrollment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment`
--

LOCK TABLES `enrollment` WRITE;
/*!40000 ALTER TABLE `enrollment` DISABLE KEYS */;
INSERT INTO `enrollment` VALUES (1,'2019-04-02',4,1),(2,'2019-04-02',4,2),(3,'2019-04-05',2,1),(4,'2019-04-05',6,1),(5,'2019-04-05',6,2),(6,'2019-04-05',6,3),(7,'2019-04-05',6,4);
/*!40000 ALTER TABLE `enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `list_of_quizzes`
--

DROP TABLE IF EXISTS `list_of_quizzes`;
/*!50001 DROP VIEW IF EXISTS `list_of_quizzes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `list_of_quizzes` AS SELECT 
 1 AS `quiz_id`,
 1 AS `quiz_title`,
 1 AS `user_name`,
 1 AS `course_title`,
 1 AS `course_code`,
 1 AS `date_created`,
 1 AS `date_open`,
 1 AS `date_closed`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `opt_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`opt_id`),
  KEY `question_id_FK` (`question_id`),
  KEY `quiz_id_FK_idx` (`quiz_id`),
  CONSTRAINT `question_id_FK` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (1,'A?',1,1,1),(2,'B?',1,1,0),(3,'C?',1,1,0),(4,'D?',1,1,0),(5,'A?',2,1,0),(6,'B?',2,1,0),(7,'C?',2,1,1),(8,'D?',2,1,0);
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privilege` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_desc` tinytext NOT NULL,
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privilege`
--

LOCK TABLES `privilege` WRITE;
/*!40000 ALTER TABLE `privilege` DISABLE KEYS */;
INSERT INTO `privilege` VALUES (1,'Admin'),(2,'Teacher'),(3,'Student');
/*!40000 ALTER TABLE `privilege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`question_id`),
  KEY `quiz_id_FK` (`quiz_id`),
  KEY `category_id_FK_idx` (`category_id`),
  CONSTRAINT `category_id_FK` FOREIGN KEY (`category_id`) REFERENCES `question_categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `quiz_id_FK` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'First question',1,2),(2,'Second question',1,2),(3,'Third question',1,2),(4,'Q1',2,2),(5,'Q2',2,2),(6,'Q3',2,2),(7,'Q4',2,2),(8,'Q1',3,2),(9,'Q2',3,2),(10,'Q3',3,2);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_categories`
--

DROP TABLE IF EXISTS `question_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_categories`
--

LOCK TABLES `question_categories` WRITE;
/*!40000 ALTER TABLE `question_categories` DISABLE KEYS */;
INSERT INTO `question_categories` VALUES (1,'Multiple Choice'),(2,'True or False'),(3,'Multiple Answer');
/*!40000 ALTER TABLE `question_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_title` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL,
  `date_open` timestamp NULL DEFAULT NULL,
  `date_closed` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`quiz_id`),
  KEY `user_id_FK` (`user_id`),
  KEY `course_id_FK` (`course_id`),
  CONSTRAINT `course_id_FK` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON UPDATE CASCADE,
  CONSTRAINT `user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,'Quiz #1',4,1,'2019-04-02','2019-04-01 16:00:00','2019-04-04 16:00:00'),(2,'Quiz #2',4,1,'2019-04-04','2019-04-03 16:00:00','2019-04-06 16:00:00'),(3,'Quiz #3',4,1,'2019-04-05','2019-04-04 16:00:00','2019-04-07 16:00:00'),(4,'Quiz #1',4,2,'2019-04-02','2019-04-01 16:00:00','2019-04-04 16:00:00'),(5,'Quiz #2',4,2,'2019-04-04','2019-04-03 16:00:00','2019-04-06 16:00:00'),(6,'Quiz #4',4,1,'2019-04-08','2019-04-07 16:00:00','2019-04-10 16:00:00'),(7,'Quiz #3',4,2,'2019-04-10','2019-04-09 16:00:00','2019-04-12 16:00:00'),(8,'Quiz #5',4,2,'2019-04-12',NULL,NULL),(9,'Asdasd',6,1,'2019-04-12',NULL,NULL),(10,'asdasdasd',6,3,'2019-04-12',NULL,NULL),(11,'asdasd',6,4,'2019-04-12',NULL,NULL),(12,'',6,1,'2019-04-12',NULL,NULL),(13,'',6,4,'2019-04-12',NULL,NULL),(14,'',6,1,'2019-04-12',NULL,NULL),(15,'',6,1,'2019-04-12',NULL,NULL),(16,'Lala',6,1,'2019-04-12',NULL,NULL),(17,'successss',6,1,'2019-04-12',NULL,NULL);
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `quiz_question`
--

DROP TABLE IF EXISTS `quiz_question`;
/*!50001 DROP VIEW IF EXISTS `quiz_question`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `quiz_question` AS SELECT 
 1 AS `quiz_id`,
 1 AS `quiz_title`,
 1 AS `user_id`,
 1 AS `author`,
 1 AS `course_id`,
 1 AS `course_code`,
 1 AS `question_id`,
 1 AS `description`,
 1 AS `category_id`,
 1 AS `category`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` tinytext NOT NULL,
  `user_pw` text NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `f_name` tinytext,
  `l_name` tinytext,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `privilege_id_FK` (`privilege_id`),
  CONSTRAINT `privilege_id_FK` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`privilege_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'administrator','admin',1,NULL,NULL,NULL),(2,'user1','$2y$10$TTiU0VXkbe3uMzYpeNFQneOaWcSF7TnFi/W2KB1MuipvaSO70J/5C',2,'Cardo','Dalisay',NULL),(3,'mvn','$2y$10$Wrb95uoCqi4apakGbebgT.UjrzrC6THO1ThovdIAzYVoM3BoXDcJG',2,'Mvn','Rsr',NULL),(4,'mvnrsr','$2y$10$TJ.S09GoyEqmn4Kw1rnUDuX0.DPntqmT.CZj2G1O.Ypt9JGVGwygC',3,'Mivien','Rosario',NULL),(5,'admin','$2y$10$/VVGRdS.a3GpeeATxy6OO.n3AJvVdT5aO1h9NoHJEv04VdGEgPINi',1,NULL,NULL,NULL),(6,'teacher','$2y$10$Ytmk3lbBYv//l60XOE9wA.xh03PQzdc/SKhgu9EAsBzHG1VAX.0cS',2,'Teacher','Teach',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_ans`
--

DROP TABLE IF EXISTS `user_ans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_ans` (
  `user_ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `opt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ans_time` datetime NOT NULL,
  PRIMARY KEY (`user_ans_id`),
  KEY `opt_id_FK` (`opt_id`),
  KEY `user_id_ans_FK` (`user_id`),
  CONSTRAINT `opt_id_FK` FOREIGN KEY (`opt_id`) REFERENCES `options` (`opt_id`) ON UPDATE CASCADE,
  CONSTRAINT `user_id_ans_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_ans`
--

LOCK TABLES `user_ans` WRITE;
/*!40000 ALTER TABLE `user_ans` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_ans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `users`
--

DROP TABLE IF EXISTS `users`;
/*!50001 DROP VIEW IF EXISTS `users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `users` AS SELECT 
 1 AS `user_id`,
 1 AS `user_name`,
 1 AS `f_name`,
 1 AS `l_name`,
 1 AS `privilege_desc`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `enrolled_students`
--

/*!50001 DROP VIEW IF EXISTS `enrolled_students`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `enrolled_students` AS select `e`.`enrollment_id` AS `enrollment_id`,`u`.`user_name` AS `user_name`,`u`.`user_id` AS `user_id`,`c`.`course_id` AS `course_id`,`c`.`course_code` AS `course_code`,`c`.`course_title` AS `course_title`,`e`.`enrollment_date` AS `enrollment_date` from ((`enrollment` `e` join `user` `u` on((`e`.`user_id` = `u`.`user_id`))) join `course` `c` on((`e`.`course_id` = `c`.`course_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `list_of_quizzes`
--

/*!50001 DROP VIEW IF EXISTS `list_of_quizzes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `list_of_quizzes` AS select `q`.`quiz_id` AS `quiz_id`,`q`.`quiz_title` AS `quiz_title`,`u`.`user_name` AS `user_name`,`c`.`course_title` AS `course_title`,`c`.`course_code` AS `course_code`,`q`.`date_created` AS `date_created`,`q`.`date_open` AS `date_open`,`q`.`date_closed` AS `date_closed` from ((`quiz` `q` join `user` `u` on((`q`.`user_id` = `u`.`user_id`))) join `course` `c` on((`q`.`course_id` = `c`.`course_id`))) order by `c`.`course_title` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `quiz_question`
--

/*!50001 DROP VIEW IF EXISTS `quiz_question`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `quiz_question` AS select `q`.`quiz_id` AS `quiz_id`,`q`.`quiz_title` AS `quiz_title`,`u`.`user_id` AS `user_id`,`u`.`user_name` AS `author`,`c`.`course_id` AS `course_id`,`c`.`course_code` AS `course_code`,`qn`.`question_id` AS `question_id`,`qn`.`description` AS `description`,`qc`.`category_id` AS `category_id`,`qc`.`category_desc` AS `category` from ((((`quiz` `q` join `question` `qn` on((`q`.`quiz_id` = `qn`.`quiz_id`))) join `user` `u` on((`q`.`user_id` = `u`.`user_id`))) join `course` `c` on((`q`.`course_id` = `c`.`course_id`))) join `question_categories` `qc` on((`qn`.`category_id` = `qc`.`category_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `users`
--

/*!50001 DROP VIEW IF EXISTS `users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `users` AS select `u`.`user_id` AS `user_id`,`u`.`user_name` AS `user_name`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name`,`p`.`privilege_desc` AS `privilege_desc` from (`user` `u` join `privilege` `p` on((`u`.`privilege_id` = `p`.`privilege_id`))) */;
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

-- Dump completed on 2019-04-24 22:51:41
