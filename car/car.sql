/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.27 : Database - egycars
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`egycars` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `egycars`;

/*Table structure for table `ec_bid` */

DROP TABLE IF EXISTS `ec_bid`;

CREATE TABLE `ec_bid` (
  `ec_bid` INT(11) NOT NULL AUTO_INCREMENT,
  `ec_user` INT(11) NOT NULL,
  `ec_car` INT(11) NOT NULL,
  `ec_bid_price` VARCHAR(32) NOT NULL,
  `ec_description` TEXT,
  `ec_allow_yn` CHAR(1) NOT NULL DEFAULT 'N',
  `ec_created_time` VARCHAR(19) NOT NULL,
  `ec_updated_time` VARCHAR(19) NOT NULL,
  PRIMARY KEY (`ec_bid`)
) ENGINE=INNODB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `ec_bid` */

INSERT  INTO `ec_bid`(`ec_bid`,`ec_user`,`ec_car`,`ec_bid_price`,`ec_description`,`ec_allow_yn`,`ec_created_time`,`ec_updated_time`) VALUES (1,2,4,'150',NULL,'N','2014-03-28 23:15:50','2014-03-28 23:15:50'),(2,4,4,'150',NULL,'N','2014-03-31 01:31:15','2014-03-31 01:31:15'),(3,5,10,'123',NULL,'N','2014-04-01 23:35:21','2014-04-01 23:35:21'),(4,5,10,'234',NULL,'Y','2014-04-01 23:37:45','2014-04-01 23:37:45'),(5,5,10,'32',NULL,'N','2014-04-01 23:38:15','2014-04-01 23:38:15'),(6,5,10,'1234',NULL,'N','2014-04-01 23:41:37','2014-04-01 23:41:37'),(7,5,5,'170',NULL,'N','2014-04-02 02:28:00','2014-04-02 02:28:00');

/*Table structure for table `ec_car` */

DROP TABLE IF EXISTS `ec_car`;

CREATE TABLE `ec_car` (
  `ec_car` INT(11) NOT NULL AUTO_INCREMENT,
  `ec_user` INT(11) NOT NULL,
  `ec_model` INT(11) NOT NULL,
  `ec_year` VARCHAR(16) NOT NULL,
  `ec_price` VARCHAR(32) NOT NULL,
  `ec_speed` VARCHAR(16) NOT NULL,
  `ec_color_int` VARCHAR(64) NOT NULL,
  `ec_color_ext` VARCHAR(64) NOT NULL,
  `ec_video` VARCHAR(256) DEFAULT NULL,
  `ec_description` TEXT,
  `ec_max_price` VARCHAR(32) DEFAULT '0',
  `ec_featured_yn` CHAR(1) NOT NULL DEFAULT 'N',
  `ec_sealed_yn` CHAR(1) NOT NULL DEFAULT 'N',
  `ec_car_status` VARCHAR(10) NOT NULL DEFAULT 'PENDING' COMMENT 'PENDING, AUCTION, SALED',
  `ec_created_time` VARCHAR(19) NOT NULL,
  `ec_updated_time` VARCHAR(19) NOT NULL,
  PRIMARY KEY (`ec_car`)
) ENGINE=INNODB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `ec_car` */

