/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - skillprotal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


/*Table structure for table `attendence` */

DROP TABLE IF EXISTS `attendence`;

CREATE TABLE `attendence` (
  `id` bigint(225) NOT NULL AUTO_INCREMENT,
  `skill_id` int(99) NOT NULL,
  `student_id` int(99) NOT NULL,
  `date` date NOT NULL,
  `day` int(225) NOT NULL,
  `attendence` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0 - pending; 1- present; 2- absent; 3- Od',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `attendence` */

insert  into `attendence`(`id`,`skill_id`,`student_id`,`date`,`day`,`attendence`,`created_at`,`updated_on`) values 
(87,14,2,'2022-12-24',1,'1','2022-12-25 01:24:41','2022-12-25 01:24:41'),
(88,14,1,'2022-12-24',1,'3','2022-12-25 01:24:57','2022-12-25 01:25:11'),
(89,14,2,'2022-12-26',2,'1','2022-12-26 13:34:58','2022-12-26 13:34:58'),
(90,14,1,'2022-12-26',2,'1','2022-12-26 13:34:59','2022-12-26 13:34:59'),
(91,14,2,'2022-12-29',3,'1','2022-12-29 19:55:05','2022-12-29 19:55:05'),
(92,14,1,'2022-12-29',3,'2','2022-12-29 19:55:06','2022-12-29 19:55:06'),
(93,14,2,'2023-01-06',4,'1','2023-01-06 09:06:13','2023-01-06 09:06:13'),
(94,14,1,'2023-01-06',4,'1','2023-01-06 09:06:14','2023-01-06 09:06:14'),
(95,14,2,'2023-01-07',5,'1','2023-01-07 23:47:45','2023-01-07 23:47:45'),
(96,14,1,'2023-01-07',5,'3','2023-01-07 23:47:48','2023-01-07 23:47:48'),
(97,14,2,'2023-01-08',6,'1','2023-01-08 15:12:06','2023-01-08 15:12:06'),
(98,14,1,'2023-01-08',6,'3','2023-01-08 15:12:10','2023-01-08 15:12:10'),
(99,14,2,'2023-01-09',7,'1','2023-01-09 21:29:21','2023-01-09 21:29:21'),
(100,14,1,'2023-01-09',7,'1','2023-01-09 21:29:22','2023-01-09 21:29:22'),
(101,14,2,'2023-01-13',8,'1','2023-01-13 22:09:36','2023-01-13 22:09:36'),
(102,14,1,'2023-01-13',8,'1','2023-01-13 22:09:37','2023-01-13 22:09:37'),
(103,14,2,'2023-01-18',9,'1','2023-01-18 10:42:41','2023-01-18 10:42:41'),
(104,14,1,'2023-01-18',9,'1','2023-01-18 10:42:42','2023-01-18 10:42:42'),
(105,15,1,'2023-01-18',1,'1','2023-01-18 17:47:50','2023-01-18 17:47:50'),
(106,14,2,'2023-01-19',10,'1','2023-01-19 11:03:00','2023-01-19 11:03:00'),
(107,14,1,'2023-01-19',10,'1','2023-01-19 11:03:02','2023-01-19 11:03:02'),
(108,15,1,'2023-01-19',2,'1','2023-01-19 17:08:06','2023-01-19 17:08:06'),
(109,14,2,'2023-01-25',11,'1','2023-01-25 20:46:16','2023-01-25 20:46:16'),
(110,14,1,'2023-01-25',11,'2','2023-01-25 20:46:17','2023-01-25 20:46:17'),
(111,15,1,'2023-01-25',3,'2','2023-01-25 20:46:24','2023-01-25 20:46:41');

/*Table structure for table `complaint` */

DROP TABLE IF EXISTS `complaint`;

CREATE TABLE `complaint` (
  `id` bigint(225) NOT NULL AUTO_INCREMENT,
  `student_id` int(99) NOT NULL,
  `skill_id` int(99) NOT NULL,
  `date` date NOT NULL,
  `complaint_sub` varchar(250) NOT NULL,
  `complaint_des` varchar(500) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 - pending; 1 - readed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `complaint` */

insert  into `complaint`(`id`,`student_id`,`skill_id`,`date`,`complaint_sub`,`complaint_des`,`status`,`created_at`,`updated_on`) values 
(11,1,14,'2023-01-18','Trainer Issue','abcd','0','2023-01-18 16:56:36','2023-01-22 11:21:19'),
(12,1,14,'2023-01-21','aa','a','0','2023-01-21 13:46:29','2023-01-22 11:21:15');

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `id` int(99) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `department` */

insert  into `department`(`id`,`dept_name`,`created_at`,`updated_on`) values 
(1,'All Department','2022-11-24 00:12:55','2022-12-24 09:34:45'),
(3,'Computer Tecnology','2022-11-24 00:13:05','2022-12-24 09:34:23'),
(5,'Computer Science and Engineering','2022-12-15 19:03:01','2022-12-24 09:34:36');

/*Table structure for table `faculty` */

DROP TABLE IF EXISTS `faculty`;

CREATE TABLE `faculty` (
  `fid` bigint(225) NOT NULL AUTO_INCREMENT,
  `f_id` varchar(50) NOT NULL,
  `f_name` varbinary(125) NOT NULL,
  `f_email` varchar(125) NOT NULL,
  `f_phone` varchar(15) NOT NULL,
  `f_dept` int(5) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 - not active; 1 - active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `faculty` */

insert  into `faculty`(`fid`,`f_id`,`f_name`,`f_email`,`f_phone`,`f_dept`,`status`,`created_at`,`updated_on`) values 
(1,'CS1001','Thiru','thiru@gmail.com','9345530311',5,'1','2022-11-24 00:12:28','2022-12-15 19:03:38');

/*Table structure for table `faculty_login` */

DROP TABLE IF EXISTS `faculty_login`;

CREATE TABLE `faculty_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(99) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_role` int(5) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 - not active;1 - active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `faculty_login` */

insert  into `faculty_login`(`id`,`faculty_id`,`username`,`password`,`user_role`,`last_login`,`created_at`,`updated_at`,`status`) values 
(1,1,'thiru','d6ed7ca0720aaba96e4674098d61aad9',3,'2022-12-15 18:53:47','2022-12-15 18:53:47','2022-12-16 16:52:37','1');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `id` bigint(225) NOT NULL AUTO_INCREMENT,
  `skill_id` int(99) NOT NULL,
  `student_id` int(99) NOT NULL,
  `date` date NOT NULL,
  `day` int(20) NOT NULL,
  `is_skill_usefull` enum('yes','no') NOT NULL,
  `trainers_skilled` enum('yes','no') NOT NULL,
  `trainings_done` enum('yes','no') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `feedback` */

insert  into `feedback`(`id`,`skill_id`,`student_id`,`date`,`day`,`is_skill_usefull`,`trainers_skilled`,`trainings_done`,`created_at`,`updated_at`) values 
(5,14,1,'2023-01-19',10,'no','yes','yes','2023-01-19 17:07:24','2023-01-19 17:07:24'),
(6,15,1,'2023-01-19',2,'yes','no','yes','2023-01-20 20:38:53','2023-01-20 20:38:53');

/*Table structure for table `mark` */

DROP TABLE IF EXISTS `mark`;

CREATE TABLE `mark` (
  `id` bigint(225) NOT NULL AUTO_INCREMENT,
  `skill_id` int(99) NOT NULL,
  `student_id` int(99) NOT NULL,
  `skill_day` int(20) NOT NULL,
  `date` date NOT NULL,
  `max_mark` int(10) NOT NULL,
  `mark` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mark` */

insert  into `mark`(`id`,`skill_id`,`student_id`,`skill_day`,`date`,`max_mark`,`mark`,`created_at`,`updated_on`) values 
(76,14,2,1,'2022-12-24',50,18,'2022-12-25 01:25:21','2022-12-25 01:25:21'),
(78,14,1,1,'2022-12-24',50,50,'2022-12-25 01:31:17','2022-12-25 01:31:17'),
(79,14,2,1,'2022-12-29',10,9,'2022-12-29 19:58:27','2022-12-29 19:58:35'),
(80,14,1,1,'2022-12-29',10,7,'2022-12-29 19:58:29','2022-12-29 19:58:29'),
(83,14,2,4,'2023-01-06',10,10,'2023-01-06 09:11:55','2023-01-06 09:11:55'),
(84,14,1,4,'2023-01-06',10,8,'2023-01-06 09:12:01','2023-01-06 09:12:01'),
(85,14,2,2,'2022-12-26',10,1,'2023-01-06 09:12:19','2023-01-06 09:12:19'),
(86,14,1,2,'2022-12-26',10,8,'2023-01-06 09:12:24','2023-01-06 09:12:24'),
(87,14,2,5,'2023-01-07',10,10,'2023-01-07 23:47:55','2023-01-07 23:47:55'),
(88,14,1,5,'2023-01-07',10,8,'2023-01-07 23:47:57','2023-01-07 23:47:57'),
(89,14,2,6,'2023-01-08',10,8,'2023-01-08 15:12:20','2023-01-08 15:12:30'),
(90,14,1,6,'2023-01-08',10,5,'2023-01-08 15:12:23','2023-01-08 15:12:23'),
(91,14,2,7,'2023-01-09',10,10,'2023-01-09 21:29:42','2023-01-09 21:29:42'),
(92,14,1,7,'2023-01-09',10,8,'2023-01-09 21:29:43','2023-01-09 21:29:43'),
(93,14,2,8,'2023-01-13',10,5,'2023-01-13 22:09:44','2023-01-13 22:09:44'),
(94,14,1,8,'2023-01-13',10,10,'2023-01-13 22:09:48','2023-01-13 22:09:48'),
(95,15,1,1,'2023-01-18',10,9,'2023-01-18 17:48:31','2023-01-18 17:48:47'),
(96,15,1,2,'2023-01-19',10,10,'2023-01-19 17:08:17','2023-01-19 17:08:17'),
(97,14,2,10,'2023-01-19',10,10,'2023-01-21 15:57:49','2023-01-21 15:57:49'),
(98,14,1,10,'2023-01-19',10,5,'2023-01-21 15:57:52','2023-01-21 15:57:52');

/*Table structure for table `registered_course` */

DROP TABLE IF EXISTS `registered_course`;

CREATE TABLE `registered_course` (
  `id` bigint(225) NOT NULL AUTO_INCREMENT,
  `skill_id` int(99) NOT NULL,
  `student_id` int(99) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0 - completed; 1 - active; 2- dropped',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `registered_course` */

insert  into `registered_course`(`id`,`skill_id`,`student_id`,`status`,`created_at`,`updated_on`) values 
(3,14,2,'1','2022-12-17 09:55:08','2022-12-17 09:55:24'),
(4,14,1,'1','2022-12-18 09:18:52','2022-12-18 09:18:52'),
(5,15,1,'1','2023-01-18 14:50:59','2023-01-18 16:49:28');

/*Table structure for table `skill` */

DROP TABLE IF EXISTS `skill`;

CREATE TABLE `skill` (
  `sk_id` bigint(225) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(125) NOT NULL,
  `skill_code` varchar(20) NOT NULL,
  `skill_des` varchar(500) NOT NULL,
  `skill_cat` varchar(125) NOT NULL,
  `skill_days` int(10) NOT NULL,
  `skill_year` varchar(3) NOT NULL,
  `skill_dept` varchar(50) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `venue_on` varchar(750) NOT NULL,
  `max_rp` int(20) NOT NULL,
  `max_student` int(20) NOT NULL,
  `min_attendence` int(20) NOT NULL,
  `incharge_staff` int(225) NOT NULL,
  `skill_status` enum('0','1','2','3','4') NOT NULL DEFAULT '1' COMMENT '0 - not active; 1 - active; 2 - dropped;3-compeleted; 4- deleted',
  `skill_registration` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 - closed;1 - open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `final_ass_date` date DEFAULT NULL,
  `daily_task_mark` int(10) NOT NULL,
  `final_task_mark` int(10) NOT NULL,
  `feedback_time` time DEFAULT NULL,
  PRIMARY KEY (`sk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `skill` */

insert  into `skill`(`sk_id`,`skill_name`,`skill_code`,`skill_des`,`skill_cat`,`skill_days`,`skill_year`,`skill_dept`,`starting_date`,`ending_date`,`venue_on`,`max_rp`,`max_student`,`min_attendence`,`incharge_staff`,`skill_status`,`skill_registration`,`created_at`,`updated_on`,`final_ass_date`,`daily_task_mark`,`final_task_mark`,`feedback_time`) values 
(14,'Web Technology','WEB1001','WEB DEVELOPMENT USING HTML AND CSS','Day Skill',20,'II','3','2022-12-01','2022-12-21','CSE LAB 1',1200,50,80,1,'1','1','2022-12-16 21:58:24','2023-01-19 10:32:48','2022-12-24',10,50,'10:33:00'),
(15,'App Development','APP-104516','App developing with Android','Night Skill',25,'II','5','2023-01-18','2023-01-31','CSE LAB 1',1500,50,80,1,'1','1','2023-01-18 14:10:17','2023-01-18 18:29:32','2023-01-31',10,50,'16:30:00');

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `s_id` bigint(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `roll_no` varchar(15) NOT NULL,
  `dept` int(5) NOT NULL,
  `year` varchar(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `s_status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 - not active;1- active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `students` */

insert  into `students`(`s_id`,`name`,`roll_no`,`dept`,`year`,`email`,`phone`,`s_status`,`created_at`,`updated_on`) values 
(1,'Rishvanth','7376211CS261',5,'II','rishvanthrajaa.cs21@bitsathy.ac.in','9566663139','1','2022-11-24 00:10:39','2023-01-20 00:19:21'),
(2,'Jashwanth','7376212CT119',3,'II','jas@gmail.com','9944489890','1','2022-11-24 00:11:08','2022-12-17 10:13:15');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(99) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `add_course` enum('yes','no') NOT NULL DEFAULT 'yes',
  `edit_course` enum('yes','no') NOT NULL DEFAULT 'yes',
  `all_course` enum('yes','no') NOT NULL DEFAULT 'yes',
  `all_complaints` enum('yes','no') NOT NULL DEFAULT 'yes',
  `add_attendence` enum('yes','no') NOT NULL DEFAULT 'yes',
  `add_mark` enum('yes','no') NOT NULL DEFAULT 'yes',
  `feedback` enum('yes','no') NOT NULL DEFAULT 'yes',
  `students_details` enum('yes','no') NOT NULL DEFAULT 'yes',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0- not active;1 - active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `edit_attendence` enum('yes','no') NOT NULL DEFAULT 'yes',
  `all_attendence` enum('yes','no') NOT NULL DEFAULT 'yes',
  `all_mark` enum('yes','no') NOT NULL DEFAULT 'yes',
  `non_active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `all_feedback` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`role_name`,`add_course`,`edit_course`,`all_course`,`all_complaints`,`add_attendence`,`add_mark`,`feedback`,`students_details`,`status`,`created_at`,`updated_at`,`edit_attendence`,`all_attendence`,`all_mark`,`non_active`,`all_feedback`) values 
(1,'admin','yes','yes','yes','yes','yes','yes','yes','yes','1','2022-12-15 18:58:20','2022-12-15 18:58:20','yes','yes','yes','yes','yes'),
(2,'skill_team','yes','yes','yes','yes','yes','yes','yes','yes','1','2022-12-15 18:58:20','2022-12-16 16:52:01','yes','yes','yes','yes','yes'),
(3,'faculty','yes','no','no','yes','yes','yes','yes','yes','1','2022-12-15 18:58:20','2022-12-24 14:37:32','yes','yes','yes','no','yes');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
