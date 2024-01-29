/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.33 : Database - lisa_todo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `todo_group` */

DROP TABLE IF EXISTS `todo_group`;

CREATE TABLE `todo_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `todo_group` */

insert  into `todo_group`(`id`,`nama`) values 
(6,'Group A'),
(7,'Group B'),
(8,'Group Tes'),
(9,'Group C');

/*Table structure for table `todo_group_ptk` */

DROP TABLE IF EXISTS `todo_group_ptk`;

CREATE TABLE `todo_group_ptk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todo_group` int(11) NOT NULL,
  `ptk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `todo_group_ptk` */

insert  into `todo_group_ptk`(`id`,`todo_group`,`ptk`) values 
(6,6,4),
(7,6,8),
(9,6,10),
(10,7,10);

/*Table structure for table `todo_list` */

DROP TABLE IF EXISTS `todo_list`;

CREATE TABLE `todo_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todo_group` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `todo` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `todo_list` */

insert  into `todo_list`(`id`,`todo_group`,`tgl_mulai`,`tgl_akhir`,`tgl_selesai`,`todo`,`status`,`user`) values 
(4,6,'2022-01-11','2022-01-22','2022-01-21','tes','S',2),
(5,7,'2022-03-01','2022-04-30','2022-03-31','Todo Group B','B',11),
(6,9,'2022-03-21','2022-03-31','2022-03-31','tes todo C','D',11);

/*Table structure for table `todo_task` */

DROP TABLE IF EXISTS `todo_task`;

CREATE TABLE `todo_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todo` int(11) NOT NULL,
  `task` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `todo_task` */

insert  into `todo_task`(`id`,`todo`,`task`,`tgl_mulai`,`tgl_selesai`,`status`) values 
(1,1,'tes task','2022-03-18','2022-03-22','B'),
(2,1,'tes tasl','2022-03-19','2022-03-31','B'),
(3,4,'task 1','2022-03-23','2022-03-30','D'),
(4,4,'asda','2022-03-11','2022-03-12','D'),
(5,4,'ttasda','2022-03-12','2022-03-31','B');

/*Table structure for table `tutor` */

DROP TABLE IF EXISTS `tutor`;

CREATE TABLE `tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `jabatan` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tutor` */

insert  into `tutor`(`id`,`nama`,`user`,`pass`,`jabatan`) values 
(2,'testi','sadaw','','T'),
(3,'wwwweyr','wwwww','bukanpass','T'),
(4,'test','test','test123','A'),
(5,'tutor11','tutor123','$2y$10$rmlUGQxhN87UYVGPiJG7EO84dAEk.e9OMMZo7pH16O0xyxM4husGm','T'),
(7,'tutor','tutor12','$2y$10$X4sdH4Eo.Y38Le0gNg5pneb3p96xO2mFPo/tBOYOmyYHQj6lql0rG','T'),
(8,'Aris','aris','aris085','T'),
(10,'plafound','plafound','$2y$10$MLcpVLoY3EIYGN3pTf7jdeCDVn26OkUaQCxepPra1jrJUASA4xGTm','T'),
(11,'admin','admin','$2y$10$7mIFlP7SONUNUlQfDsOGt.PIfl8xguqWQNUlKOA0Qm0CrW3N2CB.m','A'),
(17,'rizki','rizki','$2y$10$gizpL00s/wQI7PZ0V4aA8.7EE0H5edu9ohhZEzu/T818OCPbLc/O2','A');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