INSERT  INTO `ec_car`(`ec_car`,`ec_user`,`ec_model`,`ec_year`,`ec_price`,`ec_speed`,`ec_color_int`,`ec_color_ext`,`ec_video`,`ec_description`,`ec_max_price`,`ec_featured_yn`,`ec_sealed_yn`,`ec_car_status`,`ec_created_time`,`ec_updated_time`) VALUES (2,2,1,'2010','600','100','','','','Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.','100','Y','N','AUCTION','2014-03-28 05:38:39','2014-03-28 05:38:39'),(3,2,5,'2010','100000','124','','','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Integer sed arcu. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deser','120','','N','AUCTION','2014-03-28 06:48:14','2014-03-28 06:48:14'),(4,2,7,'1990','10000','80','R','B','','A life of Lexus','140','Y','Y','SALED','2014-03-28 06:49:52','2014-03-28 06:49:52'),(5,2,5,'2004','29000','98','Red','Gray','https://www.youtube.com/watch?v=6lMqtVPiN2U','Buying a full-size pickup? Here are some hard facts to think about: The F-150 can haul more cargo (maximum 3,120 lbs.) than any of its competitors* and has huge Class V trailer towing capability (maximum 11,300 lbs.). With a rugged fully boxed frame as the foundation of its Built Ford Tough','170','','N','AUCTION','2014-03-28 10:32:46','2014-03-28 10:32:46'),(7,2,6,'1988','2000','50','Yellow','White','','Integrated Trailer Brake Controller (TBC)\nThe first-in-class, available TBC synchronizes the vehicle and trailer brakes to provide control and confide','180','Y','N','AUCTION','2014-03-28 10:42:19','2014-03-28 10:42:19'),(9,5,2,'2010','2000','140','Red','Black','','testing car','0','','N','AUCTION','2014-03-31 01:34:18','2014-03-31 01:34:18'),(10,5,5,'2000','200','200','Red','Black','','','1234','','Y','SALED','2014-03-31 02:24:56','2014-03-31 02:24:56');

/*Table structure for table `ec_car_image` */

DROP TABLE IF EXISTS `ec_car_image`;

CREATE TABLE `ec_car_image` (
  `ec_car_image` INT(11) NOT NULL AUTO_INCREMENT,
  `ec_car` INT(11) NOT NULL,
  `ec_photo` VARCHAR(128) NOT NULL,
  `ec_title` VARCHAR(128) DEFAULT NULL,
  `ec_created_time` VARCHAR(19) NOT NULL,
  `ec_updated_time` VARCHAR(19) NOT NULL,
  PRIMARY KEY (`ec_car_image`)
) ENGINE=INNODB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Data for the table `ec_car_image` */

INSERT  INTO `ec_car_image`(`ec_car_image`,`ec_car`,`ec_photo`,`ec_title`,`ec_created_time`,`ec_updated_time`) VALUES (3,3,'img/car/WEVC6XGG52U4DECP_1.jpg','','2014-03-28 06:48:14','2014-03-28 06:48:14'),(5,5,'img/car/7K6PXAH9S2GFPCTK_5_1.jpg','','2014-03-28 10:32:46','2014-03-28 10:32:46'),(6,5,'img/car/5DQH3PWLYDMNS2K3_5_2.jpg','','2014-03-28 10:32:46','2014-03-28 10:32:46'),(7,5,'img/car/2SYNN7JR4CH8DUKE_5_3.png','','2014-03-28 10:32:46','2014-03-28 10:32:46'),(11,7,'img/car/WSY5QRES8V45EQSL_4.jpg','','2014-03-28 10:42:19','2014-03-28 10:42:19'),(13,9,'img/car/LLAFW34HEC4HZ22S_1.jpg','','2014-03-31 01:34:18','2014-03-31 01:34:18'),(14,10,'img/car/GV5XP436RDRXC2PC_2.jpg','','2014-03-31 02:24:56','2014-03-31 02:24:56'),(15,4,'img/car/E3ULWNLN58FV6Y78_3.jpg','','2014-04-02 03:29:26','2014-04-02 03:29:26'),(36,2,'img/car/2.jpg','','2014-04-02 11:07:03','2014-04-02 11:07:03'),(37,2,'img/car/noPhoto.png','','2014-04-02 11:07:03','2014-04-02 11:07:03'),(38,2,'img/car/noPhoto.png','','2014-04-02 11:07:03','2014-04-02 11:07:03'),(39,2,'img/car/noPhoto.png','','2014-04-02 11:07:04','2014-04-02 11:07:04'),(40,2,'img/car/noPhoto.png','','2014-04-02 11:07:04','2014-04-02 11:07:04'),(41,2,'img/car/noPhoto.png','','2014-04-02 11:07:04','2014-04-02 11:07:04');

/*Table structure for table `ec_comment` */

DROP TABLE IF EXISTS `ec_comment`;

CREATE TABLE `ec_comment` (
  `ec_comment` INT(11) NOT NULL AUTO_INCREMENT,
  `ec_car` INT(11) NOT NULL,
  `ec_user` INT(11) NOT NULL,
  `ec_content` TEXT NOT NULL,
  `ec_created_time` VARCHAR(19) NOT NULL,
  `ec_updated_time` VARCHAR(19) NOT NULL,
  PRIMARY KEY (`ec_comment`)
) ENGINE=INNODB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `ec_comment` */

