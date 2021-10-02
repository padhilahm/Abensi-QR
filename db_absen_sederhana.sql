/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.20-MariaDB : Database - db_absen_sederhana
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_absen_sederhana` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_absen_sederhana`;

/*Table structure for table `absen` */

DROP TABLE IF EXISTS `absen`;

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(20) NOT NULL,
  `id_absen_dibuka` int(11) NOT NULL,
  PRIMARY KEY (`id_absen`),
  KEY `fk_absen_akun` (`username`),
  KEY `fk_absen_absen_dibuat` (`id_absen_dibuka`),
  CONSTRAINT `fk_absen_absen_dibuat` FOREIGN KEY (`id_absen_dibuka`) REFERENCES `absen_dibuka` (`id_absen_dibuka`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_absen_akun` FOREIGN KEY (`username`) REFERENCES `akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `absen` */

insert  into `absen`(`id_absen`,`tanggal_dibuat`,`username`,`id_absen_dibuka`) values 
(2,'2021-09-28 11:56:32','siswa',3),
(4,'2021-10-01 10:56:39','siswa',14),
(5,'2021-10-01 11:01:58','siswa',10),
(6,'2021-10-01 16:02:35','siswa',12),
(7,'2021-10-01 16:03:30','siswa',13),
(8,'2021-10-02 08:45:55','siswa',15),
(10,'2021-10-02 19:37:16','siswa2',15);

/*Table structure for table `absen_dibuka` */

DROP TABLE IF EXISTS `absen_dibuka`;

CREATE TABLE `absen_dibuka` (
  `id_absen_dibuka` int(11) NOT NULL AUTO_INCREMENT,
  `status` char(1) NOT NULL,
  `tanggal_absen_dibuka` date NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_absen_dibuka`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `absen_dibuka` */

insert  into `absen_dibuka`(`id_absen_dibuka`,`status`,`tanggal_absen_dibuka`,`tanggal_dibuat`) values 
(3,'','2021-09-28','2021-09-28 11:22:15'),
(10,'','2021-09-29','2021-09-29 22:51:19'),
(12,'','2021-10-10','2021-10-01 10:07:15'),
(13,'','2021-10-20','2021-10-01 10:07:45'),
(14,'','2021-10-01','2021-10-01 10:10:21'),
(15,'','2021-10-02','2021-10-02 08:45:14');

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`username`,`id_akun`),
  KEY `id_akun` (`id_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `akun` */

insert  into `akun`(`id_akun`,`username`,`password`,`role`,`tanggal_dibuat`) values 
(1,'admin','admin','admin','2021-09-26 21:33:16'),
(2,'siswa','siswa','siswa','2021-09-26 21:33:16'),
(20,'siswa2','siswa2','siswa','2021-10-02 18:27:13');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(20) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`nama_kelas`,`tanggal_dibuat`) values 
(3,'Kelas 1','2021-09-27 17:26:24'),
(4,'Kelas 2','2021-09-27 17:26:28'),
(5,'kelas 3','2021-09-30 10:27:46');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis_siswa` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(20) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `fk_siswa_akun` (`username`),
  KEY `fk_siswa_kelas` (`id_kelas`),
  CONSTRAINT `fk_siswa_akun` FOREIGN KEY (`username`) REFERENCES `akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_siswa_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `siswa` */

insert  into `siswa`(`id_siswa`,`nis_siswa`,`nama_siswa`,`tanggal_lahir`,`tanggal_dibuat`,`username`,`id_kelas`) values 
(3,'123456','Ahamd','2009-10-29','2021-09-28 11:55:30','siswa',3),
(24,'234567','Budi','2009-10-27','2021-10-02 18:27:13','siswa2',4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
