/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.1.19-MariaDB : Database - csvupload
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`csvupload` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `csvupload`;

/*Table structure for table `insurance` */

DROP TABLE IF EXISTS `insurance`;

CREATE TABLE `insurance` (
  `policyid` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hu_site_limit` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `fr_site_limit` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `tiv_2012` varchar(50) DEFAULT NULL,
  `eq_site_deductible` varchar(50) DEFAULT NULL,
  `hu_site_deductible` varchar(50) DEFAULT NULL,
  `fl_site_deductible` varchar(50) DEFAULT NULL,
  `fr_site_deductible` varchar(50) DEFAULT NULL,
  `point_latitude` varchar(50) DEFAULT NULL,
  `point_longitude` varchar(50) DEFAULT NULL,
  `line` varchar(50) DEFAULT NULL,
  `construction` varchar(50) DEFAULT NULL,
  `point_granularity` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `insurance` */

insert  into `insurance`(`policyid`,`name`,`county`,`email`,`hu_site_limit`,`mobile`,`fr_site_limit`,`website`,`tiv_2012`,`eq_site_deductible`,`hu_site_deductible`,`fl_site_deductible`,`fr_site_deductible`,`point_latitude`,`point_longitude`,`line`,`construction`,`point_granularity`) values 
('119736','FL','CLAY COUNTY','498960','498960','498960','498960','498960','792148.9','0','9979.2','0','0','30.102261','-81.711777','Residential','Masonry','1'),
('448094','FL','CLAY COUNTY','1322376.3','1322376.3','1322376.3','1322376.3','1322376.3','1438163.57','0','0','0','0','30.063936','-81.707664','Residential','Masonry','3'),
('206893','FL','CLAY COUNTY','190724.4','190724.4','190724.4','190724.4','190724.4','192476.78','0','0','0','0','30.089579','-81.700455','Residential','Wood','1'),
('333743','FL','CLAY COUNTY','0','79520.76','0','0','79520.76','86854.48','0','0','0','0','30.063236','-81.707703','Residential','Wood','3'),
('172534','FL','CLAY COUNTY','0','254281.5','0','254281.5','254281.5','246144.49','0','0','0','0','30.060614','-81.702675','Residential','Wood','1'),
('119736','FL','CLAY COUNTY','498960','498960','498960','498960','498960','792148.9','0','9979.2','0','0','30.102261','-81.711777','Residential','Masonry','1'),
('448094','FL','CLAY COUNTY','1322376.3','1322376.3','1322376.3','1322376.3','1322376.3','1438163.57','0','0','0','0','30.063936','-81.707664','Residential','Masonry','3'),
('206893','FL','CLAY COUNTY','190724.4','190724.4','190724.4','190724.4','190724.4','192476.78','0','0','0','0','30.089579','-81.700455','Residential','Wood','1'),
('333743','FL','CLAY COUNTY','0','79520.76','0','0','79520.76','86854.48','0','0','0','0','30.063236','-81.707703','Residential','Wood','3'),
('172534','FL','CLAY COUNTY','0','254281.5','0','254281.5','254281.5','246144.49','0','0','0','0','30.060614','-81.702675','Residential','Wood','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