INSERT  INTO `ec_comment`(`ec_comment`,`ec_car`,`ec_user`,`ec_content`,`ec_created_time`,`ec_updated_time`) VALUES (1,2,2,'test','2014-03-28 09:08:50','2014-03-28 09:08:50'),(2,2,2,'asdf','2014-03-28 09:09:29','2014-03-28 09:09:29'),(3,2,2,'asdf','2014-03-28 09:10:46','2014-03-28 09:10:46'),(4,2,2,'nsectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur   quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero c','2014-03-28 09:25:42','2014-03-28 09:25:42'),(5,2,2,'asdfasdf','2014-03-28 09:29:42','2014-03-28 09:29:42'),(6,5,2,'What a excellent car! This is really good car.','2014-03-28 10:43:25','2014-03-28 10:43:25'),(7,2,3,'Excited!','2014-03-28 11:49:18','2014-03-28 11:49:18'),(8,2,2,'What a excellent Car','2014-03-28 23:22:55','2014-03-28 23:22:55'),(9,7,0,'What a excellent car! This is Yellow car. But great!','2014-03-29 10:43:34','2014-03-29 10:43:34'),(10,5,4,'What a fantastic car! Recommend this highly!!!','2014-03-31 01:30:16','2014-03-31 01:30:16'),(11,10,5,'asdf\n','2014-04-01 23:51:19','2014-04-01 23:51:19'),(12,10,5,'excellent','2014-04-01 23:51:24','2014-04-01 23:51:24'),(13,5,5,'asdfasdfasdf','2014-04-02 02:28:48','2014-04-02 02:28:48');

/*Table structure for table `ec_manufacturer` */

DROP TABLE IF EXISTS `ec_manufacturer`;

CREATE TABLE `ec_manufacturer` (
  `ec_manufacturer` INT(11) NOT NULL AUTO_INCREMENT,
  `ec_title` VARCHAR(128) NOT NULL,
  `ec_logo` VARCHAR(128) NOT NULL,
  `ec_created_time` VARCHAR(19) NOT NULL,
  `ec_updated_time` VARCHAR(19) NOT NULL,
  PRIMARY KEY (`ec_manufacturer`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `ec_manufacturer` */

insert  into `ec_manufacturer`(`ec_manufacturer`,`ec_title`,`ec_logo`,`ec_created_time`,`ec_updated_time`) values (1,'Nissan','img/logo/nissan.png','2014-03-28 01:07:07','2014-03-28 01:07:07'),(2,'BMW','img/logo/bmw.png','2014-03-28 01:07:07','2014-03-28 01:07:07'),(3,'Lexus','img/logo/lexus.png','2014-03-28 01:07:07','2014-03-28 01:07:07');

/*Table structure for table `ec_model` */

DROP TABLE IF EXISTS `ec_model`;

CREATE TABLE `ec_model` (
  `ec_model` int(11) NOT NULL AUTO_INCREMENT,
  `ec_manufacturer` int(11) NOT NULL,
  `ec_title` varchar(128) NOT NULL,
  `ec_created_time` varchar(19) NOT NULL,
  `ec_updated_time` varchar(19) NOT NULL,
  PRIMARY KEY (`ec_model`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `ec_model` */

insert  into `ec_model`(`ec_model`,`ec_manufacturer`,`ec_title`,`ec_created_time`,`ec_updated_time`) values (1,1,'NS-100','2014-03-28 01:07:07','2014-03-28 01:07:07'),(2,1,'NS-200','2014-03-28 01:07:07','2014-03-28 01:07:07'),(3,1,'NS-300','2014-03-28 01:07:07','2014-03-28 01:07:07'),(4,2,'BMW-A','2014-03-28 01:07:07','2014-03-28 01:07:07'),(5,2,'BMW-B','2014-03-28 01:07:07','2014-03-28 01:07:07'),(6,2,'BMW-C','2014-03-28 01:07:07','2014-03-28 01:07:07'),(7,3,'Lexus-100','2014-03-28 01:07:07','2014-03-28 01:07:07'),(8,3,'Lexus-200','2014-03-28 01:07:07','2014-03-28 01:07:07');

/*Table structure for table `ec_user` */

DROP TABLE IF EXISTS `ec_user`;

CREATE TABLE `ec_user` (
  `ec_user` int(11) NOT NULL AUTO_INCREMENT,
  `ec_username` varchar(128) NOT NULL,
  `ec_password` varchar(128) NOT NULL,
  `ec_email` varchar(128) NOT NULL,
  `ec_firstname` varchar(128) DEFAULT NULL,
  `ec_lastname` varchar(128) DEFAULT NULL,
  `ec_phone` varchar(64) DEFAULT NULL,
  `ec_address` varchar(256) DEFAULT NULL,
  `ec_photo` varchar(128) NOT NULL,
  `ec_description` text,
  `ec_valid_yn` char(1) NOT NULL DEFAULT 'N',
  `ec_user_type` char(1) NOT NULL DEFAULT 'B' COMMENT 'D : Dealer, U : User, A : Admin',
  `ec_token` varchar(128) NOT NULL,
  `ec_created_time` varchar(19) NOT NULL,
  `ec_updated_time` varchar(19) NOT NULL,
  PRIMARY KEY (`ec_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `ec_user` */

insert  into `ec_user`(`ec_user`,`ec_username`,`ec_password`,`ec_email`,`ec_firstname`,`ec_lastname`,`ec_phone`,`ec_address`,`ec_photo`,`ec_description`,`ec_valid_yn`,`ec_user_type`,`ec_token`,`ec_created_time`,`ec_updated_time`) values (2,'jenistar','21232f297a57a5a743894a0e4a801fc3','jenistar90@gmail.com','Kris','Jeni','398289','Tuol Kork','img/profile/9HD269MX9DJZUB7G_gom3.png','I am from Cambodia11','Y','D','1395947591HQE8TY2XR52FSBPJV3QMHJBHMA7HQELJ','2014-03-28 02:13:11','2014-04-02 05:24:24'),(3,'tester','21232f297a57a5a743894a0e4a801fc3','tester@gmail.com','','','111','','img/profile/D58BBR6GUASHHJEU_Football.png','','Y','D','13959821356ZVKVCKF5NX8KMCC9HLRSY3Y99KW94G3','2014-03-28 11:48:55','2014-04-02 10:27:44'),(4,'user','21232f297a57a5a743894a0e4a801fc3','user@gmail.com',NULL,NULL,'123',NULL,'img/profile/noPhoto.png',NULL,'Y','D','1396026051U6AC4ERED5ETCZK43A465NCJMC6574UG','2014-03-29 00:00:51','2014-03-29 00:00:51'),(5,'dealer','21232f297a57a5a743894a0e4a801fc3','dealer@gmail.com',NULL,NULL,'456',NULL,'img/profile/noPhoto.png',NULL,'Y','D','1396026066U5AG94SMGB8W4EXS9PS8GS3PWYN65YW4','2014-03-29 00:01:06','2014-03-29 00:01:06'),(6,'admin','21232f297a57a5a743894a0e4a801fc3','admin@gmail.com',NULL,NULL,'789',NULL,'img/profile/noPhoto.png',NULL,'Y','A','13960260808YMFSP7QXDFV9QPCSYT67T6QKGK3FPCL','2014-03-29 00:01:20','2014-03-29 00:01:20');

/*Table structure for table `ec_user_sns` */

DROP TABLE IF EXISTS `ec_user_sns`;

CREATE TABLE `ec_user_sns` (
  `ec_user_sns` int(11) NOT NULL AUTO_INCREMENT,
  `ec_user` int(11) NOT NULL,
  `ec_sns_id` varchar(128) NOT NULL,
  `ec_nickname` varchar(128) DEFAULT NULL,
  `ec_email` varchar(128) DEFAULT NULL,
  `ec_photo` varchar(256) NOT NULL,
  `ec_created_time` varchar(19) NOT NULL,
  `ec_updated_time` varchar(19) NOT NULL,
  PRIMARY KEY (`ec_user_sns`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ec_user_sns` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
